<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration
{
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            # The rest of the fields...
            $table->string('name');
            $table->binary('file');
            $table->string('mime');
            $table->integer('size');
        });
    }

    public function down()
    {
        Schema::drop('attachments');
    }
}
