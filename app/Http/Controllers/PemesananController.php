<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Pemesanan;
use App\Models\Persediaan;
use Illuminate\Http\Request;
use App\Models\Histori_Persediaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class PemesananController extends Controller
{
    public function proses_pemesanan(Request $request)
    {
        date_default_timezone_set("Asia/jakarta");
        $tgl = date('Y-m-d');

        $jumlah_beli = $request->kuantiti;
        $kode_barang = $request->kode_barang;
        $id_pelanggan = Auth::user()->id;


        $cekproduk = Pemesanan::all()->where('kode_barang', $kode_barang)->where('id_user', $id_pelanggan)->first();

        if ($cekproduk == null) {
            $jumlah_beli = $jumlah_beli;
        } else {
            $jumlah_beli = $jumlah_beli + $cekproduk->kuantiti;
        }

        if ($cekproduk == null) {
            // insert data ke table pemesanan
            $pesan = new Pemesanan;
            $pesan->id_user = $request->id_user;
            $pesan->id_persediaan = $request->id_persediaan;
            $pesan->kode_barang = $request->kode_barang;
            $pesan->kuantiti = $jumlah_beli;
            $pesan->status = 'konfirmasi';
            $pesan->save();
        } else {
            $update = DB::table('pemesanan')->where('id_persediaan', $request->id_persediaan)->where('id_user', $id_pelanggan)->update([
                'kuantiti' => $jumlah_beli
            ]);
        }

        // update data stok ketika melakuka penjualan
        $persediaan = Persediaan::find($request->id_persediaan);
        $persediaan->persediaan -= $jumlah_beli;
        $persediaan->save();

        return redirect()->route('/');
    }
    public function kelola_pemesanan()
    {
        $pemesanan = Pemesanan::all();
        return view('halaman_admin.pemesanan.pemesanan', compact('pemesanan'));
    }


    public function pesanan_user()
    {
        $pesan = Pemesanan::join('users', 'pemesanan.id_user', '=', 'users.id')->join('persediaan', 'pemesanan.id_persediaan', '=', 'persediaan.id_persediaan')
            ->join('barang', 'pemesanan.kode_barang', '=', 'barang.kode_barang')
            ->select('users.name', 'persediaan.harga', 'persediaan.diskon', 'pemesanan.*')
            ->where('pemesanan.id_user', Auth::user()->id)->get();
        return view('halaman_user.pemesanan.pesanan_user', compact('pesan'));
    }

    public function hapus($id_pemesaan)
    {
        $hapus = Pemesanan::find($id_pemesaan);
        $hapus->delete();
        Alert::error('Data Berhasil', 'Data Berhasil dihapus');
        return redirect()->route('pesanan_user');
    }


    public function ajax_kota(Request $request)
    {
        $daftarKota = City::where('province_id', $request->provinsi)->get();
        return response()->json($daftarKota);
    }


    public function ajax_pilih_kota(Request $request)
    {
        // $data = DB::table('kurir')->where('id_kurir', '=', $request->idKurir)->select('kurir.*')->first();
        // return response()->json($data);
        $daftarOngkir = RajaOngkir::ongkosKirim([
            'origin'        => $request->idKota,     // ID kota/kabupaten asal
            'destination'   => 80,      // ID kota/kabupaten tujuan
            'weight'        => 1300,    // berat barang dalam gram
            'courier'       => 'jne', 'tiki', 'pos'    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ]);
        return response()->json($daftarOngkir);
    }
}
