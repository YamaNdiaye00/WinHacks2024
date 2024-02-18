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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Non-nullable title
            $table->string('description')->nullable(); // Nullable description
            $table->string('link')->nullable(); // Nullable link
            $table->unsignedBigInteger('score'); // Score field
            $table->foreignId('session_id')->constrained(); // Foreign key to sessions table
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
