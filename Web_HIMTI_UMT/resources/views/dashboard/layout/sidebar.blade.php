    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion pt-4" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center active mb-4" href="{{ route('dashboard')}}">
            <img src="{{ asset('assets/images/HIMTI.png')}}" rel="icon" alt="gambar" class="thumbnail img-fluid">
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item @yield('dashboard')">
            <a class="nav-link" href="{{ route('dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Kategori -->
        <li class="nav-item @yield('kategori')">
            <a class="nav-link" href="{{ route('kategori.index')}}">
                <i class="fas fa-fw fa-list-ul"></i>
                <span>Kategori</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">


        <!-- Nav Item - Anggota -->
        <li class="nav-item @yield('angkatan')">
            <a class="nav-link" href="{{ route('angkatan.index')}}">
                <i class="fas fa-fw fa-users"></i>
                <span>Angkatan</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Anggota -->
        <li class="nav-item @yield('anggota')">
            <a class="nav-link" href="{{ route('anggota.index')}}">
                <i class="fas fa-fw fa-address-card"></i>
                <span>Anggota</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">


        <!-- Nav Item - Acara -->
        <li class="nav-item @yield('acara')">
            <a class="nav-link" href="{{ route('acara.index')}}">
                <i class="fas fa-fw fa-calendar"></i>
                <span>Acara</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">


         <!-- Nav Item - Jadwal Sharing -->
        <li class="nav-item @yield('jadwalSharing')">
            <a class="nav-link" href="{{ route('jadwal-sharing.index')}}">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Jadwal Sharing</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">


         <!-- Nav Item - Artikel -->
        <li class="nav-item @yield('artikel')">
            <a class="nav-link" href="{{ route('artikel.index')}}">
                <i class="fas fa-fw fa-pen"></i>
                <span>Artikel</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
