<?php 

$page = @$_GET['pages'];


if ($page == 'pengguna') {
  $penggunaaktif = 'active';
}

if ($page == 'kelas') {
  $masteraktif1 = 'menu-open';
  $masteraktif2 = 'active';
  $kelasaktif = 'active';
}

if ($page == 'tahun') {
  $masteraktif1 = 'menu-open';
  $masteraktif2 = 'active';
  $tahunaktif = 'active';
}

if ($page == 'siswa') {
  $masteraktif1 = 'menu-open';
  $masteraktif2 = 'active';
  $siswaaktif = 'active';
}
if ($page == 'kenaikan') {
  $masteraktif1 = 'menu-open';
  $masteraktif2 = 'active';
  $kenaikanaktif = 'active';
}


 ?>

<a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          
          <li class="nav-item has-treeview <?= $masteraktif1; ?>">
            <a href="#" class="nav-link <?= $masteraktif2; ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?pages=tahun" class="nav-link <?= $tahunaktif; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Tahun Ajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?pages=kelas" class="nav-link <?= $kelasaktif; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?pages=siswa" class="nav-link <?= $siswaaktif; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?pages=kenaikan" class="nav-link <?= $kenaikanaktif; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kenaikan Kelas</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
                <a href="?pages=pengguna" class="nav-link <?= $penggunaaktif; ?>">
                  <i class="far fa-user nav-icon"></i>
                  <p>pengguna</p>
                </a>
              </li>
        </ul>
      </nav>