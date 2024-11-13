<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'visi',
        'misi',
        'sejarah',
        'phone',
        'email',
        'address',
        'social_media',
        'maps_embed_url',
    ];

    protected $casts = [
        'misi' => 'array', // Misi akan di-cast ke array karena disimpan sebagai JSON
        'social_media' => 'array', // Social media juga di-cast ke array
    ];
}
