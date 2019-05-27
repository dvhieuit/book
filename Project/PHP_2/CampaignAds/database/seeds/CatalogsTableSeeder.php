<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CatalogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=1;$i<10;$i++){
            DB::table('catalogs')->insert([
                'name'=>$faker->name
            ]);
        }
    }
}
