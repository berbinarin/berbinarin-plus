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
        // Hapus kolom referral_source
        Schema::table('berbinarp_users', function (Blueprint $table) {
            $table->dropColumn('referral_source');
        });

        // Tambahkan kolom referral_source ke enrollments_users
        Schema::table('enrollments_users', function (Blueprint $table) {
            $table->string('referral_source')->nullable()->after('service_package');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berbinarp_users', function (Blueprint $table) {
            $table->string('referral_source')->nullable();
        });

        Schema::table('enrollments_users', function (Blueprint $table) {
            $table->dropColumn('referral_source');
        });
    }
};
