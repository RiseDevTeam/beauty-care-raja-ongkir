@extends('master_layouts.admin')

@section('title', 'Barang')

@section('admin')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kelola Barang</h1>
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
                    <a href="{{ route('barang_tambah') }}" class="btn btn-success">Tambah Barang</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>Nama Admin</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Deskripsi Barang</th>
                                <th>Gambar Barang</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($index as $b)

                                <tr class="text-center">
                                    <th>{{ $loop->iteration }}</th>
                                    {{-- <td>{{ $b->user->name }}</td> --}}
                                    <td>Admin</td>
                                    <td>{{ $b->kode_barang }}</td>
                                    <td>{{ $b->nama_barang }}</td>
                                    <td>{{ $b->deskripsi }}</td>
                                    <td> <img src="{{ url('gambar', $b->gambar) }}" width="50%"></td>
                                    <td>
                                        <a href="{{ route('barang_edit', $b->id_barang) }}"
                                            class="btn btn-block btn-info mb-2">Edit</a>
                                        <form method="POST" action="{{ route('barang_hapus', $b->id_barang) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-block btn-danger">Hapus</button>
                                        </form>
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
