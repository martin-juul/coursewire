<?php

if (!function_exists('visits')) {
    /**
     * @param $subject
     * @param string $tag
     *
     * @return \App\PageVisits\Visits
     * @throws \Exception
     */
    function visits($subject, $tag = 'visits')
    {
        return new \App\PageVisits\Visits($subject, $tag);
    }
}
