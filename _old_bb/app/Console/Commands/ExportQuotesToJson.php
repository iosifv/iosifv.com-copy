<?php

namespace App\Console\Commands;

use App\Quote;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Storage;

class ExportQuotesToJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quotes:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export all Quotes to JSON file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    const DEFAULT_BACKUP_LOCATION = 'quotes/quotes.json';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        if (!\App::environment('local')) {
            $this->error('Never use this in anything else than than [local] environment');
            return;
        }

        $quotes     = Quote::all();
        $jsonPretty = $quotes->toJson(JSON_PRETTY_PRINT);
        $jsonRaw    = $quotes->toJson();
        $this->info('Loaded ' . $quotes->count() . ' quotes');

        $existingBackup = Storage::get(self::DEFAULT_BACKUP_LOCATION);
        if ($jsonPretty == $existingBackup) {
            $this->error('The existing backup reflects exact current state. Aborting.');
            return;
        }

        $this->info('Saving main quote file');
        Storage::put(self::DEFAULT_BACKUP_LOCATION, $jsonPretty);

        $this->info('Saving Backup Dump');
        $timestamp = Carbon::now()->toDateTimeString();
        Storage::put('quotes/bck/quotes - ' . $timestamp . '.json', $jsonRaw);

        $this->info('Done! :)');
    }
}
