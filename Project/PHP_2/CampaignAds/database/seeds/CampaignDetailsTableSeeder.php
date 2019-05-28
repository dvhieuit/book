<?php

use Illuminate\Database\Seeder;

class CampaignDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $list_campaign_id = DB::table('Campaigns')->where('status',1)->pluck('id');
        for($i=1;$i<100;$i++){
            DB::table('CampaignDetails')->insert([
               'campaign_id'=>$faker->randomElement($list_campaign_id),
               'views'=>$faker->randomDigit(3),
               'clicks'=>$faker->randomDigit(3),
               'date_time'=>$faker->dateTime
            ]);
        }
    }
}
