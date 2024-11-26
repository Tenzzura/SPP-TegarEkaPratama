<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::paginate(5);
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelasList = Kelas::all(); 
        $sppList = Spp::all(); 
        return view('siswa.create', compact('kelasList', 'sppList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nisn' => 'required|unique:siswa|min:10|max:10',
            'nis' => 'required|unique:siswa|min:6|max:10',
            'nama' => 'required|string',
            'id_kelas' => 'required',
            'alamat' => 'required|string',
            'no_telp' => 'required|min:9|numeric',
            'id_spp' => 'required',
        ]);

        try {
            $siswa = Siswa::create([
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'nama' => $request->nama,
                'id_kelas' => $request->id_kelas,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'id_spp' => $request->id_spp,
            ]);

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');  
        }
        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Disimpan');
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
    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelasList = Kelas::all();
        $sppList = Spp::all();
        return view('siswa.edit', compact('siswa', 'kelasList', 'sppList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nisn' => 'required|unique:siswa,nisn,'.$id,
            'nis' => 'required|unique:siswa,nis,'.$id,
            'nama' => 'required|string',
            'id_kelas' => 'required',
            'alamat' => 'required|string',
            'no_telp' => 'required|min:9|numeric',
            'id_spp' => 'required',
        ]);

        try {
            $siswa = Siswa::find($id);
            $siswa->nisn = $request->nisn;
            $siswa->nis = $request->nis;
            $siswa->nama = $request->nama;
            $siswa->id_kelas = $request->id_kelas;
            $siswa->alamat = $request->alamat;
            $siswa->no_telp = $request->no_telp;
            $siswa->id_spp = $request->id_spp;
            $siswa->save();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }
        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
