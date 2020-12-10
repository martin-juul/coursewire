<?php
declare(strict_types=1);

namespace App\Analytics;

use Illuminate\Http\Request;
use Illuminate\Redis\Connections\Connection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

class Repository
{
    public ?string $subject;
    public ?array $tags;
    private array $config;
    private Connection $connection;
    private string $prefix;

    public function __construct(array $config = [])
    {
        if (!\count($config)) {
            $config = config('analytics');
        }
        $this->config = $config;
        $this->connection = \RedisManager::connection($this->config['connection']);
        $this->prefix = $this->config['prefix'];
    }

    public function getPages(): array
    {
        return $this->connection->client()->sMembers("{$this->prefix}_pages");
    }

    public function getToday()
    {
        return $this->zScanIterator("{$this->prefix}_day");
    }

    public function getTodayTotal(): int
    {
        return $this->connection->client()->get("{$this->prefix}_day_total");
    }

    public function getWeek(): array
    {
        return $this->zScanIterator("{$this->prefix}_week");
    }

    public function getWeekTotal(): int
    {
        return $this->connection->client()->get("{$this->prefix}_week_total");
    }

    public function getMonth(): array
    {
        return $this->zScanIterator("{$this->prefix}_month");
    }

    public function getMonthTotal(): int
    {
        return $this->connection->client()->get("{$this->prefix}_month_total");
    }

    public function getYear(): array
    {
        return $this->zScanIterator("{$this->prefix}_year");
    }

    public function getYearTotal(): int
    {
        return $this->connection->client()->get("{$this->prefix}_year_total");
    }

    protected function zScanIterator(string $key): array {
        $iterator = null;
        $values = [];

        while ($members = $this->connection->client()->zScan($key, $iterator)) {
            foreach ($members as $member => $score) {
                $values[$member] = (int)$score;
            }
        }

        return $values;
    }


    public function record(Request $request): void
    {
        if ($this->config['ignore_crawlers'] && app(CrawlerDetect::class)->isCrawler()) {
            return;
        }

        if ($this->isRecorded($request->ip())) {
            return;
        }

        $metric = Metric::fromRequest($request);
        if ($metric) {
            try {
                $this->syncPeriods($metric->page);
                $this->save($metric);
            } catch (\Exception $e) {
                Log::error('Could not record request', format_log_context($e));
            }
        }
    }

    public function save(Metric $metric): void
    {
        $this->connection->client()->sAdd("{$this->prefix}_pages", $metric->page);

        $attributes = [
            'country',
            'lang',
            'referer',
            'ip',
        ];

        foreach ($attributes as $attribute) {
            if ($metric->{$attribute}) {
                $this->connection
                    ->client()
                    ->zIncrBy("{$this->prefix}_{$attribute}:$metric->page", 1, $metric->{$attribute});
            }
        }
    }

    protected function syncPeriods(string $page)
    {
        foreach ($this->config['periods'] as $period) {
            $periodKey = "{$this->prefix}_{$period}";

            if ($this->noExpiration($periodKey)) {
                $expireInSeconds = $this->newExpiration($period);
                $this->connection->client()->incrBy($periodKey . '_total', 1);
                $this->connection->client()->zIncrBy($periodKey, 1, $page);
                $this->connection->client()->expire($periodKey, $expireInSeconds);
                $this->connection->client()->expire($periodKey . '_total', $expireInSeconds);
            }
        }
    }

    public function isRecorded(string $ip): bool
    {
        $key = "{$this->prefix}_ips:$ip";

        if ($this->connection->client()->exists($key)) {
            return true;
        }

        $this->connection->client()->setex($key, $this->config['remember_ip'], 1);

        return false;
    }

    /**
     * @param $periodKey
     *
     * @return bool
     */
    protected function noExpiration($periodKey): bool
    {
        return $this->connection->client()->ttl($periodKey) === -1 || !$this->connection->client()->exists($periodKey);
    }

    /**
     * @param $period
     *
     * @return int
     * @throws \Exception
     */
    protected function newExpiration(string $period): int
    {
        try {
            $periodCarbon = $this->xHoursPeriod($period) ?? Carbon::now()->{'endOf' . Str::studly($period)}();
        } catch (\Exception $e) {
            throw new \RuntimeException("Wrong period: `{$period}`! please update config/analytics.php file.");
        }

        return $periodCarbon->diffInSeconds() + 1;
    }

    /**
     * @param $period
     *
     * @return mixed
     */
    protected function xHoursPeriod(string $period)
    {
        preg_match('/([\d]+)\s?([\w]+)/', $period, $match);
        return isset($match[2], $match[1]) && $match[2] === 'hours' && $match[1] < 12
            ? Carbon::now()->endOfxHours((int)$match[1])
            : null;
    }
}
