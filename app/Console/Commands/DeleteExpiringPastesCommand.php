<?php

namespace App\Console\Commands;

use App\Paste;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteExpiringPastesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'paste:deleteexpiring';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes all pastes that have an expires_at attribute in the past';

    /**
     * Create a new command instance.
     *
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
        // this deletes Paste models from the database
        // without intervention from observers etc.
        Paste::where('expires_at', '<', Carbon::now())->delete();
    }
}
