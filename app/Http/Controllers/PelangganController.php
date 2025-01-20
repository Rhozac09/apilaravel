<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan semua pelanggan
    public function index()
    {
        return Pelanggan::all();
    }

    // Menambahkan pelanggan baru
    public function store(Request $request) {
        $pelanggan = new Pelanggan;
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->kode = $request->kode;
        $pelanggan->no_telp = $request->no_telp;
        $pelanggan->paket = $request->paket;
        $pelanggan->tanggal_pendaftaran = $request->tanggal_pendaftaran;
        $pelanggan->save();
        return response()->json([
            "pesan" => "pelanggan ditambahkan"
        ], 201);
    }

    // Menampilkan detail pelanggan berdasarkan ID
    public function show($id)
    {
        return Pelanggan::findOrFail($id);
    }

    // Memperbarui data pelanggan
    public function update(Request $request, $id)
    {
        // Find the pelanggan or return a 404 response
        $pelanggan = Pelanggan::find($id);
    
        if (!$pelanggan) {
            return response()->json([
                "pesan" => "pelanggan tidak ditemukan tod"
            ], 404);
        }
    
        // Update fields if they exist in the request
        $pelanggan->nama = $request->input('nama', $pelanggan->nama); // Use default value if not provided
        $pelanggan->alamat = $request->input('alamat', $pelanggan->alamat);
        $pelanggan->kode = $request->input('kode', $pelanggan->kode);
        $pelanggan->no_telp = $request->input('no_telp', $pelanggan->no_telp);
        $pelanggan->paket = $request->input('paket', $pelanggan->paket);
        $pelanggan->tanggal_pendaftaran = $request->input('tanggal_pendaftaran', $pelanggan->tanggal_pendaftaran);
        $pelanggan->save();
    
        return response()->json([
            "pesan" => "pelanggan diupdate",
            // $request->input('nama')
        ], 200); // Use 200 for success
    }

    // Menghapus pelanggan
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return response()->json(['message' => 'Pelanggan berhasil dihapus']);
    }
}
