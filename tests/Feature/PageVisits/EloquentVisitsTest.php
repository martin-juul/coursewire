<?php


namespace Tests\Feature\PageVisits;


use Illuminate\Foundation\Testing\RefreshDatabase;

class EloquentVisitsTest extends VisitsTestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->app['config']['visits.engine'] = 'eloquent';
        $this->connection = app(\App\PageVisits\DataEngines\EloquentEngine::class)
            ->setPrefix($this->app['config']['visits.keys_prefix']);
        include_once __DIR__ . '/../../../database/migrations/2020_10_30_080944_create_page_visits_table.php';
        (new \CreatePageVisitsTable())->up();
    }
}
