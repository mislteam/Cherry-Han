<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourItineariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_itinearies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tour_id');
            $table->string('title');
            $table->string('description');
            $table->string('seo_title');
            $table->timestamps();

            $table->foreign('tour_id')
                ->references('id')
                ->on($tableNames['tours'])
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_itinearies');
    }
}
