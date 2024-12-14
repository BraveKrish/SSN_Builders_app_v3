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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID
            $table->foreignId('job_id')->constrained('job_listings')->onDelete('cascade');  // Foreign key to jobs table
            $table->string('name');  // Candidate's name
            $table->string('email');  // Candidate's email
            $table->string('phone');  // Candidate's phone number
            $table->string('resume_url');  // URL to the candidate's resume
            $table->date('application_date');  // Date when the application was submitted
            $table->enum('status', ['received', 'under review', 'rejected']);  // Application status
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
