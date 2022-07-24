@extends('master_layouts.halaman_home')

@section('content')
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image:url('{{ asset('gambar/brs.jpeg') }}')">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    {{-- <span class="price">Rp.{{ number_format($b->harga, 0, '.', '.') }}</span> --}}
                                    <h2>Ayo Belanja</h2>
                                    <p>BRS Beauty Padang merupakan sebuah klinik kecantikan yang berada di Jl. Gurun
                                        laweh, Kec.Nanggalo, Kota Padang, Sumatera Barat. Klinik ini menyediakan berbagai
                                        macam produk dan perawatan wajah yang diperuntukkan bagi wanita maupun pria
                                        untuk mengatasi permasalahan pada wajah mereka.</p>
                                    <p><a href="#" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @php
                    $barang = DB::table('barang')
                        ->join('persediaan', 'barang.kode_barang', '=', 'persediaan.kode_barang')
                        ->get();
                @endphp
                @foreach ($barang as $b)
                    <li style="background-image:url('{{ asset('gambar/' . $b->gambar) }}')">
                        <div class="overlay-gradient"></div>
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        @if ($b->diskon != 0)
                                            <span
                                                style="text-decoration: line-through grey; color:grey; float:left; margin-right:15px;">
                                                Rp. {{ number_format($b->harga, 0, '.', '.') }}</span>
                                            <span
                                                class="price">Rp.{{ number_format($b->harga - $b->diskon, 0, '.', '.') }}</span>
                                        @else
                                            <span class="price">Rp.{{ number_format($b->harga, 0, '.', '.') }}</span>
                                            <p>Total Stok Tersedia : {{ $b->persediaan }}</p>
                                        @endif
                                        <h2>{{ $b->nama_barang }}</h2>
                                        <p>{{ $b->deskripsi }}.</p>
                                        <p><a href="{{ route('detail_barang', $b->id_barang) }}"
                                                class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </aside>

    <div id="fh5co-services" class="fh5co-bg-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i class="icon-credit-card"></i>
                        </span>
                        <h3>Credit Card</h3>
                        <p>Pembayaran Bisa Mengunakan Metode Transfer untuk diluar Wilayah Kota Padang</p>
                        <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i class="icon-wallet"></i>
                        </span>
                        <h3>Save Money</h3>
                        <p>Menghemat uang anda, karna produk kami bisa di pesan secara online</p>
                        <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        <span class="icon">
                            <i class="icon-paper-plane"></i>
                        </span>
                        <h3>Free Delivery</h3>
                        <p>Gratis Ongkir untuk Seluruh Wilayah Kota Padang</p>
                        <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="fh5co-product">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Cool Stuff</span>
                    <h2>Products.</h2>
                </div>
            </div>
            <div class="row">
                @php
                    $barang = DB::table('barang')
                        ->join('persediaan', 'barang.kode_barang', '=', 'persediaan.kode_barang')
                        ->get();
                @endphp
                @foreach ($barang as $b)
                    <div class="col-md-4 text-center animate-box">
                        <div class="product">
                            <div class="product-grid" style="background-image:url('{{ asset('gambar/' . $b->gambar) }}')">
                                <div class="inner">
                                    @if ($b->persediaan != '0')
                                        <p>
                                            <a href="{{ route('detail_barang', $b->id_barang) }}" class="icon"><i
                                                    class="icon-eye"></i></a>
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="desc">
                                @if ($b->persediaan != '0')
                                    <h3><a href="{{ route('detail_barang', $b->id_barang) }}">{{ $b->nama_barang }}</a>
                                    </h3>
                                @endif
                                <div class="text-center">
                                    @if ($b->diskon != 0)
                                        <span
                                            style="text-decoration: line-through grey; color:grey; float:left; margin-left:30px;">
                                            Rp. {{ number_format($b->harga, 0, '.', '.') }}</span>
                                        <span class="price"
                                            style="margin-left:-20px;">Rp.{{ number_format($b->harga - $b->diskon, 0, '.', '.') }}</span>
                                    @else
                                        <span class="price">Rp.{{ number_format($b->harga, 0, '.', '.') }}</span>
                                        <p>Total Stok Tersedia : {{ $b->persediaan }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
