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
        Schema::table('articles', function (Blueprint $table) {
            // Menambahkan kolom status dengan tipe enum yang memiliki pilihan 'draft', 'published', dan 'archived'
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft')->after('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Menghapus kolom status jika rollback
            $table->dropColumn('status');
        });
    }
};
