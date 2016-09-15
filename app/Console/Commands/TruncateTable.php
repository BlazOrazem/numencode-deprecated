<?php

namespace Numencode\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TruncateTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'truncate {table_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate the database table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::table($this->argument('table_name'))->truncate();
        $this->comment(PHP_EOL . 'Database table "' . $this->argument('table_name') . '" successfully truncated.' . PHP_EOL);
    }
}
