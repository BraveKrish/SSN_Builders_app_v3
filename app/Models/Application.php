<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    // Define the fillable fields
    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
        'resume_url',
        'application_date',
        'status'
    ];

    // Define the relationship with the Job model
    public function job()
    {
        return $this->belongsTo(JobListing::class);
    }

    public function replies()
    {
        return $this->hasMany(ApplicationReply::class);
    }
}
