<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tel')->nullable(); //required
            $table->string('sex')->nullable(); //required
            $table->string('address')->nullable();  //not required

            $table->date('birth_date')->format('d-m-Y')->nullable();  //required

            $table->date('hired_date')->format('d-m-Y')->nullable();  //required
            $table->integer('role_id')->unsigned();  //required



            $table->foreign('role_id')->references('id')->on('roles'); //required

            $table->string('cin')->nullable(); //required

            $table->string('passport')->nullable(); //required


            $table->integer('status')->default(1);// 0 -> banned , 1 -> actif$

            $table->dateTime('last_connected_time')->nullable();

            $table->dateTime('banned_time')->nullable();
            $table->string('nationality')->nullable(); //required
            $table->string('civil_situation')->nullable(); //not required

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
