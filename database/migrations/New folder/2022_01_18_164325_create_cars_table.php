<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('model_id');
            $table->bigInteger('brand_id');
            $table->string('width');
            $table->string('height');
            $table->bigInteger('user_id');
            $table->string('trip_type');
            $table->string('day_type');
            $table->bigInteger('city_id');
            $table->bigInteger('state_id');
            $table->bigInteger('country_id');
            $table->string('seat_no');
            $table->string('ac');
            $table->string('wheel_drive');
            $table->string('abs');
            $table->string('airbag');
            $table->string('no_of_laggage');
            $table->string('service');
            $table->string('license_type');
            $table->bigInteger('driver_id');
            $table->bigInteger('ownner_id');
            $table->string('feature_photo');
            $table->string('gallery');
            $table->string('status');
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
        Schema::dropIfExists('cars');
    }
}
