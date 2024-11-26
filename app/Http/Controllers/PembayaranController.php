<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Spp;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::paginate(5);
        $sppList = Spp::all();
        $siswaList = Siswa::all();
        $userList = User::all();
        return view('pembayaran.index', compact('pembayaran', 'sppList', 'siswaList', 'userList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $spp = Spp::all();
        $siswaList = Siswa::all();
        return view('pembayaran.create', compact('spp', 'siswaList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_bayar' => 'required', 'numeric',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required', 'numeric',
            'jumlah_dibayar' => 'required', 'numeric', 'min:1000',
        ]);
        
        try {
            $pembayaran = Pembayaran::create([
                'id_petugas' => Auth::user()->id,
                'nisn' => $request->nisn,
                'tgl_bayar' => $request->tgl_bayar,
                'bulan_dibayar' => $request->bulan_dibayar,
                'tahun_dibayar' => $request->tahun_dibayar,
                'jumlah_bayar' => $request->jumlah_bayar,
            ]);
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }
    
        return redirect()->route('pembayaran.index')->with('success', 'Data Berhasil Disimpan');
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
    public function edit(string $id_pembayaran, Pembayaran $pembayaran)
    {
        $pembayaran = Pembayaran::findOrFail($id_pembayaran);
        $siswaList = Siswa::all();
        return view('pembayaran.edit', compact('pembayaran', 'siswaList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_pembayaran)
    {
        try {
            $pembayaran = Pembayaran::find($id_pembayaran);
            $pembayaran->nisn = $request->nisn;
            $pembayaran->tgl_bayar = $request->tgl_bayar;
            $pembayaran->bulan_dibayar = $request->bulan_dibayar;
            $pembayaran->tahun_dibayar = $request->tahun_dibayar;
            $pembayaran->jumlah_bayar = $request->jumlah_bayar;
        
            $pembayaran->save();
        
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }
        
        return redirect('pembayaran')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pembayaran)
    {
        try {
            $pembayaran = Pembayaran::where('id_pembayaran', $id_pembayaran)->firstOrFail();
            $pembayaran->delete();
            return redirect()->route('pembayaran.index')->with('success', 'Data Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }

}
