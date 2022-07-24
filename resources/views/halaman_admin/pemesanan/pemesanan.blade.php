@extends('master_layouts.admin')

@section('title', 'Barang')

@section('admin')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Pemesanan</h1>
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
                            <th>Nama Produk</th>
                            <th>Kuantiti</th>
                            <th>harga</th>
                            <th>Total Harga</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemesanan as $pesan)
                            <tr class="text-center">
                                <th>{{ $pesan->id_pemesanan }}</th>
                                <td>{{ $pesan->user->name }}</td>
                                <td>{{ $pesan->barang->nama_barang }}</td>
                                <td>{{ $pesan->kuantiti }}</td>
                                <td>Rp.{{ number_format($pesan->persediaan->harga - $pesan->persediaan->diskon, 0, '.', '.') }}</td>
                                <td>Rp.{{ number_format(($pesan->persediaan->harga - $pesan->persediaan->diskon) * $pesan->kuantiti, 0, '.', '.') }} </td>
                                <td>
                                    @if ($pesan->status == 'pending')
                                        <a href="{{ route('konfirmasi', $pesan->id_pemesanan) }}"
                                            class="btn btn-info">Konfirmasi</a>
                                        <a href="{{ route('cancel', $pesan->id_pemesanan) }}"
                                            class="btn btn-danger">gagal</a>
                                    @else
                                        {{ $pesan->status }}
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
