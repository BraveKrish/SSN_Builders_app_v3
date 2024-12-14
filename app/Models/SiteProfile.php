<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteProfile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'about_us',
        'contact_no',
        'email',
        'secondary_email',
        'location',
        'facebook_link',
        'linkedin_link',
        'whatsapp_link',
        'youtube_link',
    ];
}
