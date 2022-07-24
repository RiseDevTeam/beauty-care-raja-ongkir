@extends('master_layouts.admin')

@section('title', 'Edit Kurir')

@section('admin')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Kurir </h1>
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
                        Form Edit Kurir
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('kurir_edit', $edit->id_kurir) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="1" class="form-label">Nama Kurir</label>
                            <input type="text" name="nama_kurir" value="{{ $edit->nama_kurir }}" class="form-control"
                                id="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="1" class="form-label">Harga Kurir</label>
                            <input type="text" name="harga" value="{{ $edit->harga }}" class="form-control"
                                id="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="1" class="form-label">Wilayah Untuk Kurir</label>
                            <input type="text" name="harga" value="{{ $edit->wilayah }}" class="form-control"
                                id="1" required>
                        </div>

                        <label for="1" class="form-label">Wilayah Untuk Kurir</label>
                        <select class="form-control" name="wilayah" aria-label="Default select example">
                            <option value="{{ $edit->wilayah }}">{{ $edit->wilayah }}</option>
                            <option value="Kota Padang">Kota Padang</option>
                            <option value="Luar Kota Padang">Luar Kota Padang</option>
                        </select>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('kurir') }}" class="btn btn-warning">back</a>
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
