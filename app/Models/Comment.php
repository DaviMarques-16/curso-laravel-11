<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'content',
        'user_id',
        'post_id',
    ]

    //user que o comentário pertence
    public function user() {
        return $this->belongsTo(User::class);
    }

    //post que o comentário pertence
    public function post() {
        return $this->belongsTo(User:class);
    }
}
