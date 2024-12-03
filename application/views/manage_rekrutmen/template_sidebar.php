<div class="sidebar sidebar-style-2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="<?= base_url('assets/file_foto/'); ?><?= $pelamar['foto']; ?>" alt="" class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
              <?= perpendekNama($pelamar['nama_lengkap']); ?>
              <?php if ($pelamar['role_id'] != 8) : ?>
                <div class="user-level"><?= $pelamar['ket_role']; ?> | <?= $pelamar['nama_unit']; ?></div>
              <?php elseif ($pelamar['role_id'] == 8) : ?>
                <div class="user-level"><?= $pelamar['ket_role']; ?> |
                  <?php if ($pelamar['ket_guru_id'] == 0) : ?>
                    <span class="badge badge-danger"> Belum Dipilih </span>
                  <?php else : ?>
                    <?= $pelamar['mata_pelajaran']; ?>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
              <span class="caret"></span>
            </span>
          </a>
          <div class="clearfix"></div>

          <div class="collapse in" id="collapseExample">
            <ul class="nav">
              <li>
                <a href="<?= base_url('datapelamar/upload_foto'); ?>">
                  <span class="link-collapse">Upload Foto</span>
                </a>
              </li>
              <li>
                <a href="<?= base_url('datapelamar/setting_akun') ?>">
                  <span class="link-collapse">Akun</span>
                </a>
              </li>
            </ul>
          </div>

        </div>
      </div>
      <ul class="nav nav-primary">
        <li class="nav-item <?= current_url() == base_url('homepelamar') ? "active" : '' ?>">
          <a href="<?= base_url('homepelamar') ?>">
            <i class="fas fa-home"></i>
            <p>Home</p>
          </a>
        </li>
        <li class="nav-item <?= current_url() == base_url('datapelamar') ? "active" : '' ?>">
          <a href="<?= base_url('datapelamar') ?>">
            <i class="fas fa-tasks"></i>
            <p>Data Pelamar</p>
          </a>
        </li>
        <li class="nav-item <?= current_url() == base_url('riwayathidup') ? "active" : '' ?>">
          <a href="<?= base_url('riwayathidup') ?>">
            <i class="fas fa-id-card"></i>
            <p>Daftar Riwayat Hidup</p>
          </a>
        </li>
        <!-- <hr>
        <?php if ($this->session->userdata('role_id') == 5 || $this->session->userdata('role_id') == 1) : ?>
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">MENU HCD</h4>
          </li>

          <li class="nav-item <?= current_url() == base_url('menurekrutmen') || current_url() == base_url('menurekrutmen/tahap_rekrutmen') || current_url() == base_url('menurekrutmen/riwayat_rekrutmen') ? "active" : '' ?> submenu">
            <a data-toggle="collapse" href="#rekrutmen_menu">
              <i class="fas fa-layer-group"></i>
              <p>Menu Rekrutmen</p>
              <span class="caret"></span>
            </a>
            <div class="collapse <?= current_url() == base_url('menurekrutmen') || current_url() == base_url('menurekrutmen/tahap_rekrutmen') || current_url() == base_url('menurekrutmen/riwayat_rekrutmen') ? "show" : '' ?>" id="rekrutmen_menu">
              <ul class="nav nav-collapse">
                <li class="<?= current_url() == base_url('menurekrutmen') ? "active" : '' ?>">
                  <a href="<?= base_url('menurekrutmen') ?>">
                    <span class="sub-item">Input Rekrutmen</span>
                  </a>
                </li>
                <li class="<?= current_url() == base_url('menurekrutmen/tahap_rekrutmen') ? "active" : '' ?>">
                  <a href="<?= base_url('menurekrutmen/tahap_rekrutmen') ?>">
                    <span class="sub-item">Tahap Rekrutmen</span>
                  </a>
                </li>
                <li class="<?= current_url() == base_url('menurekrutmen/riwayat_rekrutmen') ? "active" : '' ?>">
                  <a href="<?= base_url('menurekrutmen/riwayat_rekrutmen') ?>">
                    <span class="sub-item">Riwayat Seleksi Rekrutmen</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item <?= current_url() == base_url('datapelamar/daftar_pelamar') ? "active" : '' ?>">
            <a href="<?= base_url('datapelamar/daftar_pelamar') ?>">
              <i class="fas fa-users"></i>
              <p>Daftar Pelamar</p>
            </a>
          </li>
        <?php endif; ?> -->
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->

<div class="main-panel">