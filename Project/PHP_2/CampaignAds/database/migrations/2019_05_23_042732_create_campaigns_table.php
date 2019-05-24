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
            $table->bigIncrements('id')->index();
            $table->string('name');
            $table->integer('user_id');
            $table->tinyInteger('status');
            $table->dateTime('start_day');
            $table->dateTime('end_day');
            $table->integer('budget');
            $table->integer('bit_amount');
            $table->text('description');
            $table->integer('product_id')->nullable();
            $table->string('link',255)->nullable();
            $table->string('banner',255);
            $table->tinyInteger('type_id');

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
