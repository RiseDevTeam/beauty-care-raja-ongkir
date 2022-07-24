@php
use App\Models\Pemesanan;
@endphp
@if (Auth::user())
    @php
        $total = 0;
        $total = Pemesanan::where('id_user', Auth::user()->id)->count();
    @endphp
    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="{{ route('/') }}"><span></span> BEAUTY CARE</a>

            </div>
             <div class="footer-social-icons">
                <ul>
                    <li><a class="facebook" href="#"><span>Facebook</span></a></li>
                    <li><a class="twitter" href="#"><span>Twitter</span></a></li>
                    <li><a class="flickr" href="#"><span>Flickr</span></a></li>
                    <li><a class="googleplus" href="#"><span>Google+</span></a></li>
                    <li><a class="dribbble" href="#"><span>Dribbble</span></a></li>
                </ul>
            </div>

            <div class="header-right">
                <a style="margin-right: 5px;" class="account" href="{{ route('pemesanan_saya') }}">Pemesanan
                    Saya</a>
                <a class="account" href="login.html"></a>
                <a class="account" href="{{ route('pesanan_user') }}"><i class="fa fa-cart-plus"
                        aria-hidden="true">({{ $total }})</i></a>
                <div class="dropdown">
                    {{-- <br> --}}
                    <a class="dropdown-toggle account" type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true">
                        {{ Auth::user()->name }}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
@else
    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="{{ route('/') }}"><span></span> BEAUTY CARE</a>

            </div>

            <div class="header-right">
                <a style="margin-right: 5px;" class="account" href="{{ route('login') }}">Masuk / Daftar</a>
            </div>

        </div>
    </div>
@endif
