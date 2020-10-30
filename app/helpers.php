<?php

if (!function_exists('visits')) {
    function visits($subject, $tag = 'visits')
    {
        return new \App\PageVisits\Visits($subject, $tag);
    }
}
