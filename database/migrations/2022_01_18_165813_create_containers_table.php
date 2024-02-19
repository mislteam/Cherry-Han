<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('containers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('brand_id');
            $table->bigInteger('model_id');
            $table->string('width');
            $table->string('height');
            $table->string('length');
            $table->string('capacity');
            $table->string('city_id');
            $table->string('state_id');
            $table->string('country_id');
            $table->string('car_type_id');
            $table->string('license_type');
            $table->string('wheel_drive');
            $table->string('service');
            $table->bigInteger('driver_id');
            $table->bigInteger('ownner_id');
            $table->string('feature_photo');
            $table->string('gallery');
            $table->string('booking_status');
            $table->string('booking_for'); //within city | customize
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
        Schema::dropIfExists('containers');
    }
}