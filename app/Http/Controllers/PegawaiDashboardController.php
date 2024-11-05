<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::orderBy('created_at', 'desc')->get();
        return view('backend.index', compact('pegawai'));
    }

    public function api() {
        // Fetch all employees
        $pegawais = Pegawai::all();

        // Return as JSON response
        return response()->json($pegawais);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawais,email',
            'phone' => 'required|string|max:15',
            'birthdate' => 'required|date_format:m/d/Y',
            'address' => 'required|string',
            'position' => 'required|string',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date_format:m/d/Y',
            'employment_status' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            $fotoPath = $request->file('photo')->store('uploads/foto_pegawai', 'public');
            $validatedData['photo'] = $fotoPath;
        } else {
            $validatedData['photo'] = null;
        }

        $validatedData['birthdate'] = Carbon::createFromFormat('m/d/Y', $validatedData['birthdate'])->format('Y-m-d');
        $validatedData['hire_date'] = Carbon::createFromFormat('m/d/Y', $validatedData['hire_date'])->format('Y-m-d');

        $validatedData['salary'] = str_replace('.', '', $validatedData['salary']);
        $validatedData['salary'] = str_replace(',', '.', $validatedData['salary']);


        Pegawai::create($validatedData);

        return redirect()->route('pegawai')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        return view('backend.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('backend.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validatedData = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'birthdate' => 'required|date_format:m/d/Y',
            'address' => 'required|string',
            'position' => 'required|string',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date_format:m/d/Y',
            'employment_status' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            if ($pegawai->photo) {
                Storage::disk('public')->delete($pegawai->photo);
            }
            $fotoPath = $request->file('photo')->store('uploads/foto_pegawai', 'public');
            $validatedData['photo'] = $fotoPath;
        } else {
            $validatedData['photo'] = $pegawai->photo;
        }

        $validatedData['birthdate'] = Carbon::createFromFormat('m/d/Y', $validatedData['birthdate'])->format('Y-m-d');
        $validatedData['hire_date'] = Carbon::createFromFormat('m/d/Y', $validatedData['hire_date'])->format('Y-m-d');

        $validatedData['salary'] = str_replace('.', '', $validatedData['salary']);
        $validatedData['salary'] = str_replace(',', '.', $validatedData['salary']);

        $pegawai->update($validatedData);

        return redirect()->route('pegawai')->with('success', 'Pegawai berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $file_path = 'public/' . $pegawai->photo;

        if ($pegawai->photo && Storage::exists($file_path)) {
            Storage::delete($file_path);
        }

        $pegawai->delete();

        return redirect()->route('pegawai')->with('success', 'Pegawai berhasil dihapus!');
    }

    public function dashboard() {
        return view('welcome');
    }
}
