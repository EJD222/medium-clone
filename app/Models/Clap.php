<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Clap extends Model
{
    public const UPDATED_AT = null;
    protected $fillable = ['post_id', 'user_id'];

    public function posts() {
        return $this->belongsTo(Post::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
