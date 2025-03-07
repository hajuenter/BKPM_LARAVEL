<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class UploadController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function proses_upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            'keterangan' => 'required'
        ], [
            'file.required' => 'File gambar wajib diunggah.',
            'file.mimes' => 'Format file harus jpg, jpeg, png, atau gif.',
            'file.max' => 'Ukuran file maksimal 2MB.',
            'keterangan.required' => 'Keterangan wajib diisi.'
        ]);

        // Menyimpan file yang diupload ke variabel $file
        $file = $request->file('file');

        echo 'File Name: ' . $file->getClientOriginalName() . '<br>';
        echo 'File Extension: ' . $file->getClientOriginalExtension() . '<br>';
        echo 'File Size: ' . $file->getSize() . '<br>';
        echo 'File Mime Type: ' . $file->getMimeType() . '<br>';

        $tujuan_upload = public_path('data_file');

        $file->move($tujuan_upload, $file->getClientOriginalName());

        return back()->with('success', 'File berhasil diupload!');
    }

    public function viewResize()
    {
        return view('upload_resize');
    }

    public function proses_upload_resize(Request $request, ImageManager $imageManager)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'keterangan' => 'required',
        ]);

        // Tentukan path lokasi upload
        $path = public_path('img/logo');

        // Jika folder belum ada, buat foldernya
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        // Ambil file dari form
        $file = $request->file('file');

        // Buat nama file unik
        $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Baca gambar menggunakan ImageManager
        $image = $imageManager->read($file->getRealPath());

        $resizedImage = $image->cover(200, 200);

        // Simpan hasil gambar ke folder
        file_put_contents($path . '/' . $fileName, $resizedImage->toJpeg());

        return redirect(route('upload.resize'))->with('success', 'Data berhasil ditambahkan!');
    }
}
