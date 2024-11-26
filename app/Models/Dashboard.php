<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nama_siswa');
    }

    public function remainingBalance()
    {
        $totalNominalDue = $this->siswa->spp->nominal * $this->calculateMonthsCovered();
        return max(0, $totalNominalDue - $this->jumlah_bayar);
    }

    public function isPaidOff()
    {
        return $this->remainingBalance() <= 0;
    }

    public function calculateMonthsCovered()
    {
        return (int) floor($this->jumlah_bayar / $this->siswa->spp->nominal);
    }
}
