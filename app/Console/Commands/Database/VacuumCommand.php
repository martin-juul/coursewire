<?php
declare(strict_types=1);

namespace App\Console\Commands\Database;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Per postgres docs:
 *
 * We recommend that active production databases be vacuumed frequently (at least nightly),
 * in order to remove dead rows.
 * After adding or deleting a large number of rows, it might be a good idea to issue a
 * VACUUM ANALYZE command for the affected table.
 *
 * This will update the system catalogs with the results of all recent changes,
 * and allow the PostgreSQL query planner to make better choices in planning queries.
 *
 * @link https://www.postgresql.org/docs/current/sql-vacuum.html
 */
class VacuumCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pg:vacuum';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs vacuum on Postgres';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::getPdo()->exec('VACUUM');

        return 0;
    }
}
