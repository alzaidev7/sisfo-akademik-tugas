<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar">

    {{-- Logo --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ url('/') }}">

        <div class="sidebar-brand-icon">
            <i class="fas fa-graduation-cap"></i>
        </div>

        <div class="sidebar-brand-text mx-3">
            SISFO Akademik
        </div>

    </a>


    <hr class="sidebar-divider my-0">


    {{-- Dashboard --}}
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">

        <a class="nav-link"
           href="{{ url('/') }}">

            <i class="fas fa-fw fa-tachometer-alt"></i>

            <span>Dashboard</span>

        </a>

    </li>


    <hr class="sidebar-divider">


    {{-- Data Master --}}
    <div class="sidebar-heading">
        Data Master
    </div>


    {{-- Data Kelas --}}
    <li class="nav-item {{ request()->routeIs('kelas.*') ? 'active' : '' }}">

        <a class="nav-link"
           href="{{ route('kelas.index') }}">

            <i class="fas fa-fw fa-school"></i>

            <span>Data Kelas</span>

        </a>

    </li>


    {{-- Data Siswa --}}
    <li class="nav-item {{ request()->routeIs('siswa.*') ? 'active' : '' }}">

        <a class="nav-link"
           href="{{ route('siswa.index') }}">

            <i class="fas fa-fw fa-users"></i>

            <span>Data Siswa</span>

        </a>

    </li>


    {{-- Data Guru --}}
    <li class="nav-item {{ request()->routeIs('guru.*') ? 'active' : '' }}">

        <a class="nav-link"
           href="{{ route('guru.index') }}">

            <i class="fas fa-fw fa-chalkboard-teacher"></i>

            <span>Data Guru</span>

        </a>

    </li>


    {{-- Mata Pelajaran --}}
    <li class="nav-item {{ request()->routeIs('mapel.*') ? 'active' : '' }}">

        <a class="nav-link"
           href="{{ route('mapel.index') }}">

            <i class="fas fa-fw fa-book"></i>

            <span>Mata Pelajaran</span>

        </a>

    </li>


    <hr class="sidebar-divider">


    {{-- Akademik --}}
    <div class="sidebar-heading">
        Akademik
    </div>


    {{-- Nilai Siswa --}}
    <li class="nav-item {{ request()->routeIs('nilai.*') ? 'active' : '' }}">

        <a class="nav-link"
           href="{{ route('nilai.index') }}">

            <i class="fas fa-fw fa-clipboard-list"></i>

            <span>Nilai Siswa</span>

        </a>

    </li>


    <hr class="sidebar-divider d-none d-md-block">


    {{-- Toggle Sidebar Desktop --}}
    <div class="text-center d-none d-md-inline">

        <button class="rounded-circle border-0"
                id="sidebarToggle">
        </button>

    </div>

</ul>