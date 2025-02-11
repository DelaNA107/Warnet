<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>" class="brand-link">
    <img src="<?= base_url('template/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('template/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php
        if (session()->get('hak_akses') == 'admin') {
        ?>
          <li class="nav-item">
            <a href="paket" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Paket
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="komputer" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Komputer
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="transaksi" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="kategori" class="nav-link">
              <i class="nav-icon fas fa-th"></i>  
              <p>
                Kategori
              </p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="<?= base_url('/paket'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Paket
              </p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="<?= base_url('/staff'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Staff
              </p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="<?= base_url('/member'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Member
              </p>
            </a> -->
          </li>
          <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        <?php
        }
        ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>