<?php

namespace App\Console\Commands;

use App\Quote;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Storage;

class ImportQuotesFromJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quotes:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all Quotes from JSON file';

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
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        if (!\App::environment('local')) {
            $this->error('Never use this in anything else than than [local] environment');
            return;
        }

        $quotes = Quote::all();
        $bar = $this->output->createProgressBar(count($quotes));

        $json = Storage::get('quotes/quotes.json');
        $array = json_decode($json, true);
        foreach ($array as $quoteArray) {
            $bar->advance();
            // Check if id exists
            $existingQuote = $quotes->find($quoteArray['id']);
            if ($existingQuote) {
                continue;
            }

            (new Quote())
                ->forceFill($quoteArray)
                ->save();
        }

        $bar->finish();
    }
}
