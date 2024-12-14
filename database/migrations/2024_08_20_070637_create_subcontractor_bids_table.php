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
        Schema::create('subcontractor_bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade'); // Reference to the projects table
            $table->foreignId('subcontractor_id')->constrained('contractor_registrations')->onDelete('cascade'); // Reference to the subcontractors table
            $table->text('proposal'); // Proposal for specific work, e.g., electrical work
            $table->decimal('total_bid_amount', 15, 2); // Total bid amount
            $table->text('breakdown_of_costs'); // Breakdown of costs in text area
            $table->text('payment_terms'); // Payment terms
            $table->text('warranties')->nullable(); // Details of warranties
            $table->string('signature'); // Signature of the subcontractor
            $table->date('date_of_signing'); // Date of signing
            $table->json('attachments')->nullable(); // Path to attachments
            $table->enum('status', ['submitted', 'under_review', 'accepted', 'rejected'])->default('submitted'); // Status of the proposal
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcontractor_bids');
    }
};
