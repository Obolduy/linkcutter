<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailsVerifications extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'user_id',
        'hash'
    ];

    public $timestamps = false;
}
