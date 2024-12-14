<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug','image', 'description', 'category_id'];

    // Add this method to generate a slug from the title
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

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(ServiceCategory::class, 'parent_id');
    }
}
