<?php

namespace App\Console\Commands;

use App\Models\PageVisit;
use Illuminate\Console\Command;

class VisitsPruneCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visits:prune';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prune expired keys and visits';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Exception
     */
    public function handle()
    {
        $engine = config('visits.engine') ?? '';

        if ($engine === 'eloquent') {
            PageVisit::prune();
        }

        return 0;
    }
}
