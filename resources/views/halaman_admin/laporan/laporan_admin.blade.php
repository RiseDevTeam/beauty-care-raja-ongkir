@extends('master_layouts.admin')

@section('title', 'Barang')

@section('admin')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    @if (session()->has('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-sm-6">
                        <h1>Laporan Akhir Penjualan Toko</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    @php
                        date_default_timezone_set('Asia/Jakarta');
                        $tgl = date('m');
                    @endphp
                    <form action="{{ route('cari') }}" method="POST">
                        @csrf
                        <div class="row float-center">

                            <select class="form-control" name="periode" aria-label="Default select example">
                                @php
                                    $bulan = ['Januari' => '1', 'Februari' => '2', 'Maret' => '3', 'April' => '4', 'Mei' => '5', 'Juni' => '6', 'Juli' => '7', 'Agustus' => '8', 'September' => '9', 'Oktober' => '10', 'November' => '11', 'Desember' => '12'];
                                @endphp
                                <option value="{{ $tgl }}">Pilih Bulan</option>
                                @foreach ($bulan as $b => $value_bulan)
                                    <option value="{{ $value_bulan }}">{{ $b }} </option>
                                @endforeach

                            </select>
                            <button type="submit" class="btn btn-primary my-2">Cari</button>
                            @if (isset($periode))
                                <a href="{{ route('print', $periode) }}" target="_blank"
                                    class="btn btn-danger mt-2 ml-1 my-2">
                                    Print</a>
                            @else
                                <a href="{{ route('print1') }}" target="_blank" class="btn btn-danger mt-2 ml-1 my-2">
                                    Print</a>
                            @endif
                        </div>
                    </form>
                    <h3 class="card-title">
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead style="background-color: lightgreen">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama User</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Gambar Barang</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Tipe Pembayaran</th>
                                        <th scope="col">Bukti Pembayaran</th>
                                        <th scope="col">kota</th>
                                        <th scope="col">Tanggal Bayar</th>
                                        {{-- <th scope="col">Nama Kurir</th> --}}
                                        {{-- <th scope="col">Ongkir</th> --}}
                                        <th scope="col">Dikonfirmasi</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Jumlah Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($pay as $p)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $p->user_nama }}</td>
                                            <td>{{ $p->nm_barang }}</td>
                                            <td><img src="{{ url('gambar', $p->p_barang) }}" class="img_thumbnail"
                                                    alt="gambar Produk" width="70"></td>
                                            <td>{{ $p->alamat }}</td>
                                            <td>{{ $p->tipe_pembayaran }}</td>
                                            @if($p->tipe_pembayaran == 'cod')
                                                <td class="text-center">-</td>
                                            @else 
                                                <td><img src="{{ url('gambar', $p->bukti_pembayaran) }}" width="70" --}}
                                                    alt="Bukti Pembayaran"></td>
                                            @endif
                                            <td>{{ $p->kota }}</td>
                                            <td>{{ $p->tanggal_pembayaran }}</td>
                                            {{-- <td>{{ $p->nama_kurir }}</td>
                                            <td>{{ number_format($p->harga_kurir) }}</td> --}}
                                            <td>{{ $p->dikonfirmasi }}</td>
                                            <td>{{ $p->status }}</td>
                                            <td>{{ number_format(($p->harga-$p->diskon)*$p->kuantiti) }}</td>
                                            @php
                                                $total += ($p->harga-$p->diskon)*$p->kuantiti;
                                            @endphp
                                        </tr>
                                    @endforeach
                                    <tr class="text-danger">
                                        <td colspan="2" style="font-size:22px"><b> Total : </b></td>
                                        <td colspan="10" style="text-align:right; font-size:22px"><b>Rp. {{number_format($total)}}</b></td>
                                    </tr>
                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
