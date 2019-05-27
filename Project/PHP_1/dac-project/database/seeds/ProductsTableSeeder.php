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

        DB::table('Products')->truncate();

        $catalogs = DB::table('Catalogs')->get()->toArray();
        $array_catalog_id = [];
        foreach ($catalogs as $catalog) {
            array_push($array_catalog_id, $catalog->id);
        }

        $users = DB::table('Users')->where('role_id', '<>', 1)->get();
        $array_user_id = [];
        foreach ($users as $user) {
            array_push($array_user_id, $user->id);
        }

        for ($i = 0; $i < 100; $i++) {
            DB::table('Products')->insert(
                [
                    'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                    'price' => $faker->randomNumber(4) * 1000,
                    'quantity' => $faker->randomNumber(2),
                    'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                    'image' => $faker->imageUrl($width = 640, $height = 480),
                    'catalog_id' => $faker->randomElement($array_catalog_id),
                    'user_id' => $faker->randomElement($array_user_id)
                ]
            );
        }


    }
}
