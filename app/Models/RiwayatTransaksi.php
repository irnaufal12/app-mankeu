<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'jenis_transaksi', 'jumlah_masuk', 'jumlah_keluar', 'tgl_transaksi'
    ];

    public function user_id()
    {
        return $this->belongsTo(User::class);
    }
}
