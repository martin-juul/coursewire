<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SitemapGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a new sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Spatie\Sitemap\SitemapGenerator::create(config('app.url'))
            ->writeToFile(public_path('sitemap.xml'));

        return 0;
    }
}
