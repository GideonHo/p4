<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_user', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->boolean('applied');
            $table->boolean('saved');
            $table->boolean('viewed');

            $table->integer('job_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('job_user');
    }
}
