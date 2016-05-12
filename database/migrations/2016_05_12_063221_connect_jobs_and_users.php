<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectJobsAndUsers extends Migration
{
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {

            # Add a new INT field called `author_id` that has to be unsigned (i.e. positive)
            $table->integer('author_id')->unsigned();

            # This field `author_id` is a foreign key that connects to the `id` field in the `authors` table
            $table->foreign('author_id')->references('id')->on('users');

        });
    }

    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('jobs_author_id_foreign');

            $table->dropColumn('author_id');
        });
    }
}
