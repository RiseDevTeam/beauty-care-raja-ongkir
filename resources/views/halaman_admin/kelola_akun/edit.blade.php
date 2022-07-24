@extends('master_layouts.admin')

@section('title', 'Edit Akun')

@section('admin')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Akun </h1>
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
                    Form Edit Akun
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('akun_edit', $edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="1" class="form-label">Nama Akun</label>
                        <input type="text" name="name" value="{{ $edit->name }}" class="form-control" id="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="1" class="form-label">Alamat</label>
                        <input type="text" name="alamat" value="{{ $edit->alamat->alamat }}" class="form-control"
                            id="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="1" class="form-label">No Telepon</label>
                        <input type="text" name="no_hp" value="{{ $edit->alamat->no_hp }}" class="form-control" id="1"
                            required>
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
