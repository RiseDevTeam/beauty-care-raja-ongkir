@extends('master_layouts.admin')

@section('title', 'Barang')

@section('admin')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kelola Pembayaran</h1>
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

            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>Nama Pemesanan</th>
                                <th>Nomor Pemesanan</th>
                                <th>Nama Produk</th>
                                <th>Kuantiti</th>
                                <th>harga</th>
                                <th>Total Harga</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelola as $bayar)
                                @php
                                    $alamat = DB::table('alamat')
                                        ->where('username', '=', $bayar->user->username)
                                        ->first();
                                @endphp
                                <tr class="text-center">
                                    <th>{{ $bayar->id_pembayaran }}</th>
                                    <td>{{ $bayar->user->name }}</td>
                                    <td>{{ $alamat->no_hp }}</td>
                                    <td>{{ $bayar->barang->nama_barang }}</td>
                                    <td>{{ $bayar->detail->kuantiti }}</td>
                                    <td>Rp.{{ number_format($bayar->persediaan->harga - $bayar->persediaan->diskon) }}</td>
                                     <td>Rp.{{ number_format(($bayar->persediaan->harga - $bayar->persediaan->diskon) * $bayar->detail->kuantiti) }}</td>
                                    {{-- <td>Rp.{{ number_format($bayar->detail->total_akhir) }} </td> --}}
                                    <td>
                                        @if ($bayar->status == 'pending')
                                            <a href="{{ route('konfirmasi1', $bayar->id_pembayaran) }}"
                                                class="btn btn-info">Konfirmasi</a>
                                            <a href="{{ route('cancel1', $bayar->id_pembayaran) }}"
                                                class="btn btn-danger">gagal</a>
                                        @else
                                            {{ $bayar->status }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection
