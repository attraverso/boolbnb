<?php

use App\Models\Hit;
use App\Models\House;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class HitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 500; $i++) { 
        $seed = new Hit();
        // Get collection of 'id' from houses table
        $houses = House::all()->pluck('id')->toArray();
		DB::table('hits')->insert([
			'house_id' => $faker->randomElement($houses),
			'created_at' => $faker->dateTimeBetween('-1 year', 'now', null),
		]);
      }
    }
}
