<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('order_id'); // #0012305
            $table->bigInteger('car_id');
            $table->string('customer_name');
            $table->bigInteger('city_id');
            $table->bigInteger('state_id');
            $table->bigInteger('country_id');
            $table->string('address');
            $table->string('phone');
            $table->string('depature_date');
            $table->string('depature_time');
            $table->string('arrival_date');
            $table->string('trip_type');
            $table->string('day_type');
            $table->bigInteger('city_to');
            $table->string('booking_by'); // user or agent
            $table->string('status');
            $table->text('note');
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
        Schema::dropIfExists('car_bookings');
    }
}
