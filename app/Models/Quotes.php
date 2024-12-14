<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // 'slug',
        'email',
        'phone',
        'project_name',
        'project_location',
        'project_category',
        'project_details_file',
        'total_estimate',
        'submission_date',
        'status',
        'notes',
        'response_date',
    ];

    /**
     * Get the response quote associated with the quote.
     */
    public function responseQuote()
    {
        return $this->hasOne(ResponseQuote::class);
    }
}
