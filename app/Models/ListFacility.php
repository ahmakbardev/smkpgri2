<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListFacility extends Model
{
    use HasFactory;

    protected $table = 'list_facility';

    protected $fillable = ['fasilitas_bidang_id', 'name'];

    // Relasi ke FasilitasBidang
    public function fasilitasBidang()
    {
        return $this->belongsTo(FasilitasBidang::class, 'fasilitas_bidang_id');
    }
}
