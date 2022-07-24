<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $banner = Banner::all();
        return view('halaman_user.halaman_awal.home');
    }

    // public function master()
    // {
    //     $banner = Banner::all();
    //     return view('master_layouts.user', compact('banner'));
    // }
}
