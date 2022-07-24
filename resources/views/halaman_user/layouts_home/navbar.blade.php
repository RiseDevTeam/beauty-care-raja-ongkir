<nav class="fh5co-nav" role="navigation">
		<div class="container">
			@php
			use App\Models\Pemesanan;
			@endphp
			@if (Auth::user())
				@php
					$total = 0;
					$total = Pemesanan::where('id_user', Auth::user()->id)->count();
				@endphp
					<div class="row">
						<div class="col-md-4 col-xs-2">
							<div id="fh5co-logo">
								<a href="{{ route('/') }}"> BEAUTY CARE</a>
							</div>
						</div>
					
						<div class="col-md-4 col-xs-6 text-right menu-1">
							<ul>
								<li><a href="{{ route('pemesanan_saya') }}">Pemesanan Saya</a></li>	
							</ul>
						</div>	
						<div class="col-md-4 col-xs-4 text-right hidden-xs menu-2">
							<ul>
							<li> <a href="https://api.whatsapp.com/send?phone=.+6282172132953.&text=Halo. Ada Yang Bisa Saya Bantu??" target="blank" style="color:green; font-weight:bold"></i>Chat</a></li>
								<li class="has-dropdown">
									<a href="{{ route('login') }}">{{ Auth::user()->name }}</a> <span class="caret"></span>
									<ul class="dropdown">
										<li><a href="{{ route('logout') }}"><i class="fa-sign-out"></i> Logout</a></li>
									</ul>
								</li>	
								<li class="shopping-cart" style="margin-left: 20px"><a href="{{ route('pesanan_user') }}" class="cart"><span><small>{{ $total }}</small><i class="icon-shopping-cart"></i></span></a></li>
							</ul>
						</div>
						{{-- <div class="col-md-2 col-xs-2 text-right">
							<div id="fh5co-logo">
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-facebook"></i></a>
							</div>
						</div> --}}
						
					</div>

			@else 

			<div class="row">
				<div class="col-md-3 col-xs-2">
					<div id="fh5co-logo"><a href="{{ route('/') }}"> BEAUTY CARE</a>
					</div>
				</div>
				<div class="col-md-4 col-xs-6 text-center menu-1">
						
				</div>
				<div class="col-md-5 col-xs-4 text-right hidden-xs menu-2">
					<ul>
						<li> <a href="https://api.whatsapp.com/send?phone=.+6282172132953.&text=Halo. Ada Yang Bisa Saya Bantu??" target="blank" style="color:green; font-weight:bold"> </i> Chat</a></li>
						<li><a href="{{ route('login') }}">MASUK / DAFTAR</a></li>
					</ul>
				</div>
				{{-- <div class="col-md-2 col-xs-2 text-md-right">
					<div id="fh5co-logo">
						<a href="#"><i class="icon-instagram"></i></a>
						<a href="#"><i class="icon-facebook"></i></a>
					</div>
				</div> --}}
			</div>
			@endif
			
		</div>
	</nav>