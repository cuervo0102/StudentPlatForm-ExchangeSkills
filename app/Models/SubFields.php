<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubFields extends Model
{
    protected $fillable = [
        'sub_field1',
        'sub_field2',
        'sub_field3',
    ];

    protected $casts = [
        'sub_field1' => 'array', 
        'sub_field2' => 'array',
        'sub_field3' => 'array',
    ];
}


