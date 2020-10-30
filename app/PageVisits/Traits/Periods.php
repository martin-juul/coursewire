<?php

namespace App\PageVisits\Traits;

use Illuminate\Support\{Carbon, Str};
use Exception;

trait Periods
{
    /**
     * Sync periods times
     */
    protected function periodsSync(): void
    {
        foreach ($this->periods as $period) {
            $periodKey = $this->keys->period($period);

            if ($this->noExpiration($periodKey)) {
                $expireInSeconds = $this->newExpiration($period);
                $this->connection->increment($periodKey.'_total', 0);
                $this->connection->increment($periodKey, 0, 0);
                $this->connection->setExpiration($periodKey, $expireInSeconds);
                $this->connection->setExpiration($periodKey.'_total', $expireInSeconds);
            }
        }
    }

    /**
     * @param $periodKey
     *
     * @return bool
     */
    protected function noExpiration($periodKey): bool
    {
        return $this->connection->timeLeft($periodKey) == -1 || ! $this->connection->exists($periodKey);
    }

    /**
     * @param $period
     *
     * @return int
     * @throws \Exception
     */
    protected function newExpiration($period): int
    {
        try {
            $periodCarbon = $this->xHoursPeriod($period) ?? Carbon::now()->{'endOf' . Str::studly($period)}();
        } catch (Exception $e) {
            throw new Exception("Wrong period: `{$period}`! please update config/visits.php file.");
        }

        return $periodCarbon->diffInSeconds() + 1;
    }

    /**
     * @param $period
     * @return mixed
     */
    protected function xHoursPeriod($period)
    {
        preg_match('/([\d]+)\s?([\w]+)/', $period, $match);
        return isset($match[2]) && isset($match[1]) && $match[2] == 'hours' && $match[1] < 12
            ? Carbon::now()->endOfxHours((int) $match[1])
            : null;
    }
}
