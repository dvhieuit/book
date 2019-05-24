<?php

use Faker\Factory;
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

        $list_user_id = DB::table('Users')->where('role_id',1)->pluck('id');
        for ($i =0; $i<10; $i++){
            DB::table('Campaigns')->insert([
                'name' =>$faker->name,
                'user_id' =>$user_id = $faker->randomElement($list_user_id),
                'status' => rand(0,3),
                'start_day' =>$faker->dateTime,
                'end_day' =>$faker->dateTime,
                'budget' =>$faker->randomDigit(3)*1000,
                'bit_amount' =>$faker->randomDigit(2)*100,
                'description' =>$faker->realText($maxNbChars = 20, $indexSize = 2),
                'product_id'=>$faker->randomElement(DB::table('Products')->where('user_id',$user_id)->pluck('id')),
                'link' =>$faker->url,
                'banner'=>$faker->image(),
                'type_id' =>rand(0,1)
                ,
            ]);
        }


    }

}
