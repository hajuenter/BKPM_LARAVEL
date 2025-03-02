<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function showPendidikan()
    {
        $dataPendidikan = Pendidikan::all();
        return view('backend.pendidikan.pendidikan', compact('dataPendidikan'));
    }

    public function showPendidikanAdd()
    {
        return view('backend.pendidikan.addpendidikan');
    }

    public function storePendidikan(Request $request)
    {
        // Validasi dengan pesan error custom
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|integer|min:1|max:8',
            'tahun_masuk' => 'required|integer|min:1900|max:' . date('Y'),
            'tahun_keluar' => [
                'required',
                'integer',
                'min:1900',
                'max:' . date('Y'),
                function ($attribute, $value, $fail) use ($request) {
                    if ($value && $value < $request->tahun_masuk) {
                        $fail('Tahun keluar tidak boleh lebih kecil dari tahun masuk.');
                    }
                }
            ]
        ], [
            'nama.required' => 'Nama pendidikan wajib diisi.',
            'nama.string' => 'Nama pendidikan harus berupa teks.',
            'nama.max' => 'Nama pendidikan maksimal 255 karakter.',

            'tingkatan.required' => 'Tingkatan wajib diisi.',
            'tingkatan.integer' => 'Tingkatan harus berupa angka.',
            'tingkatan.min' => 'Minimal tingkatan adalah 1 (SD).',
            'tingkatan.max' => 'Maksimal tingkatan adalah 6 (S3).',

            'tahun_masuk.required' => 'Tahun masuk wajib diisi.',
            'tahun_masuk.integer' => 'Tahun masuk harus berupa angka.',
            'tahun_masuk.min' => 'Tahun masuk minimal 1900.',
            'tahun_masuk.max' => 'Tahun masuk tidak boleh lebih dari tahun sekarang.',

            'tahun_keluar.required' => 'Tahun keluar wajib diisi.',
            'tahun_keluar.integer' => 'Tahun keluar harus berupa angka.',
            'tahun_keluar.min' => 'Tahun keluar minimal 1900.',
            'tahun_keluar.max' => 'Tahun keluar tidak boleh lebih dari tahun sekarang.',
        ]);

        // Simpan ke database
        Pendidikan::create([
            'nama' => $request->nama,
            'tingkatan' => $request->tingkatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('pendidikan.backend')->with('success', 'Data pendidikan berhasil disimpan!');
    }

    public function editPendidikan($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        return view('backend.pendidikan.editpendidikan', compact('pendidikan'));
    }

    public function updatePendidikan(Request $request, $id)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|integer|min:1|max:8',
            'tahun_masuk' => 'required|integer|min:1900|max:' . date('Y'),
            'tahun_keluar' => [
                'required',
                'integer',
                'min:1900',
                'max:' . date('Y'),
                function ($attribute, $value, $fail) use ($request) {
                    if ($value && $value < $request->tahun_masuk) {
                        $fail('Tahun keluar tidak boleh lebih kecil dari tahun masuk.');
                    }
                }
            ]
        ], [
            'nama.required' => 'Nama pendidikan wajib diisi.',
            'nama.string' => 'Nama pendidikan harus berupa teks.',
            'nama.max' => 'Nama pendidikan maksimal 255 karakter.',

            'tingkatan.required' => 'Tingkatan wajib diisi.',
            'tingkatan.integer' => 'Tingkatan harus berupa angka.',
            'tingkatan.min' => 'Minimal tingkatan adalah 1 (SD).',
            'tingkatan.max' => 'Maksimal tingkatan adalah 6 (S3).',

            'tahun_masuk.required' => 'Tahun masuk wajib diisi.',
            'tahun_masuk.integer' => 'Tahun masuk harus berupa angka.',
            'tahun_masuk.min' => 'Tahun masuk minimal 1900.',
            'tahun_masuk.max' => 'Tahun masuk tidak boleh lebih dari tahun sekarang.',

            'tahun_keluar.required' => 'Tahun keluar wajib diisi.',
            'tahun_keluar.integer' => 'Tahun keluar harus berupa angka.',
            'tahun_keluar.min' => 'Tahun keluar minimal 1900.',
            'tahun_keluar.max' => 'Tahun keluar tidak boleh lebih dari tahun sekarang.',
        ]);

        // Update Data
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->update([
            'nama' => $request->nama,
            'tingkatan' => $request->tingkatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        return redirect()->route('pendidikan.backend')->with('success', 'Data pendidikan berhasil diperbarui!');
    }

    public function deletePendidikan($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();

        return redirect()->route('pendidikan.backend')->with('success', 'Data pendidikan berhasil dihapus!');
    }
}
