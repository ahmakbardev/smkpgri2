<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\FasilitasBidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GlobalController extends Controller
{
    public function getJurusanByBidang(Bidang $bidang)
    {
        if (!$bidang) {
            return response()->json(['error' => 'Bidang not found'], 404);
        }

        // Pastikan relasi ke jurusans dimuat dengan benar
        $jurusans = $bidang->jurusans;

        return response()->json(['jurusans' => $jurusans]);
    }

    public function getListFacilitiesByBidang(FasilitasBidang $fasilitasBidang)
    {
        if (!$fasilitasBidang) {
            return response()->json(['error' => 'Fasilitas Bidang not found'], 404);
        }

        // Ambil data facilities terkait fasilitas_bidang_id
        $facilities = $fasilitasBidang->facilities;

        return response()->json(['facilities' => $facilities]);
    }
}
