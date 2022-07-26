@extends('master_layouts.halaman_home')

@section('content')
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
        style="background-image:url('{{ asset('gambar/bg2.jpg') }}'); margin-bottom:100px">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Proses Pembayaran</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Submit Ad -->
    <div class="submit-ad main-grid-border">
        <div class="container">
            <h2 class="head">Proses Pembayaran</h2>
            <div class="post-ad-form">
                <table class="table table-bordered">
                    <tr class="text-center">
                        <td>Harga Produk</td>
                        <td>Ongkir</td>
                        <td>Total Pembayaran</td>
                    </tr>
                    <tr class="text-center">
                        @php
                            $total = 0;
                            $grandtotal = 0;
                        @endphp
                        @foreach ($proses as $p)
                            @php
                                $total = ($p->harga - $p->diskon) * $p->kuantiti;
                                $grandtotal += $total;
                            @endphp
                        @endforeach
                        <td id="total_harga">Rp {{ number_format($grandtotal) }}</td>
                        @php
                            $ongkir = DB::table('daftar_ongkir_draf')
                                ->where('id_user', Auth::User()->id)
                                ->orderBy('id_daftar_ongkir', 'desc')
                                ->first();
                        @endphp
                        <td>
                            @if ($ongkir)
                                Rp.{{ number_format($ongkir->value) }}
                            @endif
                        </td>
                        <td>
                            @if ($ongkir)
                                Rp {{ number_format($grandtotal + $ongkir->value) }}
                            @endif
                        </td>
                    </tr>
                </table>
                <div class="personal-details" style="margin-bottom: 40px">
                    <form action="{{ route('cek_harga_ongkir') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                        <label>Pilih Provinsi <span>*</span></label>
                        <select class="form-control" onchange="pilihProvinsi(this);" name="provinsi">
                            <option selected value="">Open this select menu</option>
                            @foreach ($daftarProvinsi as $provinsi)
                                <option value="{{ $provinsi->province_id }}">{{ $provinsi->title }}</option>
                            @endforeach
                        </select>
                        <div class="clearfix"></div>

                        <label>Pilih Kota <span>*</span></label>
                        <select class="form-control" name="id_kota" id="pilih_kota" onchange="pilihKota(this);">
                            <option>Pilih Kota</option>
                        </select>
                        <div class="clearfix"></div>

                        <label>Pilih Kurir <span>*</span></label>
                        <select id="pilih-kurir" name="id_kurir" class="form-control" onchange="SelectKurir(this.value);">
                            <option data-harga="0" id="kurir_none" value="">Pilih Kurir</option>
                            @foreach ($daftarkurir as $data)
                                <option value="{{ $data->code }}">{{ $data->title }}</option>
                            @endforeach
                        </select>
                        <br>
                        <button type="submit", class="btn btn-primary">Proses Harga Ongkir</button>
                    </form>
                    <form action="{{ route('proses_checkout') }}" method="POST" enctype="multipart/form-data">
                        <label for="alamat">Alamat Lengkap <span>*</span></label>
                        @csrf
                        @if ($ongkir)
                            <input type="hidden" name="total_akhir" id="total_harga1"
                                value="{{ $grandtotal + $ongkir->value }}">
                            <input type="hidden" value="{{ $ongkir->id_daftar_ongkir }}" name="id_daftar_ongkir">
                        @endif
                        <div class="row form-group">
                            <div class="col-md-12">
                                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" placeholder="Alamat Lengkap"></textarea>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <label for="1" class="form-label">Metode Pembayaran</label>
                        <select id="pilih" onchange="cek()" name="tipe_pembayaran" class="form-control">
                            <option selected value="">Pilih Metode Pembayaran</option>
                            <option value="transfer">Transfer</option>
                            <option value="cod">Cash On Delevery</option>
                        </select><br>
                        <div id="hasil"></div>
                        <div class="clearfix"></div>

                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Kirim Bukti Pembayaran</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Nama Akun : BRS Beauty Care</p><br>
                                        <p>Nomor Rekening : 12345678910</p><br>
                                        <p>Kirim Bukti pembayaran</p><br>
                                        <input type="file" name="bukti_pembayaran"><br>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                                            aria-label="Close">SAVE</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <button type="submit" class="btn btn-success">Chekout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- // Submit Ad -->
    <script>
        function pilihProvinsi(val) {
            $.ajax({
                type: 'post',
                url: "{{ route('ajax_kota') }}",
                datatype: 'HTML',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "provinsi": val.value
                },
                success: function(response) {
                    const data = response
                    console.log(data);
                    const pilihKota = document.getElementById("pilih_kota")

                    data.forEach(e => {
                        // dari api rajaongkir
                        // var hargaKurir = e.harga;
                        // let optNama = document.createElement('option');
                        // optNama.value = e.city_id;
                        // optNama.innerHTML = `${e.type} ---- (${e.city_name})`;
                        // pilihKota.appendChild(optNama);

                        // dari database
                        let optNama = document.createElement('option');
                        optNama.value = e.city_id;
                        optNama.innerHTML = `${e.title}`;
                        pilihKota.appendChild(optNama);
                    });
                }
            })
        }
    </script>
    <script>
        function cek() {
            var tes = document.getElementById("pilih").value;
            if (tes == 'transfer') {
                $('#modal-default').modal('show');
            } else {
                document.getElementById("hasil").innerHTML = ("");
            }
        }

        let pilih = document.getElementById("pilih-kurir")
    </script>
@endsection
