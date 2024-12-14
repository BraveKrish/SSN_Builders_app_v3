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
        Schema::create('subcontractor_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade'); // Reference to the projects table
            $table->foreignId('subcontractor_id')->constrained('contractor_registrations')->onDelete('cascade'); // Reference to the subcontractors table
            $table->string('role'); // Role of the subcontractor in the project
            $table->text('contract_details'); // Detailed description of the contract
            $table->date('start_date'); // Start date of the contract
            $table->date('end_date'); // End date of the contract
            $table->enum('status', ['pending', 'active', 'completed', 'terminated'])->default('pending'); // Status of the contract
            $table->foreignId('bid_id')->constrained('subcontractor_bids')->onDelete('cascade'); // Reference to the subcontractor bids table
            $table->decimal('contract_amount', 15, 2); // Total contract amount
            $table->text('payment_terms'); // Payment terms for the contract
            $table->text('milestones')->nullable(); // Key milestones in the contract
            $table->integer('completion_percentage')->default(0); // Percentage of completion
            $table->text('notes')->nullable(); // Any additional notes
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcontractor_contracts');
    }
};
