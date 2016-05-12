<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectCandidatesAndUsers extends Migration
{
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {

            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {

            $table->dropForeign('candidates_user_id_foreign');

            $table->dropColumn('user_id');
        });
    }
}
