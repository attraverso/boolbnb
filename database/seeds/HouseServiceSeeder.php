<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\House;
use App\Models\Service;

class HouseServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
		$houses = House::all()->pluck('id')->toArray();
		$services = Service::all()->pluck('id')->toArray();

        $idsCombos = [];
		for ($i=0; $i < 60; $i++) { 
			$newHouse = $faker->randomElement($houses);
			$newService = $faker->randomElement($services);
			$newCombo = $newHouse . '-' . $newService;
			if (!in_array($newCombo, $idsCombos)) {
				array_push($idsCombos, $newCombo);
				$house = House::find($newHouse);
				$house->services()->attach($newService);
			}
		}
    }
}
