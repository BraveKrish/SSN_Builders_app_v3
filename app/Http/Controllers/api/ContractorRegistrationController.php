<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\BidNotification;
use App\Models\ContractorRegistration;
use App\Models\Project;
use App\Models\SubcontractorProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Traits\FileTraits;

class ContractorRegistrationController extends Controller
{
    use FileTraits;

    // registered as subcontractor to bid project
    public function registerSubcontractor(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip_postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'contact_person_name' => 'required|string|max:255',
            'contact_person_email' => 'required|email|max:255',
            'contact_person_phone' => 'required|string|max:20',
            'business_license_number' => 'nullable|string|max:255',
            'insurance_provider' => 'nullable|string|max:255',
            'insurance_policy_number' => 'nullable|string|max:255',
            'certifications' => 'nullable|string|max:255',
            'previous_projects' => 'nullable|string',
            'construction_scope' => 'nullable|string',
            'engineering_scope' => 'nullable|string',
            'other_scope_name' => 'nullable|string|max:255',
            'other_scope_details' => 'nullable|string',
            'business_license_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'insurance_certificate_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'certifications_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'agreement_to_terms' => 'required|boolean',
        ]);

        // Upload business license file
        if ($request->hasFile('business_license_file')) {
            $validatedData['business_license_file'] = $this->uploadFile($request->file('business_license_file'), 'uploads/contractor_files');
        }

        // Upload insurance certificate file
        if ($request->hasFile('insurance_certificate_file')) {
            $validatedData['insurance_certificate_file'] = $this->uploadFile($request->file('insurance_certificate_file'), 'uploads/contractor_files');
        }

        // Upload certifications file
        if ($request->hasFile('certifications_file')) {
            $validatedData['certifications_file'] = $this->uploadFile($request->file('certifications_file'), 'uploads/contractor_files');
        }

        // Convert JSON fields
        $validatedData['construction_scope'] = json_encode($request->construction_scope);
        $validatedData['engineering_scope'] = json_encode($request->engineering_scope);

        // Create the contractor registration record
        $contractor = ContractorRegistration::create($validatedData);

        return response()->json([
            'message' => 'Contractor registered successfully',
            'contractor' => $contractor
        ], 201);
    }


    private function uploadFile($file, $directory)
    {
        $destinationPath = public_path($directory); 
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true); 
        }
    
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName); 
    
        return $directory . '/' . $fileName;  
    }


    // bid submited by contractors
    public function proposalSubmit(Request $request)
    {
        // dd($request->all());
        try {
            $validatedData = $request->validate([
                'project_id' => 'required|integer',
                'subcontractor_id' => 'required|integer',
                'proposal' => 'required|string',
                'total_bid_amount' => 'required|numeric',
                'breakdown_of_costs' => 'required|string',
                'payment_terms' => 'required|string',
                'warranties' => 'nullable|string',
                'signature' => 'required|string',
                'date_of_signing' => 'required|date',
                'attachments' => 'nullable|array',
                'attachments.*' => 'nullable|string|max:255', // Validate each attachment
                'status' => 'required|string|max:20',
            ]);

            // Check if the user has already submitted a bid for this project
            $existingProposal = SubcontractorProposal::where('project_id', $validatedData['project_id'])
                ->where('subcontractor_id', $validatedData['subcontractor_id'])
                ->first();

            if ($existingProposal) {
                return response()->json(['message' => 'You have already submitted a proposal for this project.'], 409);
            }

            $project = Project::findOrFail($request->project_id);
            $bidEmailData = [
                'project_name' => $project->name,
            ];

            $validatedData['attachments'] = json_encode($validatedData['attachments']);
            // dd($validatedData);

            // Save the data to the database
            $proposal = SubcontractorProposal::create($validatedData);

            // send email notification 
            Mail::to(config('mail.admin.address'))->send(new BidNotification($bidEmailData));

            return response()->json(['message' => 'Proposal submitted successfully', 'proposal' => $proposal], 201);
        } catch (\Exception $e) {
            // Log the error (optional)
            Log::error('Error submitting proposal: ' . $e->getMessage());

            return response()->json(['message' => 'An error occurred while submitting the proposal.', $e->getMessage()], 500);
        }
    }

    public function getRegisterContractor()
    {

        try {
            if (!auth()->check()) {
                return response([
                    'message' => 'You are not a authenticated Contractor',
                    'status' => false,
                ], 401); // Unauthorized
            }

            $user = auth()->user();
            // dd($user);
            $contractor = ContractorRegistration::where('user_id', $user->id)->get();
            // dd($contractor);
            // return response([
            //     // 'message' => 'Logged user data',
            //     'status' => true,
            //     'data' => $contractor,
            //     // 'user' => new UserResource($logged_user),
            // ], 200);
            return response()->json(['contractor' => $contractor], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while submitting the proposal.', $e->getMessage()], 500);
        }
    }
}
