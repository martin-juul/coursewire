<?php

namespace App\PageVisits;

class Reset extends Visits
{
    protected $keys;

    public function __construct(Visits $parent, $method, $args)
    {
        parent::__construct($parent->subject);
        $this->keys = $parent->keys;

        if (method_exists($this, $method)) {
            if (empty($args)) {
                $this->$method();
            } else {
                $this->$method($args);
            }
        }
    }

    /**
     * Reset everything
     */
    public function factory()
    {
        $this->visits();
        $this->periods();
        $this->ips();
        $this->lists();
        $this->allcountries();
        $this->allrefs();
        $this->allOperatingSystems();
        $this->allLanguages();
    }

    /**
     * reset all time visits
     */
    public function visits()
    {
        if ($this->keys->id) {
            $this->connection->delete($this->keys->visits, $this->keys->id);
            foreach (['countries', 'referers', 'OSes', 'languages'] as $item) {
                $this->connection->delete($this->keys->visits . "_{$item}:{$this->keys->id}");
            }

            foreach ($this->periods as $period => $_) {
                $this->connection->delete($this->keys->period($period), $this->keys->id);
            }

            $this->ips();
        } else {
            $this->connection->delete($this->keys->visits);
            $this->connection->delete($this->keys->visits . '_total');
        }
    }

    /**
     * Delete all referer keys
     */
    public function allrefs(): void
    {
        $cc = $this->connection->search($this->keys->visits . '_referers:*');

        if (count($cc)) {
            $this->connection->delete($cc);
        }
    }

    /**
     * Delete all OS keys
     */
    public function allOperatingSystems(): void
    {
        $cc = $this->connection->search($this->keys->visits . '_OSes:*');

        if (count($cc)) {
            $this->connection->delete($cc);
        }
    }

    /**
     * Delete all language keys
     */
    public function allLanguages(): void
    {
        $cc = $this->connection->search($this->keys->visits . '_languages:*');

        if (count($cc)) {
            $this->connection->delete($cc);
        }
    }

    /**
     * Delete all country keys
     */
    public function allcountries(): void
    {
        $cc = $this->connection->search($this->keys->visits . '_countries:*');

        if (count($cc)) {
            $this->connection->delete($cc);
        }
    }

    /**
     * reset day,week counters
     */
    public function periods(): void
    {
        foreach ($this->periods as $period => $_) {
            $periodKey = $this->keys->period($period);
            $this->connection->delete($periodKey);
            $this->connection->delete($periodKey . '_total');
        }
    }

    /**
     * reset ips protection
     *
     * @param string $ips
     */
    public function ips($ips = '*')
    {
        $ips = $this->connection->search($this->keys->ip($ips));

        if (count($ips)) {
            $this->connection->delete($ips);
        }
    }

    /**
     * reset lists top/low
     */
    public function lists(): void
    {
        $lists = $this->connection->search($this->keys->cache());

        if (count($lists)) {
            $this->connection->delete($lists);
        }
    }
}
