<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('model_id');
            $table->integer('brand_id');
            $table->string('width');
            $table->string('height');
            $table->integer('user_id');
            $table->string('trip_type');
            $table->string('day_type');
            $table->bigInteger('city_id');
            $table->bigInteger('state_id');
            $table->bigInteger('country_id');
            $table->string('seat_no');
            $table->string('ac');
            $table->string('abs');
            $table->string('wheel_drive');
            $table->string('no_of_laggage');
            $table->string('service');
            $table->string('driver_info');
            $table->string('feature_info');
            $table->string('photo');
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
        Schema::dropIfExists('cargos');
    }
}
