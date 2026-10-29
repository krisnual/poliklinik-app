<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DaftarPoli;

class JadwalPeriksa extends Model
{
    protected $table = 'jadwal_periksa';

    protected $fillable = [
        'id_dokter',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

    // Relasi jadwal dengan dokter
    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }

    // Relasi jadwal dengan daftar poli
    public function daftarPolis()
    {
        return $this->hasMany(DaftarPoli::class, 'id_jadwal');
    }
}