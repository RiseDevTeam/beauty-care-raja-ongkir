@extends('master_layouts.admin')

@section('title', 'Edit Barang')

@section('admin')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Barang </h1>
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
                        Form Barang
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('barang_edit', $edit->id_barang) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="1" class="form-label">Kode Barang</label>
                            <input type="text" name="kode_barang" value="{{ $edit->kode_barang }}" class="form-control"
                                id="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="1" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" value="{{ $edit->nama_barang }}" class="form-control"
                                id="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="1" class="form-label">Deskripsi</label><br>
                            <textarea name="deskripsi" class="form-control"
                                aria-label="With textarea">{{ $edit->deskripsi }} </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="1" class="form-label">Gambar Produk</label><br>
                            <input type="file" name="gambar" id="muncul-gambar" onchange="gambarSlide();">
                        </div>

                        <img id="slide-gambar" class="mr-5" style="width: 150px; height: 200px;" src="#"
                            alt="Slide image" />
                        <p>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('kelola_barang') }}" class="btn btn-warning">back</a>
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
    <script>
        function gambarSlide() {
            document.getElementById("slide-gambar").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("muncul-gambar").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("slide-gambar").src = oFREvent.target.result;
            };
        };
    </script>

@endsection
