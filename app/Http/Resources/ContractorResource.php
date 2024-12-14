<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContractorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($request->all());
        return [
            // 'id' => $request->id,
            // 'user_id' => $request->user_id,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'city' => $request->city,
            'zip_postal_code' => $request->zip_postal_code,
            'country' => $request->country,
            'website' => $request->website,
            'contact_person_name' => $request->contact_person_name,
            'contact_person_email' => $request->contact_person_email,
            'contact_person_phone' => $request->contact_person_phone,
            'business_license_number' => $request->business_license_number,
            'insurance_provider' => $request->insurance_provider,
            'insurance_policy_number' => $request->insurance_policy_number,
            'certifications' => $request->certifications,
            'previous_projects' => $request->previous_projects,
            'construction_scope' => $request->construction_scope,
            'engineering_scope' => $request->engineering_scope,
            'other_scope_name' => $request->other_scope_name,
            'other_scope_details' => $request->other_scope_details,
            'business_license_file' => $request->business_license_file,
            'insurance_certificate_file' => $request->insurance_certificate_file,
            'certifications_file' => $request->certifications_file,
            'agreement_to_terms' => $request->agreement_to_terms,
        ];
    }
}
