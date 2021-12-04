<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PasswordsResets extends Migration
{
    public function up()
    {
        Schema::create('passwords_resets', function (Blueprint $table) {
            $table->id();
            $table->string('hash', 64);
            $table->string('email', 64);
            $table->dateTime('requested_at');
        });
    }
}
