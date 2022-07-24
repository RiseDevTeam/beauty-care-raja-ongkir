<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Kurir::all();

        return view('halaman_admin.kurir.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman_admin.kurir.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Kurir;
        $tambah->nama_kurir = $request->nama_kurir;
        $tambah->harga = $request->harga;
        $tambah->wilayah = $request->wilayah;
        $tambah->save();
        Alert::success('Kurir Berhasil', 'Data Berhasil Ditambah');
        return redirect()->route('kurir');
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
    public function edit($id_kurir)
    {
        $edit = Kurir::find($id_kurir);
        return view('halaman_admin.kurir.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kurir)
    {
        $update = Kurir::find($id_kurir);
        $update->nama_kurir = $request->nama_kurir;
        $update->harga = $request->harga;
        $update->wilayah = $request->wilayah;
        $update->save();
        Alert::success('Kurir Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('kurir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kurir)
    {
        $delete = Kurir::find($id_kurir);
        $delete->delete();
        Alert::error('Kurir Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('kurir');
    }
}
