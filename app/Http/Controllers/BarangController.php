<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Barang::all();
        return view('halaman_admin.barang.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman_admin.barang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $tambah = new Barang;
        //   membuat extesion untuk gambar produk
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'nama_barang' => 'unique:barang,nama_barang'
        ]);

        $file = $request->file('gambar');
        $file_nama = time() . '.' . $file->extension();
        $file->move(public_path('gambar'), $file_nama);
        // insert data
        $tambah->id_user = 1;
        $tambah->kode_barang = $request->kode_barang;
        $tambah->nama_barang = $request->nama_barang;
        $tambah->deskripsi = $request->deskripsi;
        $tambah->gambar = $file_nama;
        // dd($tambah);
        $tambah->save();
        Alert::success('Data Berhasil', 'Data Berhasil ditambahkan');
        return redirect()->route('kelola_barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_barang)
    {
        $detail = Barang::where('id_barang', $id_barang)->first();
        return view('halaman_user.pemesanan.detail_barang', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_barang)
    {
        $edit = Barang::find($id_barang);
        return view('halaman_admin.barang.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_barang)
    {
        $update = Barang::find($id_barang);
        if ($request->gambar) {
            //   membuat extesion untuk gambar produk
            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $file = $request->file('gambar');
            $file_nama = time() . '.' . $file->extension();
            $file->move(public_path('gambar'), $file_nama);

            $update->kode_barang = $request->kode_barang;
            $update->nama_barang = $request->nama_barang;
            $update->deskripsi = $request->deskripsi;
            unlink(public_path('gambar/' . $update->gambar));
            $update->gambar = $file_nama;
            $update->save();
        } else {
            $update->kode_barang = $request->kode_barang;
            $update->nama_barang = $request->nama_barang;
            $update->deskripsi = $request->deskripsi;
            $update->save();
        }
        Alert::success('Data Berhasil', 'Data Berhasil diedit');
        return redirect()->route('kelola_barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_barang)
    {
        $delete = Barang::find($id_barang);
        $delete->delete();
        unlink(public_path('gambar/' . $delete->gambar));

        Alert::error('Data Berhasil', 'Data Berhasil dihapus');
        return redirect()->route('kelola_barang');
    }
}
