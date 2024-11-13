<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('html_lang')->nullable();
            $table->text('description')->nullable();
            $table->string('images')->nullable(); // untuk menyimpan URL gambar
            $table->string('alt')->nullable(); // untuk menyimpan teks alternatif gambar
        });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['html_lang', 'description', 'images', 'alt']);
        });
    }
};
