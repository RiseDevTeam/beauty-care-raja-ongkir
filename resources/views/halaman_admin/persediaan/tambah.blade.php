@extends('master_layouts.admin')

@section('title', 'Tambah Persediaan')

@section('admin')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Persediaan </h1>
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
                    <form action="{{ route('persediaan_tambah') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="1" class="form-label">Kode Barang</label>
                            <input type="text" id="kode" name="kode_barang" placeholder="Pilih Nama Barang"
                                class="form-control" readonly>

                        </div>

                        <div class="mb-3">
                            <label for="1" class="form-label">Nama Barang</label>
                            <select class="form-control" name="nama_barang" onchange="barang(this);"
                                aria-label="Default select example">
                                <option selected>Pilih Nama Barang</option>
                                @foreach ($barang as $b)
                                    <option value="{{ $b->nama_barang }}">{{ $b->nama_barang }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="1" class="form-label">Jumlah Persediaan</label>
                            <input type="text" name="persediaan" class="form-control" id="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="1" class="form-label">Harga</label>
                            <input type="text" name="harga" id="harga_satuan" class="form-control" id="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="1" class="form-label">Diskon</label>
                            <input type="number" name="diskon" id="diskon" class="form-control" id="1" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
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
    <script type="text/javascript">
        function barang(val) {
            $.ajax({
                url: "{{ route('ajax_persediaan') }}",
                type: 'POST',
                datatype: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "persediaan": val.value
                },

                success: function(response) {
                    $('#kode').val(response.kode_barang)
                },
            })
        }

        var rupiah = document.getElementById('harga_satuan');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat ketik nominal di form kolom input
            // gunakan fungsi formatRupiah() untuk mengubah nominal angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function previewImage() {
            document.getElementById("img-upload").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("imgInp").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("img-upload").src = oFREvent.target.result;
            };
        };
    </script>

@endsection
