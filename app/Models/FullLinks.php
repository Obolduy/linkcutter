<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FullLinks extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_in_list',
        'href',
        'protocol',
        'origin',
        'host',
        'hostname',
        'pathname',
        'search',
        'hashname'
    ];

    public $timestamps = false;
}
