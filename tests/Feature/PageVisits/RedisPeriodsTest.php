<?php

namespace Tests\Feature\PageVisits;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Redis\RedisManager;

class RedisPeriodsTest extends PeriodsTestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->app['config']['database.redis.client'] = 'phpredis';
        $this->app['config']['database.redis.options.prefix'] = '';
        $this->app['config']['database.redis.laravel-visits'] = [
            'host'     => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port'     => env('REDIS_PORT', 6379),
            'database' => 3,
        ];

        $this->redis = RedisManager::connection('visits');

        if (count($keys = $this->redis->keys($this->app['config']['visits.keys_prefix'] . ':testing:*'))) {
            $this->redis->del($keys);
        }


        $this->connection = app(\App\PageVisits\DataEngines\RedisEngine::class)
            ->connect($this->app['config']['visits.connection'])
            ->setPrefix($this->app['config']['visits.keys_prefix']);
    }
}