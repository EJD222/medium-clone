<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasSlug;

    protected $fillable = [
        //'image',
        'title',
        'slug',
        'content',
        'category_id',
        'user_id',
        'published_at'
    ];

    public function registerMediaConversions(?Media $media = null): void {
        $this
            ->addMediaConversion('preview')
            ->width(400);

        $this
            ->addMediaConversion('large')
            ->width(1200);
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('default')
            ->singleFile();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

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

    public function imageUrl($conversionName = '')
    {
        $media = $this->getFirstMedia();
        if (!$media) {
            return null;
        }
        if ($media->hasGeneratedConversion($conversionName)) {
            return $media->getUrl($conversionName);
        }
        return $media->getUrl();
    }

    public function claps() {
        return $this->hasMany(Clap::class);
    }

    public function formatDate() {
        return $this->created_at->format('M d, Y');
    }
}
