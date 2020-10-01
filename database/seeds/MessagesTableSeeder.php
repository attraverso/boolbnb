<?php

use App\Models\Message;
use App\Models\House;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 300; $i++) {
            $seed = new Message();
            // Get collection of 'id' from houses table
            $houses = House::all()->pluck('id')->toArray();
            $seed->house_id = $faker->randomElement($houses);
			$seed->sender_email = $faker->freeEmail;
			$seed->message = $faker->text;
			$seed->is_read = $faker->boolean;
			$seed->timestamps = false;
			$seed->created_at = $faker->dateTimeBetween('-1 year', 'now', null);
			$seed->updated_at = Carbon::now();
            $seed->save();
        }
    }
}
