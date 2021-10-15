<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinksList extends Model
{
    use HasFactory;

    protected $table = 'links_list';

    protected $fillable = [
        'url',
        'short_url',
        'redirect_count',
        'creator_ip',
        'expires_at',
        'user_id',
        'active',
        'created_at',
        'updated_at'
    ];
}
