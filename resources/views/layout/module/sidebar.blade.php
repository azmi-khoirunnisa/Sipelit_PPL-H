<nav class="sidebar-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard')}}">
                <i class="nav-icon icon-speedometer"></i> Dashboard
            </a>
        </li>

        <li class="nav-title">MANAJEMEN</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <i class="nav-icon icon-people"></i> Daftar Pengguna
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link">
                <i class="nav-icon icon-pie-chart"></i> Daftar Data Panen
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('berita.index')}}">
                <i class="nav-icon icon-book-open"></i> Berita
            </a>
        </li>

            </ul>
</nav>
