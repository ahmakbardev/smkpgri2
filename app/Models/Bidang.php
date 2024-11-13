<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Definisi relasi ke jurusans
    public function jurusans()
    {
        return $this->hasMany(Jurusan::class, 'bidang_id');
    }
}
