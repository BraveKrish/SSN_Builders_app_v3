<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    const STATUS = [
        'ongoing' => 'Ongoing',
        'completed' => 'Completed',
        'pending' => 'Pending'
    ];

    protected $fillable = ['name', 'category_id', 'description', 'image_path', 'start_date', 'end_date', 'location', 'status'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = $model->generateSlug($model->name);
        });

        static::updating(function ($model) {
            $model->slug = $model->generateSlug($model->name);
        });
    }

    public function generateSlug($name)
    {
        // Generate slug and ensure it's unique
        $slug = Str::slug($name);
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

    public function testimonials()
    {
        return $this->hasMany(ProjectTestimonial::class);
    }

    public function subcontractorCategory()
    {
        return $this->belongsTo(SubcontractorCategory::class);
    }

    public function proposals()
    {
        return $this->hasMany(SubcontractorProposal::class);
    }
}
