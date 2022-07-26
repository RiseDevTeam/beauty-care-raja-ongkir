<?php

namespace App\Http\Controllers;

use App\Models\City;
use Asm89\Stack\Cors;
use App\Models\Courier;
use App\Models\Province;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use App\Models\DaftarOngkir;
use App\Models\DaftarOngkirDraf;
use Illuminate\Http\Request;
use App\Models\Detail_Pembayaran;
use App\Models\Histori_Persediaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class PembayaranController extends Controller
{
    public function proses_pembayaran()
    {
        // memakai raja ongkir
        // $daftarProvinsi = RajaOngkir::provinsi()->all();

        // $daftarProvinsi = RajaOngkir::provinsi()->all();

        $daftarProvinsi = Province::all();
        $daftarkurir = Courier::all();
        $proses = Pemesanan::join('users', 'pemesanan.id_user', '=', 'users.id')->join('persediaan', 'pemesanan.id_persediaan', '=', 'persediaan.id_persediaan')
            ->join('barang', 'pemesanan.kode_barang', '=', 'barang.kode_barang')
            ->select('users.name', 'persediaan.harga', 'persediaan.diskon', 'pemesanan.*')
            ->where('pemesanan.id_user', Auth::user()->id)->get();
        // dd($proses);

        return view('halaman_user.pembayaran.proses_pembayaran', compact('proses', 'daftarProvinsi', 'daftarkurir'));
    }

    public function cek_harga_ongkir(Request $request)
    {
        $daftarOngkir = RajaOngkir::ongkosKirim([
            'origin'        => $request->id_kota,     // ID kota/kabupaten asal
            'destination'   => 80,      // ID kota/kabupaten tujuan
            'weight'        => 1000,    // berat barang dalam gram
            'courier'       => $request->id_kurir,    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])
            ->get();
        foreach ($daftarOngkir as $Ongkir) {
            $ongkir = $Ongkir;
        }
        $daftarProvinsi = RajaOngkir::provinsi()->find($request->provinsi);
        $provinsi = $daftarProvinsi['province'];

        $daftarProvinsi = RajaOngkir::kota()->find($request->id_kota);
        $kota = $daftarProvinsi['city_name'];

        return view('halaman_user.pembayaran.cek_harga_ongkir', compact('ongkir', 'daftarOngkir', 'provinsi', 'kota'));
    }

    public function pilih_ongkir(Request $request)
    {
        if ($request->layanan = 'OKE') {
            $insertDaftar = new DaftarOngkirDraf;
            $insertDaftar->id_user = Auth::User()->id;
            $insertDaftar->provinsi = $request->provinsi;
            $insertDaftar->kota = $request->kota;
            $insertDaftar->code = $request->code[0];
            $insertDaftar->nama = $request->nama[0];
            $insertDaftar->service = $request->service[0];
            $insertDaftar->description = $request->description[0];
            $insertDaftar->value = $request->value[0];
            $insertDaftar->save();
            Alert::success('Data Berhasil', 'Data Berhasil ditambahkan');
            return redirect()->route('proses_pembayaran');
        } else {
            $insertDaftar = new DaftarOngkirDraf;
            $insertDaftar->id_user = Auth::User()->id;
            $insertDaftar->provinsi = $request->provinsi;
            $insertDaftar->kota = $request->kota;
            $insertDaftar->code = $request->code[1];
            $insertDaftar->nama = $request->nama[1];
            $insertDaftar->service = $request->service[1];
            $insertDaftar->description = $request->description[1];
            $insertDaftar->value = $request->value[1];
            $insertDaftar->save();
            Alert::success('Data Berhasil', 'Data Berhasil ditambahkan');
            return redirect()->route('proses_pembayaran');
        }
    }

    public function proses_checkout(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');

        $pemesanan = Pemesanan::all()->where('id_user', Auth::user()->id);

        foreach ($pemesanan as $pesan) {
            if ($request->id_kurir == NULL) {
                $id_kurir = '';
            } else {
                $id_kurir = $request->id_kurir;
            }
            $pembayaran = new Pembayaran;
            $pembayaran->id_user = Auth::user()->id;
            $pembayaran->id_persediaan = $pesan['id_persediaan'];
            $pembayaran->id_daftar_ongkir = $request->id_daftar_ongkir;
            $pembayaran->kode_barang = $pesan['kode_barang'];
            $pembayaran->dikonfirmasi = 'pending';
            $pembayaran->status = 'pending';
            $pembayaran->save();
            $id = $pembayaran->id_pembayaran;

            $request->validate([
                'bukti_pembayaran' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if ($request->tipe_pembayaran == 'cod') {
                DB::table('detail_pembayaran')->insert([
                    'id_pembayaran' => $id,
                    'tipe_pembayaran' => $request->tipe_pembayaran,
                    'bukti_pembayaran' => '',
                    'alamat' => $request->alamat,
                    'kuantiti' => $pesan['kuantiti'],
                    'tanggal_pembayaran' => $date,
                    'total_akhir' => $request->total_akhir,
                ]);
            } else {
                $bukti = $request->file('bukti_pembayaran');
                $bukti_nama = time() . '.' . $bukti->extension();
                DB::table('detail_pembayaran')->insert([
                    'id_pembayaran' => $id,
                    'tipe_pembayaran' => $request->tipe_pembayaran,
                    'bukti_pembayaran' => $bukti_nama,
                    'alamat' => $request->alamat,
                    'kuantiti' => $pesan['kuantiti'],
                    'tanggal_pembayaran' => $date,
                    'total_akhir' => $request->total_akhir,
                ]);
            }
        }
        if ($request->tipe_pembayaran != 'cod') {
            $bukti->move(public_path('gambar'), $bukti_nama);
        }
        $daftarSementara = DaftarOngkirDraf::where('id_daftar_ongkir', $request->id_daftar_ongkir)->first();
        DaftarOngkir::create([
            'id_daftar_ongkir' => $daftarSementara->id_daftar_ongkir,
            'id_user' => $daftarSementara->id_user,
            'provinsi' => $daftarSementara->provinsi,
            'kota' => $daftarSementara->kota,
            'code' => $daftarSementara->code,
            'nama' => $daftarSementara->nama,
            'service' => $daftarSementara->service,
            'description' => $daftarSementara->description,
            'value' => $daftarSementara->value,
        ]);
        DaftarOngkirDraf::where('id_daftar_ongkir', $request->id_daftar_ongkir)->delete();

        $pemesanan = DB::table('pemesanan')->where('id_user', '=', Auth::user()->id)->delete();

        return redirect()->route('pemesanan_saya');
    }

    public function kelola_pembayaran()
    {
        $kelola = Pembayaran::all();
        return view('halaman_admin.pembayaran.konfirmasi', compact('kelola'));
    }

    public function konfirmasi($id_pembayaran)
    {
        $konfirmasi = Pembayaran::find($id_pembayaran);
        $konfirmasi->status = 'konfirmasi';
        $konfirmasi->dikonfirmasi = Auth::user()->name;
        $konfirmasi->save();
        return redirect()->route('kelola_pembayaran');
    }

    public function cancel($id_pembayaran)
    {
        $cancel = Pembayaran::find($id_pembayaran);
        $cancel->status = 'cancel';
        $cancel->dikonfirmasi = Auth::user()->name;
        $cancel->save();
        return redirect()->route('kelola_pembayaran');
    }
}
