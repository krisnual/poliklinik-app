<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Menampilkan semua data obat
    public function index()
    {
        $obats = Obat::all();

        return view('admin.obat.index', compact('obats'));
    }

    // Menampilkan form tambah obat
    public function create()
    {
        return view('admin.obat.create');
    }

    // Menyimpan data obat baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kemasan' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
        ]);

        // Simpan data obat
        Obat::create($validated);

        return redirect()
            ->route('obat.index')
            ->with('message', 'Data obat berhasil ditambahkan.')
            ->with('type', 'success');
    }

    // Menampilkan form edit obat
    public function edit(string $id)
    {
        $obat = Obat::findOrFail($id);

        return view('admin.obat.edit', compact('obat'));
    }

    // Memperbarui data obat
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kemasan' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
        ]);

        // Cari data obat
        $obat = Obat::findOrFail($id);

        // Perbarui data
        $obat->update($validated);

        return redirect()
            ->route('obat.index')
            ->with('message', 'Data obat berhasil diperbarui.')
            ->with('type', 'success');
    }

    // Menghapus data obat
    public function destroy(string $id)
    {
        $obat = Obat::findOrFail($id);

        $obat->delete();

        return redirect()
            ->route('obat.index')
            ->with('message', 'Data obat berhasil dihapus.')
            ->with('type', 'success');
    }
}