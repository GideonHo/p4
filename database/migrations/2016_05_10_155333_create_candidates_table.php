<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->string('resume');
            
        });
    }

    public function down()
    {
        Schema::drop('candidates');
    }
}
