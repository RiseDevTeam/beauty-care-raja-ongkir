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
                            <h1>Pemesanan Saya</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Submit Ad -->
    <div class="submit-ad main-grid-border" style="margin-top: 80px; margin-bottom:30px">
        <div class="container">
            <h2 class="head">Pesanan Saya</h2>

            <div class="post-ad-form">
                <div class="row mt-4">
                    <div class="col-md-12"> <a href="{{ route('faktur') }}" class="btn btn-success mb-20"
                            target="_blank">Faktur </a></div>
                </div>
                <table class="table table-bordered">
                    <tr class="text-center" style="background-color:aquamarine; color:white;">
                        <th>Nomor</th>
                        <th>Nama Pemesan</th>
                        <th>Kota</th>
                        <th>Alamat</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Status Barang</th>
                        <th>Status Penerimaan</th>
                        <th>Detail Informasi</th>
                    </tr>
                    @foreach ($pembayaran as $p)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->kota }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->nama_barang }}</td>
                            <td>Rp. {{ number_format($p->harga, 0, '.', '.') }}</td>
                            <td>
                                @if ($p->status == 'pending')
                                    {{ 'Barang Sedeng dikemas' }}
                                @elseif($p->status == 'konfirmasi')
                                    {{ 'Barang Sedeng diperjalanan' }}
                                @else
                                    {{ $p->status }}
                                @endif
                            </td>
                            <td>
                                @if ($p->status == 'konfirmasi')
                                    <a href="{{ route('barang_sampai', $p->id_pembayaran) }}" class="btn btn-info">Barang
                                        Sampai</a>
                                @else
                                    {{ $p->status }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('detail_pemesanan_saya', $p->id_pembayaran) }}"
                                    class="btn btn-info ">Detail Pemesanan
                                    Saya</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- // Submit Ad -->
@endsection
