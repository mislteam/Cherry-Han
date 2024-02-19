<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('tour_name');
            $table->integer('category_id');
            $table->integer('destination_id');
            $table->string('feature_image'); // single image
            $table->string('gallery'); // multiple image
            $table->string('price');
            $table->string('package');
            $table->string('passenger'); //unlimited | 3 ~ 10
            $table->text('description');
            $table->string('include'); // json format text
            $table->string('exclude'); // json format text
            $table->string('status');
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
        Schema::dropIfExists('tours');
    }
}
