<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_tag', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->integer('job_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            # Make foreign keys
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_tag');
    }
}
