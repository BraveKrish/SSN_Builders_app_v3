<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationReply extends Model
{
    use HasFactory;

    protected $table = 'application_replies';

    // Define the fillable fields
    protected $fillable = [
        'application_id',
        'sender',
        'recipient',
        'subject',
        'message',
        'reply_type',
        'status',
        'sent_at',
    ];

    // Define the relationship with the Application model
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
