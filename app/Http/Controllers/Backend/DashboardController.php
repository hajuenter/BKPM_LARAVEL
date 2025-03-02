<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('backend.dashboard.dashboard');
    }
}
