<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirCraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_crafts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('purchase_date')->format('d-m-Y');
            $table->date('fabrication_date')->format('d-m-Y');
            $table->date('maintains_date')->format('d-m-Y');
            $table->integer('number_of_eco_seats');
            $table->integer('number_of_business_seats');
            $table->integer('number_of_first_seats');
            $table->integer('model_type')->unsigned();
            $table->foreign('model_type')->references('id')->on('brand_models');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('air_crafts');
    }
}
