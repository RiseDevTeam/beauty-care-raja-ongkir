@extends('master_layouts.halaman_home')

@section('content')
<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url('{{asset('gambar/bg2.jpg')}}'); margin-bottom:100px">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Keranjang Belanja</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

    <!-- Submit Ad -->
    <div class="submit-ad main-grid-border" style="margin-top: 100px">
        <div class="container">
            <h2 class="head">Informasi Pemesanan</h2>
            <div class="post-ad-form">
                <table class="table table-bordered">
                    <tr class="text-center" style="background-color:aquamarine; color:white;">
                        <th>Nomor</th>
                        <th>Nama Pemesanan</th>
                        <th>Nama Barang</th>
                        <th>Kuantiti</th>
                        <th>Harga</th>
                        {{-- <th>Diskon</th> --}}
                        <th>Total</th>
                        <th>Konfirmasi Admin</th>
                        <th>Hapus Pesan</th>
                    </tr>
                       @php
                            $total = 0;
                            $status = 0;
                            $grandtotal = 0;
                        @endphp
                        @foreach ($pesan as $p)
                    <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->barang->nama_barang }}</td>
                            <td>{{ $p->kuantiti }}</td>
                            <td>Rp. {{ number_format($p->harga - $p->diskon, 0, '.', '.') }}</td>
                            {{-- <td>{{ $p->diskon }}</td> --}}
                            <td>Rp. {{ number_format(($p->harga - $p->diskon) * $p->kuantiti, 0, '.', '.') }}</td>
                            @php
                                $total = ($p->harga - $p->diskon) * $p->kuantiti;
                                $grandtotal += $total;
                            @endphp
                            <td>
                                @if ($p->status == 'pending')
                                    Tunggu Konfirmasi dari admin
                                @else
                                    {{ $p->status }}
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('pesan_hapus', $p->id_pemesanan) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                    </tr>
                        @endforeach
                </table>

                <div class="text-right" style="margin-bottom:40px; margin-top: 40px;">
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                        <div class="card">
                            <h3>CART TOTAL</h3>  
                            <hr>
                            <div class="row">
                                <div class="col-md-5"><h4>TOTAL      :  </h4></div>
                                <div class="col-md-7"><h4>Rp. {{ number_format($grandtotal, 0, '.', '.') }} </h4></div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="text-right" style="margin-bottom:40px">

                            <a href="{{ route('proses_pembayaran') }}" class="btn btn-success">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- // Submit Ad -->

@endsection
