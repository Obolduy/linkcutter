<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FullLinks extends Migration
{
    public function up()
    {
        Schema::create('full_links', function (Blueprint $table) {
            $table->id();
            $table->integer('id_in_list');
            $table->string('href', 2048);
            $table->string('protocol', 16);
            $table->string('origin', 256);
            $table->string('host', 256);
            $table->string('hostname', 512);
            $table->string('pathname', 512);
            $table->string('search', 512)->nullable();
            $table->string('hash', 256)->nullable();
        });
    }
}
