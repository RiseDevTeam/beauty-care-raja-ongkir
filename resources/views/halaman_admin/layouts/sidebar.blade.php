 <!-- Sidebar Menu -->
 <nav class="mt-2">

     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

         @if (Auth::user()->status == 'admin')
             <li class="nav-item has-treeview">
                 <a href="{{ route('kelola_akun') }}" class="nav-link mr-1">
                     &nbsp;<i class="fas fa-users mr-2"></i>
                     <p>
                         Akun
                     </p>
                 </a>
             </li>


             <li class="nav-item has-treeview">
                 <a href="{{ route('dashboard') }}" class="nav-link">
                     <i class="nav-icon fas fa-tachometer-alt"></i>
                     <p>
                         Dashboard
                     </p>
                 </a>
             </li>


             <li class="nav-item">
                 <a href="{{ route('kelola_barang') }}" class="nav-link">
                     <i class="fas fa-boxes ml-1 mr-2"></i>
                     <p>
                         Kelola Barang
                     </p>
                 </a>
             </li>

             <li class="nav-item">
                 <a href="{{ route('kelola_persediaan') }}" class="nav-link">
                     <i class="far fa-sticky-note ml-2 mr-2"></i>
                     <p>
                         Kelola Persediaan
                     </p>
                 </a>
             </li>

             <li class="nav-item">
                 <a href="{{ route('kurir') }}" class="nav-link">
                     <i class="fas fa-people-carry ml-1 mr-2"></i>
                     <p>
                         Kelola Kurir
                     </p>
                 </a>
             </li>

             <li class="nav-item">
                 <a href="{{ route('kelola_pemesanan') }}" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                         Kelola Pemesanan
                     </p>
                 </a>
             </li>

             <li class="nav-item">
                 <a href="{{ route('kelola_pembayaran') }}" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                         Kelola Pembayaran
                     </p>
                 </a>
             </li>

             <li class="nav-item">
                 <a href="{{ route('laporan_admin') }}" class="nav-link">
                     <i class="fas fa-book ml-2 mr-2"></i>
                     <p>
                         Laporan
                     </p>
                 </a>
             </li>
         @endif

         @if (Auth::user()->status == 'karyawan')
             <li class="nav-item has-treeview">
                 <a href="{{ route('dashboard') }}" class="nav-link">
                     <i class="nav-icon fas fa-tachometer-alt"></i>
                     <p>
                         Dashboard
                     </p>
                 </a>
             </li>


             <li class="nav-item">
                 <a href="{{ route('kelola_barang') }}" class="nav-link">
                     <i class="fas fa-boxes ml-1 mr-2"></i>
                     <p>
                         Kelola Barang
                     </p>
                 </a>
             </li>

             <li class="nav-item">
                 <a href="{{ route('kelola_persediaan') }}" class="nav-link">
                     <i class="far fa-sticky-note ml-2 mr-2"></i>
                     <p>
                         Kelola Persediaan
                     </p>
                 </a>
             </li>

             <li class="nav-item">
                 <a href="{{ route('kelola_pemesanan') }}" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                         Kelola Pemesanan
                     </p>
                 </a>
             </li>

             <li class="nav-item">
                 <a href="{{ route('kelola_pembayaran') }}" class="nav-link">
                     <i class="nav-icon fas fa-copy"></i>
                     <p>
                         Kelola Pembayaran
                     </p>
                 </a>
             </li>
         @endif

     </ul>
 </nav>
 <!-- /.sidebar-menu -->
