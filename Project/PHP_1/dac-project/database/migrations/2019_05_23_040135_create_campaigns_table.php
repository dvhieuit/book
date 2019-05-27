<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('user_id');
            $table->integer('status');
            $table->datetime('start_day');
            $table->datetime('end_day');
            $table->integer('budget');
            $table->integer('bid_amount');
            $table->text('description');
            $table->integer('product_id');
            $table->text('link');
            $table->text('banner');
            $table->integer('type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Campaigns');
    }
}
