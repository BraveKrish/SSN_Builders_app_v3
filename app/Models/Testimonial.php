<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    const POSITION = [
        'CEO' => 'CEO',
        'Project Manager' => 'Project Manager',
        'Architect' => 'Architect',
        'Site Supervisor' => 'Site Supervisor',
        'Marketing Director' => 'Marketing Director',
        'Other' => 'Other',
    ];

    protected $fillable = [
        'client_name',
        'position',
        'client_company',
        'photo_path',
        'testimonial_text',
        // 'rating',
        'status',
    ];

    protected $attributes = [
        'status' => true,
    ];
}
