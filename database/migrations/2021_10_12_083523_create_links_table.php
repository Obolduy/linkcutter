<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
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
            $table->integer('redirect_count');
            $table->unsignedInteger('creator_ip');
            $table->integer('user_id')->nullable();
            $table->date('created_at');
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
        Schema::dropIfExists('links');
    }
}
