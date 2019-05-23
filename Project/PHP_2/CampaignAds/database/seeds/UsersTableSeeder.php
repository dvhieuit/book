<?php

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
        $faker = new Faker\Generator();
        DB::table('Users')->insert([
            'full_name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'pass' => bcrypt('secret'),
            'phone_number'=>$faker->addProvider(new Faker\Provider\en_US\PhoneNumber($faker)),
            'role_id'=>1,
            'remember_token'=>Str::random(100)
        ]);
    }
}
