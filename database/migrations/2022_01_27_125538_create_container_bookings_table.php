<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainerBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('container_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('order_id'); // #0012305
            $table->bigInteger('container_id');
            $table->string('customer_name');
            $table->string('from_place');
            $table->string('to_place');
            $table->string('way_type'); // one way or round trip
            $table->string('no_way'); // one way = 1, round trip = 2
            $table->string('price'); //
            $table->string('address');
            $table->string('phone');
            $table->string('depature_date'); // start_date
            $table->string('pickup_time');
            $table->bigInteger('from_city');
            $table->bigInteger('to_city');
            $table->string('booking_by'); // user or agent
            $table->string('booking_type');
            $table->string('status');
            $table->string('note');
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
        Schema::dropIfExists('container_bookings');
    }
}
