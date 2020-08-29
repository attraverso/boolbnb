<?php

use App\Home;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class HomesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
          $seed = new Home();
          $seed->title = $faker->sentence(5);
          $seed->nr_of_rooms = $faker->randomDigit;
          $seed->nr_of_beds = $faker->randomDigit;
          $seed->nr_of_bathrooms = $faker->randomDigit;
          $seed->square_mt = $faker->randomNumber(2);
          $seed->address = $faker->address;
          $seed->latitude = $faker->latitude;
          $seed->longitude = $faker->longitude;
          $seed->image_path = $faker->imageUrl;
          $seed->visible = $faker->boolean;
          $seed->advertised = $faker->boolean;
          $seed->save();
        }
    }
}
