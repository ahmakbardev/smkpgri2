<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jabatan;
use Illuminate\Http\Request;
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
        $jabatan = Jabatan::all();
        return view('admins.guru.create', compact('jabatan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jabatan_id' => 'required|exists:jabatan,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('public/guru');
            $imagePath = str_replace('public/', 'storage/', $imagePath);
        }

        Guru::create([
            'nama' => $validated['nama'],
            'images' => $imagePath,
            'jabatan_id' => $validated['jabatan_id'],
        ]);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function edit(Guru $guru)
    {
        $jabatan = Jabatan::all();
        return view('admins.guru.edit', compact('guru', 'jabatan'));
    }

    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jabatan_id' => 'required|exists:jabatan,id',
        ]);

        if ($request->hasFile('images')) {
            if ($guru->images) {
                Storage::delete(str_replace('storage/', 'public/', $guru->images));
            }

            $imagePath = $request->file('images')->store('public/guru');
            $imagePath = str_replace('public/', 'storage/', $imagePath);
        } else {
            $imagePath = $guru->images;
        }

        $guru->update([
            'nama' => $validated['nama'],
            'images' => $imagePath,
            'jabatan_id' => $validated['jabatan_id'],
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
