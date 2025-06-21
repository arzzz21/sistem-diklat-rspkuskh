<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="/" class="brand-link">
    <span class="brand-text font-weight-light">Sistem Diklat</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-item">
          <a href="/" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('kampus.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kampus</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('mahasiswa.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Mahasiswa</p>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>
                Magang
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('pengajuan.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengajuan Magang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lain</p>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item">
          <a href="/magang" class="nav-link">
            <i class="nav-icon fas fa-briefcase"></i>
            <p>Pengelolaan Magang</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/pelatihan" class="nav-link">
            <i class="nav-icon fas fa-graduation-cap"></i>
            <p>Pelatihan Luar</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
