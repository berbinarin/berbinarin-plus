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
        Schema::create('berbinarp_class', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('name');
            $table->string('instructor_name')->nullable();
            $table->string('instructor_title')->nullable();
            $table->string('materi_info')->nullable();
            $table->decimal('rating', 2, 1)->nullable();
            $table->string('description')->nullable();
            $table->string('thumbnail');
            $table->json('syllabus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berbinarp_class');
    }
};
