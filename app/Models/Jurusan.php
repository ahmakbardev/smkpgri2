<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'bidang_id'];

    // Definisi relasi ke bidang
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
}
