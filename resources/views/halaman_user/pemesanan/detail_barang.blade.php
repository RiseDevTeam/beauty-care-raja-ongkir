@extends('master_layouts.halaman_home')

@section('content')
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
        style="background-image:url('{{ asset('gambar/bg2.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Product Details</h1>
                            {{-- <h2>Free html5 templates Made by <a href="http://freehtml5.co" target="_blank">freehtml5.co</a></h2> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-product">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 animate-box">
                    <div class="owl-carousel owl-carousel-fullwidth product-carousel">
                        <div class="item">
                            <div class="active text-center">
                                <figure>
                                    <img src="{{ asset('gambar/' . $detail->gambar) }}" alt="produk">
                                </figure>
                            </div>
                        </div>
                        <div class="item">
                            <div class="active text-center">
                                <figure>
                                    <img src="{{ asset('gambar/' . $detail->gambar) }}" alt="produk">
                                </figure>
                            </div>
                        </div>
                        <div class="item">
                            <div class="active text-center">
                                <figure>
                                    <img src="{{ asset('gambar/' . $detail->gambar) }}" alt="produk">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <h2>{{ $detail->nama_barang }}</h2>
                            <p>
                            <h3>Total Stok Tersedia : {{ $detail->persediaan->persediaan }}</h3>
                            <p>
                            <form action="{{ route('proses_pemesanan') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="id_persediaan" value="{{ $detail->persediaan->id_persediaan }}">
                                @if ($detail->persediaan->diskon != 0)
                                    <input type="hidden" name="harga"
                                        value="{{ $detail->persediaan->harga - $detail->persediaan->diskon }}">
                                @else
                                    <input type="hidden" name="harga" value="{{ $detail->persediaan->harga }}">
                                @endif

                                <input type="hidden" name="kode_barang" value="{{ $detail->kode_barang }}">

                                <div class="itemtype" style="margin-bottom: 40px">
                                    <div class="row">
                                        <div class="itemtype">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <p class="p-price float-left">Kuantiti </p><input type="number"
                                                    name="kuantiti" value="1" min="1" class="form-control"
                                                    required>
                                            </div>
                                            <div class="col-md-4"></div>

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-outline btn-lg">Pesan</button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="fh5co-tabs animate-box">
                        <ul class="fh5co-tab-nav">
                            <li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i
                                            class="icon-file"></i></span><span class="hidden-xs">Product Details</span></a>
                            </li>
                            {{-- <li><a href="#" data-tab="2"><span class="icon visible-xs"><i class="icon-bar-graph"></i></span><span class="hidden-xs">Specification</span></a></li> --}}
                        </ul>

                        <!-- Tabs -->
                        <div class="fh5co-tab-content-wrap">

                            <div class="fh5co-tab-content tab-content active" data-tab-content="1">
                                <div class="col-md-10 col-md-offset-1">
                                    @if ($detail->persediaan->diskon != 0)
                                        <span class="price">Rp.
                                            {{ number_format($detail->persediaan->harga - $detail->persediaan->diskon, 0, '.', '.') }}</span>
                                    @else
                                        <span class="price">Rp.
                                            {{ number_format($detail->persediaan->harga, 0, '.', '.') }}</span>
                                    @endif

                                    <h2>{{ $detail->nama_barang }}</h2>
                                    <p>{{ $detail->deskripsi }}.</p>

                                    {{-- <div class="row">
										<div class="col-md-6">
											<h2 class="uppercase">Keep it simple</h2>
											<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
										</div>
										<div class="col-md-6">
											<h2 class="uppercase">Less is more</h2>
											<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
										</div>
									</div> --}}

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
