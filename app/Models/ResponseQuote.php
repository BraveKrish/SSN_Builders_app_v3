<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseQuote extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote_id',
        // 'name',
        // 'email',
        // 'phone',
        // 'project_name',
        // 'project_category',
        // 'project_location',
        'total_cost',
        'cost_breakdown',
        'timeline_estimate',
        'terms_and_conditions',
        'additional_notes',
        'generated_pdf',
        'uploaded_file',
        'response_sent_at',
        'response_status',
    ];

    /**
     * Get the quote that owns the response.
     */
    public function quote()
    {
        return $this->belongsTo(Quotes::class);
    }
}
