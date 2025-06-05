<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'slug',
        'content',
        'category_id',
        'user_id',
        'published_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function readTime() {
        $wordcount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordcount /120);

        return max(1,$minutes);
    }

    public function imageURL() {
        if($this->image) 
        {
            return Storage::url($this->image);   
        }
        return null;
    }
}
