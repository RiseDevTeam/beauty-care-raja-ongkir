@extends('master_layouts.admin')

@section('title', 'Kelola Akun')

@section('admin')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Akun</h1>
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
                <a href="{{ route('akun_tambah') }}" class="btn btn-success">Tambah Akun</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>Nama Admin</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Nomor Telepon</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($index as $b)

                            <tr class="text-center">
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $b->name }}</td>
                                <td>{{ $b->alamat->alamat }}</td>
                                <td>{{ $b->status }}</td>
                                <td>{{ $b->alamat->no_hp }} </td>
                                <td>
                                    <a href="{{ route('akun_edit', $b->id) }}"
                                        class="btn btn-block btn-info mb-2">Edit</a>
                                    <form method="POST" action="{{ route('akun_hapus', $b->id) }}">
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
