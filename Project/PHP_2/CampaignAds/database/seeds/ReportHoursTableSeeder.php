<?php

use Illuminate\Database\Seeder;

class ReportHoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

       $list_campaign_id = DB::table('Campaigns')->pluck('id');

       for($i=1;$i<100;$i++){
           DB::table('ReportHours')->insert([
              'campaign_id'=>$faker->randomElement($list_campaign_id),
              'date_time'=>$faker->dateTime,
              'sum_views'=>$faker->randomDigit(4),
              'sum_clicks'=>$faker->randomDigit(4),
           ]);
       }
    }
}
