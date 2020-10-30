<?php

namespace App\PageVisits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Keys
{
    public $modelName = false;
    public $id;
    public $visits;
    public $primary = 'id';
    public $instanceOfModel = false;
    public $tag;

    public function __construct($subject, $tag)
    {
        $this->modelName = $this->pluralModelName($subject);
        $this->primary = (new $subject)->getKeyName();
        $this->tag = $tag;
        $this->visits = $this->visits();

        if ($subject instanceof Model) {
            $this->instanceOfModel = true;
            $this->modelName = $this->modelName($subject);
            $this->id = $subject->{$subject->getKeyName()};
        }
    }

    /**
     * Get cache key
     */
    public function visits(): string
    {
        return (app()->environment('testing') ? 'testing:' : '') . $this->modelName . "_{$this->tag}";
    }

    /**
     * Get cache key for total values
     */
    public function visitsTotal(): string
    {
        return "{$this->visits}_total";
    }

    /**
     * ip key
     *
     * @param string $ip
     *
     * @return string
     */
    public function ip(string $ip): string
    {
        return $this->visits . '_' . Str::snake(
                'recorded_ips:' . ($this->instanceOfModel ? "{$this->id}:" : '') . $ip
            );
    }

    /**
     * list cache key
     *
     * @param string $limit
     * @param bool $isLow
     * @param array $constraints
     *
     * @return string
     */
    public function cache($limit = '*', $isLow = false, $constraints = []): string
    {
        $key = $this->visits . '_lists';

        if ($limit === '*') {
            return "{$key}:*";
        }

        //it might not be that unique but it does the job since not many lists
        //will be generated to one key.
        $constraintsPart = count($constraints) ? ':' . substr(sha1(serialize($constraints)), 0, 7) : '';

        return "{$key}:" . ($isLow ? 'low' : 'top') . $constraintsPart . $limit;
    }

    /**
     * period key
     *
     * @param string|int|float $period
     *
     * @return string
     */
    public function period($period): string
    {
        return "{$this->visits}_{$period}";
    }

    /**
     * @param string $relation
     * @param string|int $id
     */
    public function append(string $relation, $id): void
    {
        $this->visits .= "_{$relation}_{$id}";
    }

    public function modelName(string $subject): string
    {
        return strtolower(Str::singular(class_basename(get_class($subject))));
    }

    /**
     * @param mixed $subject
     *
     * @return string
     */
    public function pluralModelName($subject): string
    {
        return strtolower(Str::plural(class_basename(is_string($subject) ? $subject : get_class($subject))));
    }
}
