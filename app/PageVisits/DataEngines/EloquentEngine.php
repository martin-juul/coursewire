<?php /** @noinspection StaticInvocationViaThisInspection */

namespace App\PageVisits\DataEngines;

use App\Models\PageVisit as Model;
use Illuminate\Database\Query\Builder;

class EloquentEngine implements DataEngine
{
    private ?Model $model;
    private ?string $prefix = null;

    public function __construct(Model $model)
    {
        $this->model = $model ?? null;
    }

    public function connect(string $connection): DataEngine
    {
        return $this;
    }

    public function setPrefix(string $prefix): DataEngine
    {
        $this->prefix = $prefix . ':';
        return $this;
    }

    public function increment(string $key, int $value, $member = null): bool
    {
        if (!empty($member) || is_numeric($member)) {
            $row = $this->model->firstOrNew(['primary_key' => $this->prefix . $key, 'secondary_key' => $member]);
        } else {
            $row = $this->model->firstOrNew(['primary_key' => $this->prefix . $key, 'secondary_key' => null]);
        }

        if ($row->expired_at !== null && \Carbon\Carbon::now()->gt($row->expired_at)) {
            $row->score = $value;
            $row->expired_at = null;
        } else {
            $row->score += $value;
        }

        return $row->save();
    }

    public function decrement(string $key, int $value, $member = null): bool
    {
        return $this->increment($key, -$value, $member);
    }

    public function delete($key, $member = null): bool
    {
        if (is_array($key)) {
            array_walk($key, function ($item) {
                $this->delete($item);
            });
            return true;
        }

        if (!empty($member) || is_numeric($member)) {
            return $this->model->where(['primary_key' => $this->prefix . $key, 'secondary_key' => $member])->delete();
        }

        return $this->model->where(['primary_key' => $this->prefix . $key])->delete();
    }

    public function get(string $key, $member = null)
    {
        if (!empty($member) || is_numeric($member)) {
            return $this->model->where(['primary_key' => $this->prefix . $key, 'secondary_key' => $member])
                ->where(function ($q) {
                    return $q->where('expired_at', '>', \Carbon\Carbon::now())->orWhereNull('expired_at');
                })
                ->value('score');
        }

        return $this->model->where(['primary_key' => $this->prefix . $key, 'secondary_key' => null])
            ->where(function ($q) {
                return $q->where('expired_at', '>', \Carbon\Carbon::now())->orWhereNull('expired_at');
            })
            ->value('score');
    }

    public function set(string $key, $value, $member = null): bool
    {
        if (!empty($member) || is_numeric($member)) {
            return $this->model->updateOrCreate([
                    'primary_key'   => $this->prefix . $key,
                    'secondary_key' => $member,
                    'score'         => $value,
                    'expired_at'    => null,
                ]) instanceof Model;
        }

        return $this->model->updateOrCreate([
                'primary_key' => $this->prefix . $key,
                'score'       => $value,
                'expired_at'  => null,
            ]) instanceof Model;
    }

    public function search(string $word, bool $noPrefix = true): array
    {
        $results = [];

        if ($word === '*') {
            $results = $this->model
                ->where(function (Builder $q) {
                    return $q->where('expired_at', '>', \Carbon\Carbon::now())
                        ->orWhereNull('expired_at');
                })
                ->pluck('primary_key');
        } else {
            $results = $this->model->where('primary_key', 'like', $this->prefix . str_replace('*', '%', $word))
                ->where(function (Builder $q) {
                    return $q->where('expired_at', '>', \Carbon\Carbon::now())
                        ->orWhereNull('expired_at');
                })
                ->pluck('primary_key');
        }

        return array_map(
            function ($item) use ($noPrefix) {
                if ($noPrefix && strpos($item, $this->prefix) === 0) {
                    return substr($item, strlen($this->prefix));
                }

                return $item;
            },
            $results->toArray() ?? []
        );
    }

    public function flatList(string $key, int $limit = -1): array
    {
        return array_slice(
            $this->model->where(['primary_key' => $this->prefix . $key, 'secondary_key' => null])
                ->where(function ($q) {
                    return $q->where('expired_at', '>', \Carbon\Carbon::now())->orWhereNull('expired_at');
                })
                ->value('list') ?? [], 0, $limit
        );
    }

    public function addToFlatList(string $key, $value): bool
    {
        $row = $this->model->firstOrNew(['primary_key' => $this->prefix . $key, 'secondary_key' => null]);

        if ($row->expired_at !== null && \Carbon\Carbon::now()->gt($row->expired_at)) {
            $row->list = (array)$value;
            $row->expired_at = null;
        } else {
            $row->list = array_merge($row->list ?? [], (array)$value);
        }

        $row->score = $row->score ?? 0;
        return (bool)$row->save();
    }


    public function valueList(string $key, int $limit = -1, bool $orderByAsc = false, bool $withValues = false): array
    {
        /** @noinspection ProperNullCoalescingOperatorUsageInspection */
        $rows = $this->model->where('primary_key', $this->prefix . $key)
                ->where(function (Builder $q) {
                    return $q->where('expired_at', '>', \Carbon\Carbon::now())->orWhereNull('expired_at');
                })
                ->whereNotNull('secondary_key')
                ->orderBy('score', $orderByAsc ? 'asc' : 'desc')
                ->when($limit > -1, function (Builder $q) use ($limit) {
                    return $q->limit($limit + 1);
                })->pluck('score', 'secondary_key') ?? \Illuminate\Support\Collection::make();

        return $withValues ? $rows->toArray() : array_keys($rows->toArray());
    }

    public function exists(string $key): bool
    {
        return $this->model->where(['primary_key' => $this->prefix . $key, 'secondary_key' => null])
            ->where(function ($q) {
                return $q->where('expired_at', '>', \Carbon\Carbon::now())->orWhereNull('expired_at');
            })
            ->exists();
    }

    public function timeLeft(string $key): int
    {
        $expired_at = $this->model->where(['primary_key' => $this->prefix . $key])->value('expired_at');

        if ($expired_at === null) {
            return -2;
        }

        $ttl = $expired_at->timestamp - \Carbon\Carbon::now()->timestamp;
        return $ttl <= 0 ? -1 : $ttl;
    }

    public function setExpiration(string $key, int $time): bool
    {
        return $this->model->where(['primary_key' => $this->prefix . $key])
            ->where(function ($q) {
                return $q->where('expired_at', '>', \Carbon\Carbon::now())->orWhereNull('expired_at');
            })
            ->update([
                'expired_at' => \Carbon\Carbon::now()->addSeconds($time),
            ]);
    }
}
