<?php

namespace App\Http\Controllers;

use App\Models\Detail_Pembayaran;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function pemesanan_saya()
    {
        $pembayaran = Pembayaran::leftjoin('detail_pembayaran', 'pembayaran.id_pembayaran', '=', 'detail_pembayaran.id_pembayaran')->leftjoin('users', 'pembayaran.id_user', '=', 'users.id')
            ->leftjoin('persediaan', 'pembayaran.id_persediaan', '=', 'persediaan.id_persediaan')->leftjoin('barang', 'pembayaran.kode_barang', '=', 'barang.kode_barang')
            ->leftjoin('daftar_ongkir', 'pembayaran.id_daftar_ongkir', '=', 'daftar_ongkir.id_daftar_ongkir')
            ->select(
                'users.name',
                'detail_pembayaran.alamat',
                'detail_pembayaran.kuantiti',
                'barang.nama_barang',
                'persediaan.harga',
                'pembayaran.status',
                'pembayaran.id_pembayaran',
                'daftar_ongkir.provinsi',
                'daftar_ongkir.kota',
                'daftar_ongkir.nama as nama_ongkir',
                'daftar_ongkir.description',
                'daftar_ongkir.value',
                'daftar_ongkir.description',
            )
            ->get();
        return view('halaman_user.laporan.pemesanan_saya', compact('pembayaran'));
    }

    public function detail_pemesanan_saya($id_pembayaran)
    {
        $detail_pemesanan_saya = Pembayaran::leftjoin('detail_pembayaran', 'pembayaran.id_pembayaran', '=', 'detail_pembayaran.id_pembayaran')->leftjoin('users', 'pembayaran.id_user', '=', 'users.id')
            ->leftjoin('persediaan', 'pembayaran.id_persediaan', '=', 'persediaan.id_persediaan')->leftjoin('barang', 'pembayaran.kode_barang', '=', 'barang.kode_barang')
            ->leftjoin('daftar_ongkir', 'pembayaran.id_daftar_ongkir', '=', 'daftar_ongkir.id_daftar_ongkir')
            ->select(
                'users.name',
                'detail_pembayaran.alamat',
                'detail_pembayaran.kuantiti',
                'barang.nama_barang',
                'persediaan.harga',
                'pembayaran.status',
                'pembayaran.id_pembayaran',
                'daftar_ongkir.provinsi',
                'daftar_ongkir.kota',
                'daftar_ongkir.nama as nama_ongkir',
                'daftar_ongkir.description',
                'daftar_ongkir.value',
                'daftar_ongkir.description',
            )
            ->where('pembayaran.id_pembayaran', $id_pembayaran)
            ->get();
        return view('halaman_user.laporan.detail_pemesanan_saya', compact('detail_pemesanan_saya'));
    }

    public function barang_sampai($id)
    {
        $sampai = Pembayaran::find($id);
        $sampai->status = 'sampai';
        $sampai->save();
        return redirect()->route('pemesanan_saya');
    }

    public function faktur()
    {
        $faktur = Detail_Pembayaran::leftjoin('pembayaran', 'detail_pembayaran.id_pembayaran', '=', 'pembayaran.id_pembayaran')->leftjoin('persediaan', 'pembayaran.id_persediaan', '=', 'persediaan.id_persediaan')
            ->leftjoin('barang', 'pembayaran.kode_barang', '=', 'barang.kode_barang')->leftjoin('users', 'pembayaran.id_user', '=', 'users.id')
            ->leftjoin('alamat', 'users.username', '=', 'alamat.username')->leftjoin('daftar_ongkir', 'pembayaran.id_daftar_ongkir', '=', 'daftar_ongkir.id_daftar_ongkir')
            ->select('daftar_ongkir.nama as nama_ongkir', 'daftar_ongkir.value', 'daftar_ongkir.description', 'barang.nama_barang', 'persediaan.harga', 'detail_pembayaran.kuantiti', 'detail_pembayaran.tipe_pembayaran', 'persediaan.diskon')
            ->where('pembayaran.id_user', Auth::user()->id)
            ->get();
        $nama = Detail_Pembayaran::leftjoin('pembayaran', 'detail_pembayaran.id_pembayaran', '=', 'pembayaran.id_pembayaran')->leftjoin('persediaan', 'pembayaran.id_persediaan', '=', 'persediaan.id_persediaan')
            ->leftjoin('barang', 'pembayaran.kode_barang', '=', 'barang.kode_barang')->leftjoin('users', 'pembayaran.id_user', '=', 'users.id')
            ->leftjoin('alamat', 'users.username', '=', 'alamat.username')->leftjoin('daftar_ongkir', 'pembayaran.id_daftar_ongkir', '=', 'daftar_ongkir.id_daftar_ongkir')
            ->select('users.name', 'alamat.no_hp', 'detail_pembayaran.tipe_pembayaran')->where('pembayaran.id_user', Auth::user()->id)
            ->first();

        return view('halaman_user.laporan.faktur', compact('faktur', 'nama'));
    }

    public function laporan_admin()
    {

        $pay = DB::table('pembayaran')->leftjoin('persediaan', 'pembayaran.id_persediaan', '=', 'persediaan.id_persediaan')
            ->leftjoin('users', 'pembayaran.id_user', '=', 'users.id')
            ->leftjoin('barang', 'pembayaran.kode_barang', '=', 'barang.kode_barang')
            ->leftjoin('detail_pembayaran', 'pembayaran.id_pembayaran', '=', 'detail_pembayaran.id_pembayaran')
            ->leftjoin('daftar_ongkir', 'pembayaran.id_daftar_ongkir', '=', 'daftar_ongkir.id_daftar_ongkir')
            ->where('pembayaran.status', 'sampai')
            ->select(
                'pembayaran.*',
                'detail_pembayaran.*',
                'barang.nama_barang as nm_barang',
                'barang.gambar as p_barang',
                'persediaan.*',
                'daftar_ongkir.provinsi',
                'daftar_ongkir.kota',
                'daftar_ongkir.nama as nama_ongkir',
                'daftar_ongkir.value',
                'daftar_ongkir.description',
                'users.name as user_nama',
            )
            ->get();

        return view('halaman_admin.laporan.laporan_admin', compact('pay'));
    }



    public function cari(Request $request)
    {
        $periode = $request->periode;
        $cari =  DB::table('pembayaran')->leftjoin('persediaan', 'pembayaran.id_persediaan', '=', 'persediaan.id_persediaan')
            ->leftjoin('users', 'pembayaran.id_user', '=', 'users.id')
            ->leftjoin('barang', 'pembayaran.kode_barang', '=', 'barang.kode_barang')
            ->leftjoin('detail_pembayaran', 'pembayaran.id_pembayaran', '=', 'detail_pembayaran.id_pembayaran')
            ->leftjoin('daftar_ongkir', 'pembayaran.id_daftar_ongkir', '=', 'daftar_ongkir.id_daftar_ongkir')
            ->where('pembayaran.status', 'sampai')
            ->select(
                'pembayaran.*',
                'detail_pembayaran.*',
                'barang.nama_barang as nm_barang',
                'barang.gambar as p_barang',
                'persediaan.*',
                'daftar_ongkir.provinsi',
                'daftar_ongkir.kota',
                'daftar_ongkir.nama as nama_ongkir',
                'daftar_ongkir.value',
                'daftar_ongkir.description',
                'users.name as user_nama',
            );
        if ($request->periode) {
            $data = $cari->whereMonth('detail_pembayaran.tanggal_pembayaran', [$request->periode]);
        } else {
            $data = $cari;
        };
        $pay = $data->get();
        return view('halaman_admin.laporan.laporan_admin', compact('pay', 'periode'));
    }

    public function print1()
    {
        $print = DB::table('pembayaran')->leftjoin('persediaan', 'pembayaran.id_persediaan', '=', 'persediaan.id_persediaan')
            ->leftjoin('users', 'pembayaran.id_user', '=', 'users.id')
            ->leftjoin('barang', 'pembayaran.kode_barang', '=', 'barang.kode_barang')
            ->leftjoin('detail_pembayaran', 'pembayaran.id_pembayaran', '=', 'detail_pembayaran.id_pembayaran')
            ->leftjoin('daftar_ongkir', 'pembayaran.id_daftar_ongkir', '=', 'daftar_ongkir.id_daftar_ongkir')
            ->where('pembayaran.status', 'sampai')
            ->select(
                'pembayaran.*',
                'detail_pembayaran.*',
                'barang.nama_barang as nm_barang',
                'barang.gambar as p_barang',
                'persediaan.*',
                'daftar_ongkir.provinsi',
                'daftar_ongkir.kota',
                'daftar_ongkir.nama as nama_ongkir',
                'daftar_ongkir.value',
                'daftar_ongkir.description',
                'users.name as user_nama',
            )
            ->get();
        return view('halaman_admin.laporan.print', compact('print'));
    }

    public function print($periode)
    {
        $print = DB::table('pembayaran')->leftjoin('persediaan', 'pembayaran.id_persediaan', '=', 'persediaan.id_persediaan')
            ->leftjoin('users', 'pembayaran.id_user', '=', 'users.id')
            ->leftjoin('barang', 'pembayaran.kode_barang', '=', 'barang.kode_barang')
            ->leftjoin('detail_pembayaran', 'pembayaran.id_pembayaran', '=', 'detail_pembayaran.id_pembayaran')
            ->leftjoin('daftar_ongkir', 'pembayaran.id_daftar_ongkir', '=', 'daftar_ongkir.id_daftar_ongkir')
            ->where('pembayaran.status', 'sampai')
            ->select(
                'pembayaran.*',
                'detail_pembayaran.*',
                'barang.nama_barang as nm_barang',
                'barang.gambar as p_barang',
                'persediaan.*',
                'daftar_ongkir.provinsi',
                'daftar_ongkir.kota',
                'daftar_ongkir.nama as nama_ongkir',
                'daftar_ongkir.value',
                'daftar_ongkir.description',
                'users.name as user_nama',
            )->whereMonth('detail_pembayaran.tanggal_pembayaran', '=', $periode)->get();
        return view('halaman_admin.laporan.print', compact('print'));
    }
}
