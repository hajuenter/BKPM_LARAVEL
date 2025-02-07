<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewUser()
    {
        return view('user.add_user');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        return view('user.result', compact('name', 'email'));
    }

    public function showProfile()
    {
        return "Ini halaman profil pengguna.";
    }

    public function generateProfileUrl()
    {
        $url = route('profileya');
        return "URL adalah: " . $url;
    }

    public function redirectToProfile()
    {
        return redirect()->route('profileya');
    }

    public function dashboardL()
    {
        return "Ini halaman Dashboard yang sudah login.";
    }

    public function profileL()
    {
        return "Ini halaman Profil yang sudah login.";
    }

    public function settingsL()
    {
        return "Ini halaman Pengaturan yang sudah login.";
    }

    public function info()
    {
        return "Ini dari info User Controller namespace";
    }
}
