<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {
            $seed = new User();
            $seed->email = $faker->freeEmail;
            $seed->password = $faker->password;
            $seed->first_name = $faker->firstName;
            $seed->last_name = $faker->lastName;
            $seed->date_of_birth = $faker->date;
            $seed->save();
        }
    }
}
