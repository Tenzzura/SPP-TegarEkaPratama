<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $pembayaran = Pembayaran::all();
        $siswa = Siswa::all();
        return view('dashboard', compact('pembayaran', 'siswa'));
    }
}
