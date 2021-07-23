<?php

use App\Offer;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 3; $i++) {
            $newOffer = new Offer;

            $newOffer->provider= $faker->word();
            $newOffer->costo_mensile = number_format(rand(100, 1000) / 100, 2);
            $newOffer->descrizione = $faker->sentence();
            $newOffer->data_inizio = $faker->date();
            $newOffer->data_fine= $faker->date();
            $newOffer->user_id = 1;
            $newOffer->save();
            $newOffer->categories()->attach(rand(1, 4));
            $newOffer->categories()->attach(rand(1, 4));
        }
        for ($i=0; $i < 3; $i++) {
            $newOffer = new Offer;

            $newOffer->provider= $faker->word();
            $newOffer->costo_mensile = number_format(rand(100, 1000) / 100, 2);
            $newOffer->descrizione = $faker->sentence();
            $newOffer->data_inizio = $faker->date();
            $newOffer->data_fine= $faker->date();
            $newOffer->user_id = 2;
            $newOffer->save();
            $newOffer->categories()->attach(rand(1, 4));
            $newOffer->categories()->attach(rand(1, 4));
        }
        for ($i=0; $i < 3; $i++) {
            $newOffer = new Offer;

            $newOffer->provider= $faker->word();
            $newOffer->costo_mensile = number_format(rand(100, 1000) / 100, 2);
            $newOffer->descrizione = $faker->sentence();
            $newOffer->data_inizio = $faker->date();
            $newOffer->data_fine= $faker->date();
            $newOffer->user_id = 3;
            $newOffer->save();
            $newOffer->categories()->attach(rand(1, 4));
            $newOffer->categories()->attach(rand(1, 4));
        }
        for ($i=0; $i < 3; $i++) {
            $newOffer = new Offer;

            $newOffer->provider= $faker->word();
            $newOffer->costo_mensile = number_format(rand(100, 1000) / 100, 2);
            $newOffer->descrizione = $faker->sentence();
            $newOffer->data_inizio = $faker->date();
            $newOffer->data_fine= $faker->date();
            $newOffer->user_id = 4;
            $newOffer->save();
            $newOffer->categories()->attach(rand(1, 4));
            $newOffer->categories()->attach(rand(1, 4));
        }
    }

}


