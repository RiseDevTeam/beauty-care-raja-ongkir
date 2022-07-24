<?php
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pendapatan Klinik Tahun <?=date('Y')?> bulan <?= date('M')?></title>
    @include('halaman_admin.layouts.navbar')
</head>
@include('halaman_admin.layouts.script')
<body onload="window.print();">
    <div class="head" style="margin-top:70px; margin-bottom:20px;">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2">  
                <img src="{{ asset('gambar/brs.jpeg') }}" class="logo" width="120px; heigh:120px;">
            </div>
            <div class="col-md-4" style="margin-left:10px; text-align:center">
                <div class="txt">
                    <h2 style="font-weight: bold">BRS Beauty Padang</h2>
                    <p>Jalan Gurun Laweh, Nanggalo, Kota Padang</p>
                    <p>Provinsi Sumatera Barat, 25172</p>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
   <hr style="border: 2px solid black;">
     <div class="card-body">
            <div class="d-flex justify-content-center mb-3 mt-3">
            <h2 style="font-weight: bold"> LAPORAN PENDAPATAN KLINIK</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Tanggal Bayar</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Kuantiti</th>
                            <th scope="col">Harga</th>
                            {{-- <th scope="col">Nama Kurir</th>
                            <th scope="col">Ongkir</th> --}}
                            <th scope="col">Jumlah Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($print as $p)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $p->tanggal_pembayaran }}</td>
                                <td>{{ $p->user_nama }}</td>
                                <td>{{ $p->nm_barang }}</td>
                                {{-- <td>{{ $p->nama_kurir }}</td>
                                <td>{{ number_format($p->harga_kurir) }}</td> --}}
                                 <td>{{$p->kuantiti}}</td> 
                                 <td>Rp. {{ number_format($p->harga - $p->diskon, 0, '.', '.') }}</td>
                               <td>Rp. {{ number_format(($p->harga-$p->diskon)*$p->kuantiti, 0, '.', '.') }}</td>
                                {{-- <td>{{ number_format($p->total_akhir, 0, '.', '.') }}</td> --}}
                                @php
                                    $total += ($p->harga-$p->diskon)*$p->kuantiti;
                                @endphp
                            </tr>

                        @endforeach
                         <tr class="text-danger">
                            <td colspan="2" style="font-size:18px"><b> Total : </b></td>
                            <td colspan="10" style="text-align:right; font-size:18px"><b>Rp. {{number_format($total)}}</b></td>
                         </tr>
                    </tbody>
                </table>
                @php
                    $tgl = date('d-m-Y');
                @endphp

            </div>
        </div>
        {{-- </section> --}}
        <div class="d-flex justify-content-end">
            Padang, {{ $tgl }}
            <br> <br><br><br><br>
            BRS Beauty Padang
        </div>
</body>
</html>