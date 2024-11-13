<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasBidang extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relasi ke ListFacility
    public function facilities()
    {
        return $this->hasMany(ListFacility::class, 'fasilitas_bidang_id');
    }
}
