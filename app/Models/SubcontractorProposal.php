<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcontractorProposal extends Model
{
    use HasFactory;

    protected $table = 'subcontractor_bids';

    const STATUS = [
        'under_review' => 'Under Review',
        'accepted' => 'Accepted',
        'rejected' => 'Rejected',
    ];

    protected $fillable = [
        'project_id',
        'subcontractor_id',
        'proposal',
        'total_bid_amount',
        'breakdown_of_costs',
        'payment_terms',
        'warranties',
        'signature',
        'date_of_signing',
        'attachments',
        'status',
    ];

    protected $casts = [
        'attachments' => 'array', // Automatically casts to an array when retrieved
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function subcontractor()
    {
        return $this->belongsTo(ContractorRegistration::class);
    }

    public function category(){
        return $this->belongsTo(ServiceCategory::class);
    }


    
}
