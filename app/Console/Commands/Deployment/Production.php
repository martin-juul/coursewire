<?php

namespace App\Console\Commands\Deployment;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Console\Command;

class Production extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy:prod';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Production deployment';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('migrate', [
            '--force' => true,
        ]);

        $this->call('db:seed', [
            '--class' => DatabaseSeeder::class,
            '--force' => true,
        ]);

        $this->warmCache();

        return 0;
    }

    protected function warmCache(): void
    {
        $this->info('Warming cache');

        $commands = [
            'package:discover',
            'event:cache',
            'config:cache',
            'route:cache',
            'view:cache',
        ];

        foreach ($commands as $command) {
            $this->call($command);
        }
    }
}
