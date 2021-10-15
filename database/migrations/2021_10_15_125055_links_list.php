<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LinksList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links_list', function (Blueprint $table) {
            $table->id();
            $table->string('url', 256);
            $table->string('short_url', 64);
            $table->integer('redirect_count');
            $table->unsignedInteger('creator_ip');
            $table->integer('user_id')->nullable();
            $table->timestamps();
            $table->date('expires_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
