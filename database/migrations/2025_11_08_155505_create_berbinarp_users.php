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
        Schema::create('berbinarp_users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->integer('age');
            $table->string('phone_number');
            $table->string('email');
            $table->string('last_education');
            $table->string('referral_source');
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('user_status_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berbinarp_users');
    }
};
