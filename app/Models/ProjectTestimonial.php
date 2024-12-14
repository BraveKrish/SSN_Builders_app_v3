<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTestimonial extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'client_information', 'testimonial', 'date'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
