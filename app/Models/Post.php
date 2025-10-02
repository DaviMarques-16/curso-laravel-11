<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    // user que o post pertence
    public function user() {
        return $this->belongsTo(User::class);
    }

    // relationship: vários comentários em um post
    public function comments() {
        return $this->hasMany()
    }

    
}
