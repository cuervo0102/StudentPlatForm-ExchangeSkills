<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post',
        'sub_field',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subField()
    {
        return $this->belongsTo(SubFields::class, 'category_id'); 
    }
}
