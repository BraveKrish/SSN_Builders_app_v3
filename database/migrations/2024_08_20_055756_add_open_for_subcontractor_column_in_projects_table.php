<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('project_plans')->nullable()->after('end_date');
            $table->text('ohter_requirements')->nullable()->after('end_date');
            $table->boolean('open_for_contractors')->default(false)->after('location');
            $table->string('subcontractor_category')->nullable()->after('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('open_for_contractors');
            $table->dropColumn('other_requirements');
            $table->dropColumn('project_plans');
            $table->dropColumn('subcontractor_category');
        });
    }
};
