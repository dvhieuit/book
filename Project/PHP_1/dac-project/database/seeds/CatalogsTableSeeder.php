<?php

use Illuminate\Database\Seeder;

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

        DB::table('Catalogs')->truncate();

        $catalogs = ['laptop', 'phone' , 'tablet'];

        foreach ($catalogs as $catalog) {
            DB::table('Catalogs')->insert([
                'name' => $catalog
            ]);
        }
    }
}
