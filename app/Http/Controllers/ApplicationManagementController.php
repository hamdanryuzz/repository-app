<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApplicationManagementController extends Controller
{
    public function index()
    {
        $applications = Applications::all();
        return view('applications-management', compact('applications'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'requirements' => 'nullable|json',
            'guides' => 'nullable|json',
            'source_code_link' => 'nullable',
            'file_path' => 'nullable',
            'thumbnail' => 'nullable',
            'latest_version' => 'nullable',
            'status' => 'required',
        ]);

        // Simpan data ke database
        Applications::create([
            'name' => $request->name,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'guides' => $request->guides,
            'source_code_link' => $request->source_code_link,
            'file_path' => $request->file_path,
            'thumbnail' => $request->thumbnail,
            'latest_version' => $request->latest_version,
            'status' => $request->status,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('applications-management')->with('success', 'Application added successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'requirements' => 'nullable|json',
            'guides' => 'nullable|json',
            'source_code_link' => 'nullable',
            'file_path' => 'nullable',
            'thumbnail' => 'nullable',
            'latest_version' => 'nullable',
            'status' => 'required',
        ]);

        // Update data di database
        $application = Applications::findOrFail($id);
        $application->update([
            'name' => $request->name,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'guides' => $request->guides,
            'source_code_link' => $request->source_code_link,
            'file_path' => $request->file_path,
            'thumbnail' => $request->thumbnail,
            'latest_version' => $request->latest_version,
            'status' => $request->status,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('applications-management')->with('success', 'Application updated successfully.');
    }

    public function destroy($id)
    {
        // Cari aplikasi berdasarkan ID dan hapus
        $application = Applications::findOrFail($id);
        $application->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('applications-management')->with('success', 'Application deleted successfully.');
    }
}
