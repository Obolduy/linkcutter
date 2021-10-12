<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFullLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('full_links', function (Blueprint $table) {
            $table->id();
            $table->integer('id_in_list');
            $table->string('href', 256);
            $table->string('protocol', 16);
            $table->string('origin', 64);
            $table->string('host', 128);
            $table->string('hostname', 128);
            $table->string('pathname', 128);
            $table->string('search', 128);
            $table->string('hash', 128);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('full_links');
    }
}
