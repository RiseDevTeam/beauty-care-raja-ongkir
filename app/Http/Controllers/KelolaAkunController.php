<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class KelolaAkunController extends Controller
{

    public function dashboard()
    {
        return view('halaman_admin.dashboard.dashboard');
    }

    public function index()
    {
        $index = User::all();
        return view('halaman_admin.kelola_akun.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman_admin.kelola_akun.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new User;
        $tambah->name = $request->name;
        $tambah->username = $request->username;
        $tambah->password = Hash::make($request->password);
        $tambah->status = 'karyawan';
        $tambah->save();

        $alamat = new Alamat;
        $alamat->username = $request->username;
        $alamat->alamat = $request->alamat;
        $alamat->no_hp = $request->no_hp;
        $alamat->save();

        Alert::success('Data Berhasil', 'Data Berhasil ditambahkan');
        return redirect()->route('kelola_akun');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = User::find($id);
        return view('halaman_admin.kelola_akun.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = User::find($id);
        $update->name = $request->name;
        $update->alamat->alamat = $request->alamat;
        $update->alamat->no_hp = $request->no_hp;
        $update->save();
        $update->alamat->save();
        Alert::success('Data Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('kelola_akun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
