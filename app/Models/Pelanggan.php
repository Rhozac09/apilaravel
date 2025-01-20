<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    // use HasFactory;

    protected $table = 'pelanggan';
    protected $fillable = [
        'nama',
        'alamat',
        'kode',
        'no_telp',
        'paket',
        'tanggal_pendaftaran',
    ];
}
