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
        Schema::create('response_quotes', function (Blueprint $table) {
            $table->id();

            // Foreign key to the quotes table
            $table->foreignId('quote_id')
                ->constrained('quotes')
                ->onDelete('cascade');

            // Client Information (Pre-filled)
            // $table->string('name'); // From quotes table
            // $table->string('email'); // From quotes table
            // $table->string('phone'); // From quotes table
            // $table->string('project_name'); // From quotes table
            // $table->string('project_category'); // From quotes table
            // $table->string('project_location'); // From quotes table

            // Quote Response Details
            $table->decimal('total_cost', 15, 2)->nullable();
            $table->text('cost_breakdown')->nullable();
            $table->string('timeline_estimate')->nullable();
            $table->text('terms_and_conditions')->nullable();
            $table->text('additional_notes')->nullable();

            // Response Options
            // $table->enum('response_format', ['pdf', 'upload']);
            $table->string('generated_pdf')->nullable(); // Path to generated PDF
            $table->string('uploaded_file')->nullable(); // Path to uploaded file

            // Tracking Fields
            $table->timestamp('response_sent_at')->nullable(); // When the response was sent
            // $table->enum('response_status', ['draft', 'sent'])->default('draft'); // Status of the response
            $table->enum('response_status', ['draft', 'sent'])->default('draft'); // Status of the response

            // Timestamps
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('response_quotes');
    }
};
