<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardsFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'award_id',
        'file_path',
    ];

    public function award()
    {
        return $this->belongsTo(AwardsAndCertifications::class, 'award_id');
    }
}
