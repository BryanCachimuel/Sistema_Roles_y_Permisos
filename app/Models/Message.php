<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'content',
        'user_id',
    ];

    // relación existente entre users y messages
    public function user() {
        return $this->belongsTo(User::class);
    }
}
