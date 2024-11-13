<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('visi');
            $table->text('misi')->nullable(); // Menyimpan misi dalam bentuk JSON
            $table->text('sejarah')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->json('social_media')->nullable(); // Untuk menyimpan link sosial media
            $table->string('maps_embed_url')->nullable(); // Untuk URL embed Google Maps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_profiles');
    }
};
