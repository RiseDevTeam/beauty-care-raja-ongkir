<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Persediaan;
use Illuminate\Http\Request;
use App\Models\Histori_Persediaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PersediaanController extends Controller
{
    public function histori_persediaan()
    {
        $histori = Histori_Persediaan::all();
        return view('halaman_admin.persediaan.histori', compact('histori'));
    }


    public function index()
    {
        $index = Persediaan::all();
        return view('halaman_admin.persediaan.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = DB::table('barang')->get();
        return view('halaman_admin.persediaan.tambah', compact('barang'));
    }

    public function ajax()
    {
        if (isset($_POST['persediaan'])) {

            $res = array();
            $input = Barang::where('nama_barang', $_POST['persediaan'])->first();
            $res = array('kode_barang' => $input->kode_barang);
            return response()->json($res);
        }
    }



    public function store(Request $request)
    {
        $harga = explode("Rp.", $request->harga)[1];
        $harga = explode(".", $harga);
        $harga = implode($harga);

        $key = DB::table('persediaan')
            ->where('kode_barang', '=', $request->kode_barang)
            ->first();

        if ($key == null) {

            $store =  new Persediaan;
            $store->id_user = Auth::user()->id;
            $store->kode_barang = $request->kode_barang;
            $store->persediaan = $request->persediaan;
            $store->harga = $harga;
            $store->diskon = $request->diskon;

            $store->save();


            Alert::success('persediaan Berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->route('kelola_persediaan');
        } elseif ($key->kode_barang == $request->kode_barang) {
            $store = Persediaan::where('kode_barang', $key->kode_barang)
                ->update([
                    'persediaan' => $request->persediaan + $key->persediaan,
                ]);
            Alert::success('persediaan Berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->route('kelola_persediaan');
        } else {
            $store =  new Persediaan;
            $store->id_user = 1;
            $store->kode_barang = $request->kode_barang;
            $store->persediaan = $request->persediaan;
            $store->harga = $harga;
            $store->diskon = $request->diskon;
            $store->save();
            Alert::success('persediaan Berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->route('kelola_persediaan');
        };
    }

    public function edit($id_persediaan)
    {
        $edit = Persediaan::find($id_persediaan);
        return view('halaman_admin.persediaan.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_persediaan)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tgl = date('Y-m-d');

        $data = DB::table('persediaan')->where('kode_barang', $request->kode_barang)->first();

        $update = Persediaan::find($id_persediaan);

        if ($request->diskon && $request->persediaan) {
            // update table persediaan
            $update->persediaan = $data->persediaan - $request->persediaan;
            $update->diskon = $request->diskon;
            $update->save();
        } elseif ($request->persediaan) {
            // update table persediaan
            $update->persediaan = $data->persediaan - $request->persediaan;
            $update->save();
        } else {
            $update->diskon = $request->diskon;
            $update->save();
        }

        Alert::success('persediaan Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('kelola_persediaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id_persediaan)
    {
        $delete = Persediaan::find($id_persediaan);
        unlink(public_path('gambar/' . $delete->gambar));
        $delete->delete();
        return redirect()->back();
    }
}
