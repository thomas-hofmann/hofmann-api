<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomData extends Model
{
    protected $fillable = ['client', 'category', 'data'];

    protected $casts = [
        'data' => 'array',
    ];
}