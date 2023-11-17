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
        Schema::create('recurring_billings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('billing_id')->constrained();
            // Add a frequency field (e.g., 'monthly', 'half_year', 'yearly')
            $table->string('frequency');
            // Add a next_billing_date field to track when the next billing is scheduled
            $table->date('next_billing_date');
            // Add other recurring billing attributes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recurring_billings');
    }
};
