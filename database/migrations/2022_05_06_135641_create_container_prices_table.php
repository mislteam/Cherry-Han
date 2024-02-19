<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainerPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('container_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('container_id');
            $table->text('car_type_id');
            $table->text('container_des_from_id');
            $table->text('container_des_to_id');
            $table->text('price');
            $table->integer('created_by');
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
        Schema::dropIfExists('container_prices');
    }
}
