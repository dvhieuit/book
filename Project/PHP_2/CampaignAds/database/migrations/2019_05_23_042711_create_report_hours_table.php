<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ReportHours', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->integer('campaign_id');
            $table->dateTime('date_time');
            $table->integer('sum_views');
            $table->integer('sum_clicks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ReportHours');
    }
}
