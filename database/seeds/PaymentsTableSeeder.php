<?php

use App\Payment;
use App\Home;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $seed = new Payment();
            // Get collection of 'id' from homes table
            $homes = Home::all()->pluck('id')->toArray();
            $seed->home_id = $faker->randomElement($homes);
            $seed->status = $faker->randomElement(['accepted', 'pending', 'rejected']);
            $seed->starting_datetime = $faker->date;
            $seed->save();
        }
    }
}