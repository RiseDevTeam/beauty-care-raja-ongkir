@extends('master_layouts.admin')

@section('title', 'Edit Persediaan')

@section('admin')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Persediaan </h1>
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
                    Form Persediaan
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('persediaan_edit', $edit->id_persediaan) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="1" class="form-label">Kode Barang</label>
                        <input type="text" id="kode" name="kode_barang" value="{{ $edit->kode_barang }}"
                            placeholder="Pilih Nama Barang" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="1" class="form-label">Nama Barang</label>
                        <input type="text" id="kode" value="{{ $edit->barang->nama_barang }}"
                            placeholder="Pilih Nama Barang" class="form-control" readonly>
                    </div>


                    <div class="mb-3">
                        <label for="1" class="form-label">Diskon</label>
                        <input type="text" name="diskon" value="{{ $edit->diskon }}" class="form-control" id="1">
                    </div>

                    <div class="mb-3">
                        <label for="1" class="form-label">Jumlah Persediaan</label>
                        <input type="text" value="{{ $edit->persediaan }}" class="form-control" id="1" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="1" class="form-label">Restok</label>
                        <input type="text" name="persediaan" class="form-control" id="1">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('kelola_persediaan') }}" class="btn btn-warning">back</a>
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
