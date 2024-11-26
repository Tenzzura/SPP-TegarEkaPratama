<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Spp;
use Carbon\Carbon;

class PembayaranSeeder extends Seeder
{
    public function run()
    {
        // Get existing user and SPP
        $user = User::first();
        $spp = Spp::first();

        Pembayaran::create([
            'id_petugas' => $user->id,
            'nisn' => '1187711111',
            'tgl_bayar' => Carbon::now(),
            'bulan_dibayar' => 'Januari',
            'tahun_dibayar' => '2024',
            'id_spp' => $spp->id,
            'jumlah_bayar' => 500000,
        ]);

        Pembayaran::create([
            'id_petugas' => $user->id,
            'nisn' => '1187711111',
            'tgl_bayar' => Carbon::now(),
            'bulan_dibayar' => 'Februari',
            'tahun_dibayar' => '2024',
            'id_spp' => $spp->id,
            'jumlah_bayar' => 500000,
        ]);

        // Add more payment records if needed
    }
}
