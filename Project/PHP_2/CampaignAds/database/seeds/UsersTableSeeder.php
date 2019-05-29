<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $faker = $faker = Faker\Factory::create();
        for($i=1;$i<100;$i++){
            DB::table('Users')->insert([
                'full_name' =>$faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'phone_number' => $faker->phoneNumber,
                'role_id' => $i%2,
                'active'=> rand(0,1),
            ]);
        }
    }
}
