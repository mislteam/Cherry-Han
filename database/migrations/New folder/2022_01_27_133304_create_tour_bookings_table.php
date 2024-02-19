<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tour_id');
            $table->bigInteger('order_id'); // #0012034
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('no_pessenger');
            $table->string('depature_date');
            $table->string('depature_time');
            $table->text('note');
            $table->string('status');
            $table->string('booking_by'); // Agent or User
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
        Schema::dropIfExists('tour_bookings');
    }
}
