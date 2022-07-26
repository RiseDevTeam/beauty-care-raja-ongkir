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
                            <h1>Detail Pemesanan Saya</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Submit Ad -->
    <div class="submit-ad main-grid-border" style="margin-top: 80px; margin-bottom:30px">
        <div class="container">
            <h2 class="head">Detail Pesanan Saya</h2>

            <div class="post-ad-form">
                <div class="row mt-4">
                    <div class="col-md-12"> <a href="{{ route('pemesanan_saya') }}" class="btn btn-danger mb-20">Back </a>
                    </div>
                </div>
                @foreach ($detail_pemesanan_saya as $detail)
                    <ul class="list-group list-group-horizontal-sm">
                        <li class="list-group-item"> Nama Pelanggan : {{ $detail->name }}</li>
                        <li class="list-group-item"> Provinsi : {{ $detail->provinsi }}</li>
                        <li class="list-group-item">Kota : {{ $detail->kota }}</li>
                        <li class="list-group-item">Alamat Lengkap : {{ $detail->alamat }}</li>
                        <li class="list-group-item">Nama Barang : {{ $detail->nama_barang }}</li>
                        <li class="list-group-item">Jumlah Pembelia : {{ $detail->kuantiti }}</li>
                        <li class="list-group-item">Status Penerimaan : {{ $detail->status }}</li>
                        <li class="list-group-item">Kurir : {{ $detail->nama_ongkir }}</li>
                        <li class="list-group-item">Jenis Ongkir : {{ $detail->description }}</li>
                        <li class="list-group-item">Biaya Kurir : {{ number_format($detail->value) }}</li>
                        <li class="list-group-item">Total : {{ number_format($detail->harga + $detail->value) }}</li>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
    <!-- // Submit Ad -->
@endsection
