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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID
            $table->string('title');  // Job title
            $table->text('description');  // Detailed job description
            $table->enum('job_type', ['full-time', 'part-time']);  // Job type
            $table->enum('job_category', ['engineer', 'construction', 'field management', 'preconstruction', 'project management', 'marketing']);  // Job category
            $table->date('posted_date');  // Date the job was posted
            $table->string('location');  // Job location
            $table->date('application_deadline');  // Deadline for applications
            $table->string('level')->nullable();  // Job level
            $table->enum('status', ['open', 'closed']);  // Job status
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
