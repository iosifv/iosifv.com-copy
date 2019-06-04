<?php

namespace App\Console\Commands;

use App\Quote;
use App\QuoteTag;
use App\Tag;
use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;
use Storage;
use Faker\Factory as Faker;

class SeedQuotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature =
        'quotes:seed' .
        '{--count= : Specify number of seeds to insert (default:15)}' .
        '{--truncate : Truncates the quotes table before}' .
        '{--override-environment : Allows to run this to be run in production. Use with care.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed a lot of quotes for testing';

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
        if ($this->option('override-environment') === false &&
            \App::environment('local') === false
        ) {
            $this->error('Never use this in anything else than than [local] environment');
            return;
        }

        $truncate = $this->option('truncate');
        if ($truncate) {
            DB::statement("SET foreign_key_checks=0");

            QuoteTag::truncate();
            Quote::truncate();
            Tag::truncate();

            DB::statement("SET foreign_key_checks=1");
        }

        $count = $this->option('count');
        if ($count == false) {
            $count = 15;
        }


        $this->info('Seeding Quotes');
        $quoteProgress = $this->output->createProgressBar($count);
        for ($i = 0; $i < $count; $i++) {
            factory(Quote::class)->create();
            $quoteProgress->advance();
        }
        $quoteProgress->finish();


        $this->info("\n" . 'Seeding Tags');

        $authorCount = (int) sqrt($count);
        $tagCount = (int) $count;
        $tagProgress = $this->output->createProgressBar($authorCount + $tagCount);

        $faker = Faker::create();
        for ($i = 0; $i < $authorCount; $i++) {
            factory(Tag::class)->create([
                'type' => Tag::TYPE_AUTHOR,
                'name' => $faker->name,
            ]);
            $tagProgress->advance();
        }
        for ($i = 0; $i < $tagCount; $i++) {
            factory(Tag::class)->create();
            $tagProgress->advance();
        }
        $tagProgress->finish();


        $this->info("\n" . 'Seeding Pivot quote-tags');
        $quotes = Quote::all();
        $tags = Tag::all();

        $pivotProgress = $this->output->createProgressBar(Quote::count());
        foreach ($quotes as $quote) {
            // Pick one random author tag
            $author = $tags->where('type', Tag::TYPE_AUTHOR)->random();
            $quote->tags()->attach($author->id);

            // Pick a few random Tags
            $randomTags = $tags->random(rand(0,4));
            foreach ($randomTags as $tag) {
                // Attach only if it doesn't exist yet
                if (is_null($quote->tags->find($tag->id))) {
                    $quote->tags()->attach($tag->id);
                }
            }

            $pivotProgress->advance();
        }
        $pivotProgress->finish();
    }
}
