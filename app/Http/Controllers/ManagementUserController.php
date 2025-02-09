<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementUserController extends Controller
{
    public function index()
    {
        $name = "ACH. BAHRUL MA'ARIP";
        $lesson = ["Mathematics", "Physics", "Biology"];
        return view('home', compact('name', 'lesson'));
    }

    public function create()
    {
        return "Ini halaman menampilkan form untuk tambah data";
    }

    public function store(Request $request)
    {
        return "Ini halaman store";
    }

    public function show($id)
    {
        return "Ini halaman show" . $id;
    }

    public function edit($id)
    {
        return "Ini halaman edit" . $id;
    }

    public function update(Request $request, $id)
    {
        return "Ini halaman update" . $id;
    }

    public function destroy($id)
    {
        return "Ini halaman destroy" . $id;
    }
}
