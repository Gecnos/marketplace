<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the current database connection name';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $databaseName = DB::connection()->getDatabaseName();
            $this->info('Successfully connected. Database name: ' . $databaseName);
        } catch (\Exception $e) {
            $this->error('Failed to connect to the database.');
            $this->error($e->getMessage());
        }
    }
}
