<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PengalamanKerja;
use Illuminate\Http\Request;

class PengalamanKerjaController extends Controller
{
    public function showPengalamanKerja()
    {
        $dataPengalamanKerja = PengalamanKerja::all();
        return view('backend.pengalamankerja.pengalamankerja', compact('dataPengalamanKerja'));
    }

    public function showPengalamanKerjaAdd()
    {
        return view('backend.pengalamankerja.addpengalamankerja');
    }

    public function storePengalamanKerja(Request $request)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'jabatan'      => 'required|string|max:255',
            'tahun_masuk'  => 'required|integer|min:1900|max:' . date('Y'),
            'tahun_keluar' => 'required|integer|min:1900|max:' . date('Y') . '|gte:tahun_masuk',
        ], [
            'nama.required'         => 'Nama harus diisi.',
            'jabatan.required'      => 'Jabatan harus diisi.',
            'tahun_masuk.required'  => 'Tahun masuk harus diisi.',
            'tahun_masuk.integer'   => 'Tahun masuk harus berupa angka.',
            'tahun_masuk.min'       => 'Tahun masuk tidak valid.',
            'tahun_masuk.required'       => 'Tahun masuk harus diisi.',
            'tahun_masuk.max'       => 'Tahun masuk tidak boleh lebih dari tahun sekarang.',
            'tahun_keluar.integer'  => 'Tahun keluar harus berupa angka.',
            'tahun_keluar.min'      => 'Tahun keluar tidak valid.',
            'tahun_keluar.max'      => 'Tahun keluar tidak boleh lebih dari tahun sekarang.',
            'tahun_keluar.gte'      => 'Tahun keluar tidak boleh lebih kecil dari tahun masuk.',
        ]);

        PengalamanKerja::create([
            'nama'         => $request->nama,
            'jabatan'      => $request->jabatan,
            'tahun_masuk'  => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        return redirect()->route('pengalamankerja.backend')->with('success', 'Data pengalaman kerja berhasil disimpan!');
    }

    public function editPengalamanKerja($id)
    {
        $pengalamanKerja = PengalamanKerja::findOrFail($id);
        return view('backend.pengalamankerja.editpengalamankerja', compact('pengalamanKerja'));
    }

    public function updatePengalamanKerja(Request $request, $id)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'jabatan'      => 'required|string|max:255',
            'tahun_masuk'  => 'required|integer|min:1900|max:' . date('Y'),
            'tahun_keluar' => 'required|integer|min:1900|max:' . date('Y') . '|gte:tahun_masuk',
        ], [
            'nama.required'         => 'Nama harus diisi.',
            'jabatan.required'      => 'Jabatan harus diisi.',
            'tahun_masuk.required'  => 'Tahun masuk harus diisi.',
            'tahun_masuk.integer'   => 'Tahun masuk harus berupa angka.',
            'tahun_masuk.min'       => 'Tahun masuk tidak valid.',
            'tahun_masuk.required'       => 'Tahun masuk harus diisi.',
            'tahun_masuk.max'       => 'Tahun masuk tidak boleh lebih dari tahun sekarang.',
            'tahun_keluar.integer'  => 'Tahun keluar harus berupa angka.',
            'tahun_keluar.min'      => 'Tahun keluar tidak valid.',
            'tahun_keluar.max'      => 'Tahun keluar tidak boleh lebih dari tahun sekarang.',
            'tahun_keluar.gte'      => 'Tahun keluar tidak boleh lebih kecil dari tahun masuk.',
        ]);

        $pengalamanKerja = PengalamanKerja::findOrFail($id);
        $pengalamanKerja->update([
            'nama'         => $request->nama,
            'jabatan'      => $request->jabatan,
            'tahun_masuk'  => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        return redirect()->route('pengalamankerja.backend')->with('success', 'Data pengalaman kerja berhasil diperbarui!');
    }

    // Hapus pengalaman kerja
    public function deletePengalamanKerja($id)
    {
        $pengalamanKerja = PengalamanKerja::findOrFail($id);
        $pengalamanKerja->delete();

        return redirect()->route('pengalamankerja.backend')->with('success', 'Data pengalaman kerja berhasil dihapus!');
    }
}
