<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::with('jabatan')->get();
        return view('admins.guru.index', compact('guru'));
    }

    public function create()
    {
        $jabatan = Jabatan::all()->unique('nama_jabatan'); // Mengambil jabatan unik berdasarkan nama
        return view('admins.guru.create', compact('jabatan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jabatan_id' => 'required|exists:jabatan,id',
            'sub_jabatan' => 'nullable|string|max:255', // Validasi sub-jabatan
        ]);

        $imagePath = $request->hasFile('images')
            ? $request->file('images')->store('public/guru')
            : null;

        Guru::create([
            'nama' => $validated['nama'],
            'images' => $imagePath ? str_replace('public/', 'storage/', $imagePath) : null,
            'jabatan_id' => $validated['jabatan_id'],
            'sub_jabatan' => $validated['sub_jabatan'], // Simpan sub-jabatan
        ]);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function edit(Guru $guru)
    {
        $jabatan = Jabatan::select('nama_jabatan', DB::raw("GROUP_CONCAT(IFNULL(sub_jabatan, '') SEPARATOR ',') as sub_jabatan"))
            ->groupBy('nama_jabatan')
            ->get();

        return view('admins.guru.edit', compact('guru', 'jabatan'));
    }

    public function update(Request $request, Guru $guru)
    {
        dd($request->all());
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jabatan_id' => 'required|exists:jabatan,id',
            'sub_jabatan' => 'nullable|string|max:255', // Validasi sub-jabatan
        ]);

        dd($validated); // Debug data setelah validasi

        // Handle upload gambar baru atau gunakan gambar lama
        $imagePath = $request->hasFile('images')
            ? $request->file('images')->store('public/guru')
            : $guru->images;

        if ($request->hasFile('images')) {
            if ($guru->images) {
                Storage::delete(str_replace('storage/', 'public/', $guru->images)); // Hapus gambar lama
            }
            $imagePath = str_replace('public/', 'storage/', $imagePath);
        }

        // Update data Guru
        $guru->update([
            'nama' => $validated['nama'],
            'images' => $imagePath,
            'jabatan_id' => $validated['jabatan_id'],
            'sub_jabatan' => $validated['sub_jabatan'], // Update sub_jabatan
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }


    public function destroy(Guru $guru)
    {
        if ($guru->images) {
            Storage::delete(str_replace('storage/', 'public/', $guru->images));
        }
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}
