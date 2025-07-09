<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation"
    data-accordion="false" id="navigation">
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('data-guru') }}" class="nav-link">
            <i class="nav-icon bi bi-people"></i>
            <p>Data Guru</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('data-siswa') }}" class="nav-link">
            <i class="nav-icon bi bi-person-circle"></i>
            <p>Data Siswa</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('data-kelas') }}" class="nav-link">
            <i class="nav-icon bi bi-person-check"></i>
            <p>Data Kelas</p>
        </a>
    </li>
</ul>