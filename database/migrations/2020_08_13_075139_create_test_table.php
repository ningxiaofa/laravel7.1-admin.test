<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test', function (Blueprint $table) {
            $table->id();
            $table->date('learn_date')->nullable();
            $table->time('learn_time')->nullable();
            $table->timeTz('learn_time_tz')->nullable();
            $table->datetime('learn_datetime')->nullable();
            $table->datetimeTz('learn_datetime_tz')->nullable();
            $table->timestamp('learn_timestamp')->nullable();
            $table->timestampTz('learn_timestamp_tz')->nullable();
            $table->year('learn_year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test');
    }
}
