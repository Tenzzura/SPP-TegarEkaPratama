<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelases = Kelas::paginate(5);
        return view('kelas.index', compact('kelases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'kompetensi_keahlian' => 'required|string|max:255',
        ]);
        
        try {
            $kelas = Kelas::create([
                'nama_kelas' => $request->nama_kelas,
                'kompetensi_keahlian' => $request->kompetensi_keahlian,
            ]);
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }
    
        return redirect()->route('kelas.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Kelas $kelas)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'kompetensi_keahlian' => 'required|string|max:255',
        ]);

        try {
            $kelas = Kelas::find($id);
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->kompetensi_keahlian = $request->kompetensi_keahlian;
        
            $kelas->save();
        
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }
        
        return redirect('kelas')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $kelas = Kelas::findOrFail($id);
            $kelas->delete();
            return redirect()->route('kelas.index')->with('success', 'Data Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }
}
