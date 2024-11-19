<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function create()
    {
        $penulis = User::where('role', 'Penulis')->latest()->get(); // Ambil semua user dengan role Penulis
        return view('users.create', compact('penulis')); // Kirim data ke view
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Penulis',
        ]);

        return redirect()->route('users.create')->with('success', 'User berhasil ditambahkan sebagai Penulis!');
    }

    public function index()
    {
        $user = auth()->user(); // Ambil data user yang sedang login
        return view('penulis.index', compact('user')); // Kirim data user ke view
    }

    public function update(Request $request)
    {
        $user = auth()->user(); // Ambil user yang sedang login

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Siapkan data untuk update
        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('profile_picture')) {
            // Hapus gambar lama jika ada
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }
            // Simpan gambar baru
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $updateData['profile_picture'] = $path;
        }

        // Lakukan update langsung tanpa save()
        DB::table('users')->where('id', $user->id)->update($updateData);

        return redirect()->route('penulis.dashboard')->with('success', 'Profile updated successfully.');
    }
}
