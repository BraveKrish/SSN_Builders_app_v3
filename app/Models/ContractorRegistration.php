<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractorRegistration extends Model
{
    use HasFactory;


    protected $table = 'contractor_registrations';

    protected $fillable = [
        'user_id',
        'company_name',
        'company_address',
        'city',
        'zip_postal_code',
        'country',
        'website',
        'contact_person_name',
        'contact_person_email',
        'contact_person_phone',
        'business_license_number',
        'insurance_provider',
        'insurance_policy_number',
        'certifications',
        'previous_projects',
        'construction_scope',
        'engineering_scope',
        'other_scope_name',
        'other_scope_details',
        'business_license_file',
        'insurance_certificate_file',
        'certifications_file',
        'agreement_to_terms',
    ];

    protected $casts = [
        'construction_scope' => 'array',
        'engineering_scope' => 'array',
    ];

    public function proposals()
    {
        return $this->hasMany(SubcontractorProposal::class);
    }
}
