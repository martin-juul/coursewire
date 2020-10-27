<?php

namespace App\Console\Commands\Deployment;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class Development extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy:dev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Development deployment';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('migrate:fresh');
        $this->call('optimize:clear');
        $this->call('view:clear');

        User::create([
            'name'     => 'Martin Juul',
            'email'    => 'martin@juul.test',
            'password' => Hash::make('secret'),
        ]);

        $this->info('Test user: u=martin@juul.xyz p=secret');

        return 0;
    }
}
