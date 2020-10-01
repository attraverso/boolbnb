<?php

use App\Models\Service;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $services = [
			'wifi', 'swimming pool', 'parking spot', 'concierge', 'sauna', 'sea view', 
		];

        $iconNames = [
			'fas fa-wifi', 'fas fa-swimming-pool', 'fas fa-parking', 'fas fa-user-check', 'fas fa-hot-tub', 'fas fa-water', 
		];

		for ($i=0; $i < count($services) ; $i++) { 
			$newService = new Service();
			$newService->name = $services[$i];
			$newService->icon_class = $iconNames[$i];
			$newService->save();
		}
		foreach ($services as $service) {
			
		}
    }
}
