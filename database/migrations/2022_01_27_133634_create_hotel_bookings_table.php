<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('hotel_id');
            $table->string('order_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('checkin_date');
            $table->string('checkout_date');
            $table->bigInteger('room_type_id');
            $table->string('room_type_name');
            $table->string('room_type_price');
            $table->bigInteger('room_type_catid');
            $table->bigInteger('no_room');
            $table->bigInteger('no_person');
            $table->string('note');
            $table->string('booking_by'); // Agent or User
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
        Schema::dropIfExists('hotel_bookings');
    }
}
