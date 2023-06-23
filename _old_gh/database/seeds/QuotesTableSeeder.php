<?php

use App\Quote;
use Illuminate\Database\Seeder;

class QuotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Quote::class, 5)->create()->each(function (Quote $quote) {
//            dump($quote->getAttributes());
        });
    }
}
