<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectJobsAndRecruiters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {

            $table->integer('recruiter_id')->unsigned();
            $table->foreign('recruiter_id')->references('id')->on('recruiters');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign('jobs_recruiter_id_foreign');
            $table->dropColumn('recruiter_id');
        });
    }
}
