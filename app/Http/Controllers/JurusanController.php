<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $bidangs = Bidang::with('jurusans')->get();
        return view('admins.jurusans.index', compact('bidangs'));
    }

    public function storeBidang(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:bidangs']);
        $bidang = Bidang::create(['name' => $request->name]);

        return response()->json(['message' => 'Bidang created successfully!', 'bidang' => $bidang]);
    }

    // Edit Bidang
    public function editBidang(Bidang $bidang)
    {
        return response()->json($bidang);
    }

    // Edit Jurusan
    public function editJurusan(Jurusan $jurusan)
    {
        return response()->json($jurusan);
    }

    public function storeJurusan(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bidang_id' => 'required|exists:bidangs,id',
        ]);

        $jurusan = Jurusan::create([
            'name' => $request->name,
            'bidang_id' => $request->bidang_id,
        ]);

        return response()->json(['message' => 'Jurusan added successfully!', 'jurusan' => $jurusan]);
    }

    public function updateBidang(Request $request, Bidang $bidang)
    {
        $request->validate(['name' => 'required|string|unique:bidangs,name,' . $bidang->id]);
        $bidang->update(['name' => $request->name]);

        return response()->json(['message' => 'Bidang updated successfully!', 'bidang' => $bidang]);
    }

    public function updateJurusan(Request $request, Jurusan $jurusan)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $jurusan->update(['name' => $request->name]);

        return response()->json(['message' => 'Jurusan updated successfully!', 'jurusan' => $jurusan]);
    }

    public function destroyBidang(Bidang $bidang)
    {
        $bidang->delete();
        return response()->json(['message' => 'Bidang deleted successfully!']);
    }

    public function destroyJurusan(Jurusan $jurusan)
    {
        $jurusan->delete();
        return response()->json(['message' => 'Jurusan deleted successfully!']);
    }

    public function getJurusans(Bidang $bidang)
    {
        // Eager load the jurusans related to the selected bidang
        $jurusans = $bidang->jurusans()->get();

        return response()->json(['jurusans' => $jurusans]);
    }
}
