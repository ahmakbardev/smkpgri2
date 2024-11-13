<?php

namespace App\Http\Controllers;

use App\Models\FasilitasBidang;
use App\Models\ListFacility;
use Illuminate\Http\Request;

class FasilitasBidangController extends Controller
{
    // Index for loading both FasilitasBidang and its facilities
    public function index()
    {
        $bidangs = FasilitasBidang::with('facilities')->get();
        return view('admins.fasilitas.index', compact('bidangs'));
    }

    // Edit Bidang
    public function editBidang(FasilitasBidang $bidang)
    {
        return response()->json($bidang); // Return the Bidang as JSON
    }

    // Edit Facility
    public function editFacility(ListFacility $facility)
    {
        return response()->json($facility); // Return the Facility as JSON
    }


    // Store new Bidang
    public function storeBidang(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $bidang = FasilitasBidang::create($validated);

        return response()->json(['message' => 'Bidang Fasilitas created successfully!', 'bidang' => $bidang]);
    }

    // Update an existing Bidang
    public function updateBidang(Request $request, FasilitasBidang $bidang)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $bidang->update($validated);
        return response()->json(['message' => 'Bidang Fasilitas updated successfully!', 'bidang' => $bidang]);
    }

    // Delete a Bidang
    public function destroyBidang(FasilitasBidang $bidang)
    {
        $bidang->delete();
        return response()->json(['message' => 'Bidang Fasilitas deleted successfully!']);
    }

    // Store a new Facility
    public function storeFacility(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'fasilitas_bidang_id' => 'required|exists:fasilitas_bidangs,id',
        ]);

        $facility = ListFacility::create($validated);

        return response()->json(['message' => 'Facility created successfully!', 'facility' => $facility]);
    }

    // Update an existing Facility
    public function updateFacility(Request $request, ListFacility $facility)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $facility->update($validated);

        return response()->json(['message' => 'Facility updated successfully!', 'facility' => $facility]);
    }

    // Delete a Facility
    public function destroyFacility(ListFacility $facility)
    {
        $facility->delete();
        return response()->json(['message' => 'Facility deleted successfully!']);
    }

    // Get facilities related to a specific Bidang
    public function getFacilities(FasilitasBidang $bidang)
    {
        $facilities = $bidang->facilities()->get();
        return response()->json(['facilities' => $facilities]);
    }
}
