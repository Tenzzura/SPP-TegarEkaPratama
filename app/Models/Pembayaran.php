<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_petugas',
        'nisn',
        'tgl_bayar',
        'bulan_dibayar',
        'tahun_dibayar',
        'jumlah_bayar',
    ];

    public function spp()
    {
        return $this->belongsTo(Spp::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_petugas');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn');
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
