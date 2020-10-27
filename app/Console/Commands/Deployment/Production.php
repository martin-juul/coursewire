<?php

namespace App\Console\Commands\Deployment;

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

        $this->call('optimize');

        return 0;
    }
}
