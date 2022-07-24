<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('halaman_user.login_page.register');
    }

    public function proses_register(Request $request)
    {
        $tambah = new User;
        $tambah->name = $request->name;
        $tambah->username = $request->username;
        $tambah->password = Hash::make($request->password);
        $tambah->status = 'user';
        $tambah->save();

        $alamat = new Alamat;
        $alamat->username = $request->username;
        $alamat->alamat = $request->alamat;
        $alamat->no_hp = $request->no_hp;
        $alamat->save();

        return redirect()->route('login');
    }

    public function login()
    {

        return view('halaman_user.login_page.login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $proses = $request->only('username', 'password');

        if (Auth::attempt($proses)) {
            $login = Auth::User();

            if ($login->status == 'admin') {
                return redirect()->intended('admin');
            } elseif ($login->status == 'karyawan') {
                return redirect()->intended('karyawan');
            } elseif ($login->status == 'user') {
                return redirect()->intended('user');
            } else {

                return redirect()->route('login');
            }
        } else {

            return redirect()->route('login');
        }
    }

    public function admin()
    {
        if (Auth::user()->status == 'admin') {

            return view('halaman_admin.dashboard.dashboard');
        } else {
            return redirect()->route('/');
        }
    }

    public function karyawan()
    {
        if (Auth::user()->status == 'karyawan') {

            return view('halaman_admin.dashboard.dashboard');
        } else {
            return redirect()->route('/');
        }
    }

    public function user()
    {
        if (Auth::user()->status == 'user') {

            return view('halaman_user.halaman_awal.home');
        } else {
            return redirect()->route('/');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
