<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?= base_url('assets/admin/') ?>dist/img/kentang.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Kentang Tech</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/img/profil/') . $admin['foto']; ?>" class="img-circle elevation-2">
      </div>
      <div class="info">
        <a href="<?= base_url('admin/Profil') ?>" class="d-block"><?php echo $this->session->userdata('username'); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- <li class="nav-item ">
          <a href="<?= base_url('admin/Dashboard') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'Dashboard') {
                                                                          echo 'active';
                                                                        } ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li> -->
        <li class="nav-item">
          <a href="<?= base_url('admin/Transaksi') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'Transaksi') {
                                                                          echo 'active';
                                                                        } ?>">
            <i class="nav-icon fas fa-cash-register"></i>
            <p>
              Transaksi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin/History') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'History') {
                                                                        echo 'active';
                                                                      } ?>">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>Rekap
            </p>
          </a>
        </li>
        <li class="nav-header">E-Commerce</li>
        <li class="nav-item ">
          <a href="<?= base_url('admin/produk') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'produk') {
                                                                      echo 'active';
                                                                    } ?>">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Produk
            </p>
          </a>
        <li class="nav-item ">
          <a href="<?= base_url('admin/kategori') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'kategori') {
                                                                        echo 'active';
                                                                      } ?>">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Kategori
            </p>
          </a>
          <!-- <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Calendar
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li> -->

        <li class="nav-header">Artikel</li>
        <li class="nav-item">
          <a href="<?= base_url('admin/KategoriArtikel') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'KategoriArtikel') {
                                                                                echo 'active';
                                                                              } ?>">
            <i class="nav-icon fas fa-list"></i>
            <p>Kategori</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin/Subkategori') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'Subkategori') {
                                                                            echo 'active';
                                                                          } ?>">
            <i class="nav-icon fas fa-list"></i>
            <p>Sub Kategori</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="far fa-newspaper nav-icon"></i>
            <p>
              Artikel
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/Artikel/post') ?>" class="nav-link">
                <i class="far fa-plus-square nav-icon"></i>
                <p>Post</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/Artikel') ?>" class="nav-link">
                <i class="fas fa-clipboard-list nav-icon"></i>
                <p>Manajemen Artikel</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/Artikel/sampah') ?>" class="nav-link">
                <i class="fas fa-trash-alt nav-icon"></i>
                <p>Sampah Artikel</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="far fa-comments nav-icon"></i>
            <p>
              Komen
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/Komen/pengajuan') ?>" class="nav-link">
                <i class="p-3"></i>
                <p>Pengajuan Komen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/Komen') ?>" class="nav-link">
                <i class="p-3"></i>
                <p>Manajemen Komen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/Komen/sampah') ?>" class="nav-link">
                <i class="p-3"></i>
                <p>Sampah Komen</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- <li class="nav-header">MULTI LEVEL EXAMPLE</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-circle nav-icon"></i>
            <p>Level 1</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Level 1
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Level 2</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Level 2
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Level 2</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-circle nav-icon"></i>
            <p>Level 1</p>
          </a>
        </li>
        <li class="nav-header">LABELS</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Important</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Warning</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Informational</p>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>