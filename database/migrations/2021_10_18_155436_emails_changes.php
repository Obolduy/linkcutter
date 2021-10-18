<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmailsChanges extends Migration
{

    public function up()
    {
        Schema::create('emails_changes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('hash', 64);
            $table->string('new_email', 64);
            $table->dateTime('requested_at');
        });
    }
}
