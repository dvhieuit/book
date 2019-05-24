<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        $list_catalog_id = DB::table('Catalogs')->pluck('id');
        $list_user_id = DB::table('Users')->where('role_id','1')->pluck('id');


        for ($i =0; $i<10; $i++){
            DB::table('Products')->insert([
                'name' =>$faker->name,
                'price' =>$faker->randomDigit(3)*1000,
                'quantity' =>$faker->randomDigit(2),
                'description' =>$faker->realText($maxNbChars = 20, $indexSize = 2),
                'image' =>$faker->imageUrl($width = 640, $height = 480),
                'catalog_id' =>$faker->randomElement($list_catalog_id),
                'user_id' =>$faker->randomElement($list_user_id),
            ]);
        }

    }
}
