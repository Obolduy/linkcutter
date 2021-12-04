<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordsResets extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'hash',
        'requested_at'
    ];

    public $timestamps = false;
}
