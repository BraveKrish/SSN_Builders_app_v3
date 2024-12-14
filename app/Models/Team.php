<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    const POSITION = [
        'founder' => 'Founder',
        'engineer' => 'Engineer',
        'hr' => 'HR',
        'designer' => 'Designer',
        'marketing' => 'Marketing',
        'management' => 'Management',
        'finance' => 'Finance',
        'other' => 'Other',
    ];

    protected $fillable = [
        'name',
        'position',
        'bio',
        'photo_path',
        'email',
        'phone',
        'linkedin_profile',
        'status',
    ];

    protected $attributes = [
        'status' => true,
    ];
}
