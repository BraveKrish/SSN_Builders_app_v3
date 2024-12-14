<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contractor_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('company_name');
            $table->string('company_address');
            $table->string('city');
            $table->string('zip_postal_code');
            $table->string('country');
            $table->string('website')->nullable();
            $table->string('contact_person_name');
            $table->string('contact_person_email');
            $table->string('contact_person_phone');

            // Company Details
            $table->string('business_license_number')->nullable();
            $table->string('insurance_provider')->nullable();
            $table->string('insurance_policy_number')->nullable();
            $table->string('certifications')->nullable(); // ISO, OSHA, etc.
            $table->text('previous_projects')->nullable();

            // Scope of Work
            $table->json('construction_scope')->nullable(); // Checkbox with 5 dummy areas
            $table->json('engineering_scope')->nullable(); // Checkbox with 5 dummy areas
            $table->string('other_scope_name')->nullable();
            $table->text('other_scope_details')->nullable();

            // Supporting Documents
            $table->string('business_license_file')->nullable();
            $table->string('insurance_certificate_file')->nullable();
            $table->string('certifications_file')->nullable();

            // Other Fields
            $table->boolean('agreement_to_terms')->default(false);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contractor_registrations');
    }
};
