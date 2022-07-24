@extends('master_layouts.admin')

@section('title', 'Kelola Persediaan')

@section('admin')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kelola Persediaan</h1>
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
                    <a href="{{ route('persediaan_tambah') }}" class="btn btn-success">Tambah Persediaan</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Persediaan</th>
                                <th>harga</th>
                                <th>diskon</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($index as $b)
                                @php
                                    $terjual = DB::table('detail_pembayaran')
                                        ->leftjoin('pembayaran', 'detail_pembayaran.id_pembayaran', '=', 'pembayaran.id_pembayaran')
                                        ->where('pembayaran.id_persediaan', $b->id_persediaan)
                                        ->first();
                                @endphp
                                <tr class="text-center">
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $b->kode_barang }}</td>
                                    <td>{{ $b->barang->nama_barang }}</td>
                                    <td>{{ $b->persediaan }}</td>
                                    <td>Rp.{{ number_format($b->harga) }}/Unit</td>
                                    <td>{{ $b->diskon }}</td>
                                    <td>
                                        <a href="{{ route('persediaan_edit', $b->id_persediaan) }}"
                                            class="btn btn-block btn-info mb-2">Edit</a>
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
