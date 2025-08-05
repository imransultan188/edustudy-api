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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('university_id')->constrained()->onDelete('cascade');
            $table->foreignId('level_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Course name
            $table->string('slug')->unique(); // URL-friendly
            $table->text('overview')->nullable(); // Course overview
            $table->enum('class_type', ['full-time', 'part-time', 'online'])->default('full-time');
            $table->decimal('total_fees', 12, 2)->nullable();
            $table->string('currency', 10)->default('MYR');
            $table->string('duration')->nullable(); // e.g. "4 years"
            $table->unsignedTinyInteger('english_requirement')->nullable(); // e.g. IELTS score
            $table->boolean('offer_letter_free')->default(true);
            $table->string('credit_hours')->nullable(); // e.g. "127"
            $table->json('intakes')->nullable(); // ["January", "July", "October"]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
