<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksaController extends Controller
{
    // Menampilkan jadwal periksa milik dokter yang sedang login
    public function index()
    {
        $dokter = Auth::user();

        $jadwalPeriksas = JadwalPeriksa::where('id_dokter', $dokter->id)
            ->orderBy('hari')
            ->get();

        return view('dokter.jadwal-periksa.index', compact('jadwalPeriksas'));
    }

    // Menampilkan form tambah jadwal periksa
    public function create()
    {
        return view('dokter.jadwal-periksa.create');
    }

    // Menyimpan jadwal periksa baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'hari' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        // ID dokter diambil dari akun yang sedang login
        $validated['id_dokter'] = Auth::id();

        JadwalPeriksa::create($validated);

        return redirect()
            ->route('jadwal-periksa.index')
            ->with('message', 'Jadwal periksa berhasil ditambahkan.')
            ->with('type', 'success');
    }

    // Menampilkan form edit jadwal milik dokter yang login
    public function edit(string $id)
    {
        $jadwalPeriksa = JadwalPeriksa::where('id_dokter', Auth::id())
            ->findOrFail($id);

        return view('dokter.jadwal-periksa.edit', compact('jadwalPeriksa'));
    }

    // Memperbarui jadwal periksa
    public function update(Request $request, string $id)
    {
        // Pastikan jadwal milik dokter yang login
        $jadwalPeriksa = JadwalPeriksa::where('id_dokter', Auth::id())
            ->findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'hari' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        // Perbarui jadwal
        $jadwalPeriksa->update($validated);

        return redirect()
            ->route('jadwal-periksa.index')
            ->with('message', 'Jadwal periksa berhasil diperbarui.')
            ->with('type', 'success');
    }

    // Menghapus jadwal periksa
    public function destroy(string $id)
    {
        // Pastikan jadwal milik dokter yang login
        $jadwalPeriksa = JadwalPeriksa::where('id_dokter', Auth::id())
            ->findOrFail($id);

        $jadwalPeriksa->delete();

        return redirect()
            ->route('jadwal-periksa.index')
            ->with('message', 'Jadwal periksa berhasil dihapus.')
            ->with('type', 'success');
    }
}