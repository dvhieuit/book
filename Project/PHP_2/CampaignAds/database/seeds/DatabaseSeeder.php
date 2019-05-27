<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CatalogsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CampaignsTableSeeder::class);
        $this->call(CampaignDetailsTableSeeder::class);
        $this->call(ReportHoursTableSeeder::class);

    }
}
