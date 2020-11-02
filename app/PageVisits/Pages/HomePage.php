<?php

namespace App\PageVisits\Pages;

/**
 * App\PageVisits\Pages\HomePage
 *
 * @method static \Illuminate\Database\Eloquent\Builder|HomePage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomePage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomePage query()
 * @mixin \Eloquent
 */
class HomePage extends Page
{
    public function __construct()
    {
        parent::__construct(1, 'home');
    }
}
