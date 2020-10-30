<?php

namespace App\PageVisits\Traits;

trait Setters
{
    /**
     * Return fresh cache from database
     * @return $this
     */
    public function fresh(): self
    {
        $this->fresh = true;

        return $this;
    }

    /**
     * set x seconds for ip expiration
     *
     * @param $seconds
     * @return $this
     */
    public function seconds($seconds): self
    {
        $this->ipSeconds = $seconds;

        return $this;
    }


    /**
     * @param $country
     * @return $this
     */
    public function country($country)
    {
        $this->country = $country;

        return $this;
    }


    /**
     * @param $referer
     * @return $this
     */
    public function referer($referer)
    {
        $this->referer = $referer;

        return $this;
    }

    /**
     * @param $operatingSystem
     * @return $this
     */
    public function operatingSystem($operatingSystem)
    {
        $this->operatingSystem = $operatingSystem;

        return $this;
    }

    /**
     * @param $language
     * @return $this
     */
    public function language($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Change period
     *
     * @param $period
     * @return $this
     */
    public function period($period)
    {
        if (in_array($period, $this->periods)) {
            $this->keys->visits = $this->keys->period($period);
        }

        return $this;
    }
}
