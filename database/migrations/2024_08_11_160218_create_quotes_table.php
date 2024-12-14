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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('email');
            $table->string('phone');
            $table->string('project_name');
            $table->string('project_location');
            $table->string('project_category');
            $table->string('project_details_file');
            $table->decimal('total_estimate', 15, 2)->nullable();
            $table->timestamp('submission_date')->useCurrent();
            // $table->enum('status', ['pending', 'reviewed', 'accepted', 'rejected'])->default('pending');
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->timestamp('response_date')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
