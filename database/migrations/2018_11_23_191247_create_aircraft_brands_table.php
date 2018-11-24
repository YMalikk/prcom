<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAircraftBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aircraft_brands', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('status')->default(1);
            $table->timestamps();
        });

        Schema::create('brand_models',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('speed');
            $table->integer('consumption_per_hof');
            $table->integer('status')->default(1);
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('aircraft_brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aircraft_type');
        Schema::dropIfExists('brand_models');
    }
}
