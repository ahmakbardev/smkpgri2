<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $fillable = ['nama', 'images', 'jabatan_id', 'sub_jabatan'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
