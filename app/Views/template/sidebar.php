    <li class="nav-item">
      <a href="<?= site_url('layout/index') ?>" class="nav-link bg-danger">
        <i class="nav-icon fas fa-home"></i>
        <p class="text">Dashboard</p>
      </a>
    </li>
    <?php if (session()->level_user == 'direktur') : ?>
      <li class="nav-item">
        <a href="#" class="nav-link bg-white">
          <i class="nav-icon fas fa-file-alt"></i>
          <p class="text">LAPORAN
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= site_url('laporan/kejadian') ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p class="text">Laporan kejadian</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('laporan/mobilPetugas') ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p class="text">Laporan Mobil Petugas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('laporan/mobilTerlibat') ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p class="text">Laporan Mobil Terlibat</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('laporan/korbanKecelakaan') ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p class="text">Laporan Korban Kecelakaan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('laporan/bbmMobil') ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p class="text">Laporan Pengisian BBM</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('laporan/laporanTerkait') ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p class="text">Laporan Terkait kejadian</p>
            </a>
          </li>
        </ul>
      </li>
    <?php endif; ?>
    <?php if (session()->level_user == 'admin') : ?>
      <li class="nav-item">
        <a href="#" class="nav-link bg-success">
          <i class="nav-icon fas fa-database"></i>
          <p class="text">MASTER DATA
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= site_url('mobil/index') ?>" class="nav-link">
              <i class="fas fa-car nav-icon"></i>
              <p class="text">Data Mobil</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('petugas/index') ?>" class="nav-link">
              <i class="fa fa-user nav-icon"></i>
              <p class="text">Data Petugas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('sta/index') ?>" class="nav-link">
              <i class="fa fa-tasks nav-icon"></i>
              <p class="text">Data Station</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('gangguan/index') ?>" class="nav-link">
              <i class="fa fa-hammer nav-icon"></i>
              <p class="text">Data Gangguan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('sumberinformasi/index') ?>" class="nav-link">
              <i class="fa fa-info nav-icon"></i>
              <p class="text">Data Sumber Informasi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-car-crash"></i>
              <p class="text">Kecelakaan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('tipe/index') ?>" class="nav-link">
                  <i class="nav-icon fa fa-car"></i>
                  <p class="text">Tipe Kecelakaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('penyebab/index') ?>" class="nav-link">
                  <i class="nav-icon fa fa-car"></i>
                  <p class="text">Penyebab Kecelakaan</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link bg-info">
          <i class="nav-icon fas fa-clipboard-list"></i>
          <p class="text">DATA TRANSAKSI
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= site_url('petugashariini/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p class="text">Petugas Senkom</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('jadwalmobil/tampil') ?>" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p class="text">Mobil Petugas Hari Ini</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('bbmMobil/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-gas-pump"></i>
              <p class="text">BBM Mobil</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('penerimaanlaporan/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p class="text">Penerimaan Laporan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('kejadian/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p class="text">Kejadian</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link bg-white">
          <i class="nav-icon fas fa-file-alt"></i>
          <p class="text">LAPORAN
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= site_url('laporan/kejadian') ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p class="text">Laporan kejadian</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('laporan/mobilPetugas') ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p class="text">Laporan Mobil Petugas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('laporan/mobilTerlibat') ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p class="text">Laporan Mobil Terlibat</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('laporan/korbanKecelakaan') ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p class="text">Laporan Korban Kecelakaan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('laporan/bbmMobil') ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p class="text">Laporan Pengisian BBM</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('laporan/laporanTerkait') ?>" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p class="text">Laporan Terkait kejadian</p>
            </a>
          </li>
        </ul>
      </li>
    <?php endif; ?>
    <?php if (session()->level_user == 'user') : ?>
      <li class="nav-item">
        <a href="#" class="nav-link bg-success">
          <i class="nav-icon fas fa-database"></i>
          <p class="text">MASTER DATA
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= site_url('mobil/index') ?>" class="nav-link">
              <i class="fas fa-car nav-icon"></i>
              <p class="text">Data Mobil</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link bg-info">
          <i class="nav-icon fas fa-clipboard-list"></i>
          <p class="text">DATA TRANSAKSI
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= site_url('kejadian/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p class="text">Kejadian</p>
            </a>
          </li>
        </ul>
      </li>
    <?php endif ?>
    <li class="nav-item">
      <a href="<?= site_url('login/keluar') ?>" class="nav-link bg-warning">
        <i class="fa fa-sign-out-alt nav-icon"></i>
        <p class="text">Logout</p>
      </a>
    </li>