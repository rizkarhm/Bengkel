<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('img/logo_only.svg') }}" width="35" alt="" class="ml-2 my-3">
        </div>
        <div class="sidebar-brand-text mx-3 text-left">Kalil Auto Service</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if (auth()->user()->role == 'Admin')
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endif

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Transaksi
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('booking.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Book Appointment</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('history.index') }}">
            <i class="fas fa-fw fa-clock"></i>
            <span>Riwayat Service</span></a>
    </li>

    @if (auth()->user()->role != 'Customer' )
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-comments"></i>
                <span>Feedback</span></a>
        </li>
    @endif

    @if (auth()->user()->role == 'Admin')
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Data Management
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('kendaraan.index') }}">
            <i class="fas fa-fw fa-car-alt"></i>
            <span>Kendaraan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar"
            style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('galeri.index') }}">Galeri</a>
                <a class="collapse-item" href="{{ route('kontak.index') }}">Kontak</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        User Management
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('customer.index') }}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>Customer</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>


{{--
    Admin: All
    Mekanik: Exlude master data, user management
    Magang:  Exlude master data, user management | read only transaction
    Customer: Book Appointment, Riwayat Service
--}}
