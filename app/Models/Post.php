<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    const POST_CATEGORY = [
        'blog' => 'Blog',
        'news article' => 'News article',
        'other' => 'Other',

    ];

    const STATUS = [
        'archived' => 'Archived',
        'pending' => 'Pending',
        'published' => 'Published',
    ];

    protected $fillable = ['title', 'slug','content', 'author', 'post_type', 'image_path', 'status'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = $model->generateSlug($model->title);
        });

        static::updating(function ($model) {
            $model->slug = $model->generateSlug($model->title);
        });
    }

    public function generateSlug($title)
    {
        // Generate slug and ensure it's unique
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        // Check for existing slugs and make unique if necessary
        while (static::whereSlug($slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
