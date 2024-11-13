<?php

namespace App\Http\Controllers;

use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class SchoolProfileController extends Controller
{
    public function visiMisiForm()
    {
        // Mengambil data profil sekolah yang pertama (jika ada)
        $schoolProfile = SchoolProfile::first();

        return view('admins.school_profile.visi_misi', compact('schoolProfile'));
    }

    public function storeOrUpdateVisiMisi(Request $request)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|array', // Misi diharapkan berupa array untuk disimpan sebagai JSON
            'misi.*' => 'string', // Setiap item di array misi harus berupa string
        ]);

        $data = [
            'visi' => $request->input('visi'),
            'misi' => json_encode($request->input('misi')), // Simpan misi sebagai JSON
        ];

        $schoolProfile = SchoolProfile::first();

        if ($schoolProfile) {
            // Update jika data sudah ada
            $schoolProfile->update($data);
            return redirect()->route('school_profile.visi_misi_form')->with('success', 'Visi dan Misi berhasil diperbarui.');
        } else {
            // Create jika data belum ada
            SchoolProfile::create($data);
            return redirect()->route('school_profile.visi_misi_form')->with('success', 'Visi dan Misi berhasil disimpan.');
        }
    }

    public function sejarahForm()
    {
        // Mengambil data profil sekolah yang pertama (jika ada)
        $schoolProfile = SchoolProfile::first();

        return view('admins.school_profile.sejarah', compact('schoolProfile'));
    }

    public function storeOrUpdateSejarah(Request $request)
    {
        $request->validate([
            'sejarah' => 'required|string', // Sejarah harus berupa string
        ]);

        $data = [
            'sejarah' => $request->input('sejarah'),
        ];

        $schoolProfile = SchoolProfile::first();

        if ($schoolProfile) {
            // Update jika data sudah ada
            $schoolProfile->update($data);
            return redirect()->route('school_profile.sejarah_form')->with('success', 'Sejarah berhasil diperbarui.');
        } else {
            // Create jika data belum ada
            SchoolProfile::create($data);
            return redirect()->route('school_profile.sejarah_form')->with('success', 'Sejarah berhasil disimpan.');
        }
    }
}
