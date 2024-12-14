<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobListing extends Model
{
    use HasFactory;

    protected $table = 'job_listings';

    const JOB_TYPE = [
        'full-time' => 'Full Time',
        'part-time' => 'Part Time',
        'others' => 'others'
    ];
    const JOB_CATEGORY = [
        'engineer' => 'Engineer',
        'construction' => 'Construction',
        'field management' => 'Field Management',
        'preconstruction' => 'Preconstruction',
        'project management' => 'Project Management',
        'marketing' => 'Marketing',
        'other' => 'Other'
    ];
    const LEVEL = [
        'entry level' => 'Entry Level',
        'intermediate' => 'Intermediate',
        'experienced' => 'Experienced',
        'expert' => 'Expert',
        'lead' => 'Lead',
        'manager' => 'Manager',
    ];
    const STATUS = [
        'open' => 'Open',
        'closed' => 'Closed',
        'pending' => 'Pending'
    ];

    // Define the fillable fields
    protected $fillable = [
        'title',
        'slug',
        'description',
        'job_type',
        'job_category',
        'posted_date',
        'location',
        'application_deadline',
        'level',
        'status'
    ];

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


    // Define the relationship with the Application model
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
