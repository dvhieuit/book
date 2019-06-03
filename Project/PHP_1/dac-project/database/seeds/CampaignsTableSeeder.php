<?php

use Illuminate\Database\Seeder;

class CampaignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('campaigns')->truncate();

        $status = [1, 2, 3];

        $type_id = [1, 2];

        $users = DB::table('users')->where('role_id', '<>', 1)->get();
        $array_user_id = [];
        foreach ($users as $user) {
            array_push($array_user_id, $user->id);
        }

        for ($i = 0; $i < 100; $i++) {
            $user_id = $faker->randomElement($array_user_id);

            $products = DB::table('products')->where('user_id', $user_id)->get();
            $array_product_id = [];
            foreach ($products as $product) {
                array_push($array_product_id, $product->id);
            }

            $day_temp = \Carbon\Carbon::today()->subDay(rand(-10, 10));
            $start_date = clone  $day_temp;
            $end_date = $day_temp->addDays(rand(1,7));

            DB::table('campaigns')->insert(
                [
                    'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    'user_id' => $user_id,
                    'status' => $faker->randomElement($status),
                    'start_day' => $start_date,
                    'end_day' => $end_date,
                    'budget' => $faker->randomNumber(5) * 1000,
                    'bid_amount' => $faker->randomNumber(2) * 1000,
                    'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                    'product_id' => $faker->randomElement($array_product_id),
                    'link' => $faker->imageUrl($width = 640, $height = 480),
                    'banner' => $faker->imageUrl($width = 640, $height = 480),
                    'type_id' => $faker->randomElement($type_id),
                ]
            );
        }
    }
}
