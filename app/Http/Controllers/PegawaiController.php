<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index($nama)
    {
        return $nama;
    }

    // public function index(Request $request)
    // {
    //     return $request->segment(2);
    // }

    public function formulir()
    {
        return view('formulir');
    }

    public function proses(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.',
            'min' => ':attribute minimal harus :min karakter.',
            'max' => ':attribute maksimal harus :max karakter.'
        ];

        $request->validate([
            'nama' => 'required|min:3|max:20',
            'alamat' => 'required|min:5|max:100'
        ], $messages);

        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        return "Nama : " . $nama . ", Alamat : " . $alamat;
    }
}
