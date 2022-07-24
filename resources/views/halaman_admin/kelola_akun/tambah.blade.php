@extends('master_layouts.admin')

@section('title', 'Tambah Akun')

@section('admin')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Akun </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Form Tambah Akun
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('akun_tambah') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="1" class="form-label">Nama Akun</label>
                        <input type="text" name="name" class="form-control" id="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="1" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="1" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control" id="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="1" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="1" class="form-label">No Telepon</label>
                        <input type="text" name="no_hp" class="form-control" id="1" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('kelola_akun') }}" class="btn btn-warning">back</a>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection
