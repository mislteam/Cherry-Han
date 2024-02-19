<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->bigInteger('age');
            $table->string('gender');
            $table->string('address');
            $table->text('language');
            $table->bigInteger('country_id');
            $table->bigInteger('state_id');
            $table->bigInteger('city_id');
            $table->string('tour_exp'); // one yr or 1 yr or 2yr above
            $table->string('drive_exp'); // one yr or 1 yr or 2yr above
            $table->string('license_type'); // က ခ ဂ ဃ | black or red or brown
            $table->bigInteger('rating');
            $table->string('demage');
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
        Schema::dropIfExists('car_drivers');
    }
}
