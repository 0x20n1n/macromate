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
        Schema::create('calculations', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('age');
            $table->decimal('weight', 6, 2); // in kg or lbs
            $table->decimal('height', 6, 2); // in cm or inches
            $table->enum('gender', ['male', 'female']);
            $table->foreignId('activity_id')->constrained();
            $table->decimal('body_fat_percentage', 5, 2)->nullable();
            $table->enum('formula', ['mifflin_st_jeor', 'katch_mcardle'])->default('mifflin_st_jeor');
            $table->decimal('bmr', 8, 2); // Basal Metabolic Rate
            $table->decimal('tdee', 8, 2); // Total Daily Energy Expenditure
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculations');
    }
};
