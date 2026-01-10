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
        Schema::create('enrollments_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('berbinarp_users')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('berbinarp_class')->onDelete('cascade');
            $table->string('service_package')->nullable();
            $table->string('payment_proof_url')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->enum('status_kelas', ['pending_payment', 'enrolled', 'completed', 'expired'])->default('pending_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments_users');
    }
};
