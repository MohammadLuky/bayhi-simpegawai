<div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="<?= base_url('assets/pegawai/'); ?>images/backgrounds/02.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href=""><img class="brand-logo" src="<?= base_url('assets/') ?>bayhi.ico" />
                    <h3 class="brand-text">E-PEGAWAI</h3>
                </a></li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="fas fa-times"></i></a></li>
        </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item mr-auto">
                <div class="row ml-2">
                    <div class="col-md-2">
                        <span class="avatar avatar-online"><img src="<?= base_url('assets/file_foto/'); ?><?= $pegawai['foto']; ?>" alt="avatar"></span>
                    </div>
                    <div class="col-md-10">
                        <?= strtoupper(perpendekNama($pegawai['nama_lengkap'])); ?>
                    </div>
                </div>
                <div class="row ml-2 mt-1">
                    <span class="badge badge-warning"><?= $pegawai['ket_role']; ?> -
                        <?php if ($pegawai['role_id'] == 8) : ?>
                            <?php if ($pegawai['ket_guru_id'] == 0) : ?>
                                <span class="badge badge-danger"> Belum Memilih Mata Pelajaran </span>
                            <?php else : ?>
                                <?= $pegawai['mata_pelajaran']; ?>
                            <?php endif; ?>
                        <?php elseif ($pegawai['role_id'] != 8) : ?>
                            <?= $pegawai['nama_unit']; ?>
                        <?php endif; ?>
                    </span>
                </div>
            </li>
            <hr>
            <li class="<?= current_url() == base_url('dashboard') ? "active" : '' ?>">
                <a href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-home"></i>
                    <span class="menu-title" data-i18n="">
                        Dashboard
                    </span>
                </a>
            </li>
            <hr>
            <?php if (
                $this->session->userdata('role_id') == 1 ||
                ($this->session->userdata('role_id') == 7 && $this->session->userdata('unit_kerja_id') == 33 && $this->session->userdata('status_pegawai_id') == 1) ||
                ($this->session->userdata('role_id') == 7 && $this->session->userdata('unit_jabatan1') == 33 && $this->session->userdata('jabatan1') == 16 && $this->session->userdata('status_pegawai_id') == 1) ||
                ($this->session->userdata('role_id') == 7 && $this->session->userdata('unit_jabatan2') == 33 && $this->session->userdata('jabatan2') == 16 && $this->session->userdata('status_pegawai_id') == 1) ||
                ($this->session->userdata('role_id') == 7 && $this->session->userdata('unit_jabatan3') == 33 && $this->session->userdata('jabatan3') == 16 && $this->session->userdata('status_pegawai_id') == 1) ||
                ($this->session->userdata('role_id') == 8 && $this->session->userdata('unit_jabatan1') == 33 && $this->session->userdata('jabatan1') == 16 && $this->session->userdata('status_pegawai_id') == 1) ||
                ($this->session->userdata('role_id') == 8 && $this->session->userdata('unit_jabatan2') == 33 && $this->session->userdata('jabatan2') == 16 && $this->session->userdata('status_pegawai_id') == 1) ||
                ($this->session->userdata('role_id') == 8 && $this->session->userdata('unit_jabatan3') == 33 && $this->session->userdata('jabatan3') == 16 && $this->session->userdata('status_pegawai_id') == 1)
            ) : ?>
                <li class=" nav-item">
                    <a href="#"><i class="fas fa-server"></i><span class="menu-title" data-i18n="">Data Master</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?= current_url() == base_url('unit') ? "active" : '' ?>"><a class="menu-item" href="<?= base_url('unit') ?>">Data Unit</a>
                        </li>
                        <li class="<?= current_url() == base_url('statuspegawai') ? "active" : '' ?>"><a class="menu-item" href="<?= base_url('statuspegawai') ?>">Data Status Pegawai</a>
                        </li>
                        <li class="<?= current_url() == base_url('jabatan') ? "active" : '' ?>"><a class="menu-item" href="<?= base_url('jabatan') ?>">Data Jabatan Pegawai</a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item">
                    <a href=""><i class="fas fa-user-tie"></i><span class="menu-title" data-i18n="">Data Pegawai</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?= current_url() == base_url('datapegawai') ? "active" : '' ?>"><a class="menu-item" href="<?= base_url('datapegawai') ?>">Daftar Pegawai</a>
                        </li>
                        <li><a class="menu-item" href="">Absensi Pegawai</a>
                        </li>
                        <li><a class="menu-item" href="">Rekap Data</a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item">
                    <a href=""><i class="fas fa-user-clock"></i><span class="menu-title" data-i18n="">Data Rekrutmen</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?= current_url() == base_url('menurekrutmen') ? "active" : '' ?>"><a class="menu-item" href="<?= base_url('menurekrutmen') ?>">Kebutuhan Rekrutmen</a>
                        </li>
                        <li class="<?= current_url() == base_url('menurekrutmen/tahap_rekrutmen') ? "active" : '' ?>"><a class="menu-item" href="<?= base_url('menurekrutmen/tahap_rekrutmen') ?>">Tahap Rekrutmen</a>
                        </li>
                        <li class="<?= current_url() == base_url('datapelamar/daftar_pelamar') ? "active" : '' ?>"><a class="menu-item" href="<?= base_url('datapelamar/daftar_pelamar') ?>">Daftar Pelamar</a>
                        </li>
                        <li class="<?= current_url() == base_url('menurekrutmen/nilai_rekrutmen') ? "active" : '' ?>"><a class="menu-item" href="<?= base_url('menurekrutmen/nilai_rekrutmen') ?>">Penilaian Rekrutmen</a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item">
                    <a href=""><i class="fas fa-edit"></i><span class="menu-title" data-i18n="">E-Action</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?= current_url() == base_url('eaction') ? "active" : '' ?>">
                            <a class="menu-item" href="<?= base_url('eaction') ?>">
                                Action Plan
                            </a>
                        </li>
                        <li class="<?= current_url() == base_url('eaction') ? "active" : '' ?>">
                            <a class="menu-item" href="<?= base_url('eaction') ?>">
                                Action Report
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item">
                    <a href=""><i class="fas fa-tasks"></i><span class="menu-title" data-i18n="">Raport</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?= current_url() == base_url('raport') ? "active" : '' ?>">
                            <a class="menu-item" href="<?= base_url('raport') ?>">
                                Raport Pegawai
                            </a>
                        </li>
                    </ul>
                </li>
                <hr>
            <?php endif; ?>
            <!-- Menu Keuangan -->
            <!-- ($this->session->userdata('role_id') == 7 && $this->session->userdata('unit_kerja_id') == 7) || -->
            <?php if (
                $this->session->userdata('role_id') == 1 ||
                ($this->session->userdata('jabatan1') == 16 && $this->session->userdata('unit_jabatan1') == 7 && $this->session->userdata('status_pegawai_id') == 1)
            ) : ?>
                <li class=" nav-item ">
                    <a href=""><i class="fas fa-money-check-alt"></i><span class="menu-title" data-i18n="">Menu Keuangan</span>
                    </a>
                    <ul class="menu-content">
                        <!-- <li class="<?= current_url() == base_url('gaji/periode') ? "active" : '' ?>">
                            <a class="menu-item" href="<?= base_url('gaji/periode') ?>">
                                Periode Gaji
                            </a>
                        </li> -->
                        <li class="<?= current_url() == base_url('gaji/katgaji') ? "active" : '' ?>">
                            <a class="menu-item" href="<?= base_url('gaji/katgaji') ?>">
                                Kategori Gaji
                            </a>
                        </li>
                        <li class="<?= current_url() == base_url('gaji') ? "active" : '' ?>">
                            <a class="menu-item" href="<?= base_url('gaji') ?>">
                                Gaji Pegawai
                            </a>
                        </li>
                    </ul>
                </li>
                <hr>
            <?php endif; ?>
            <li>
                <span class="menu-title ml-3">
                    Data Diri
                </span>
            </li>
            <?php if ($this->session->userdata('role_id') >= 7 || $this->session->userdata('role_id') == 1) : ?>
                <hr>
                <li class="<?= current_url() == base_url('datapegawai/data_diri') ? "active" : '' ?>">
                    <a href="<?= base_url('datapegawai/data_diri') ?>">
                        <i class="fas fa-user-check"></i>
                        <span class="menu-title" data-i18n="">
                            Data dan Profil
                        </span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a href=""><i class="fas fa-address-book"></i><span class="menu-title" data-i18n="">Data Lampiran</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?= current_url() == base_url('datapegawai/data_keluarga') ? "active" : '' ?>">
                            <a class="menu-item" href="<?= base_url('datapegawai/data_keluarga') ?>">
                                Data Keluarga
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-content">
                        <li class="<?= current_url() == base_url('datapegawai/data_pendidikan') ? "active" : '' ?>">
                            <a class="menu-item" href="<?= base_url('datapegawai/data_pendidikan') ?>">
                                Data Pendidikan
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-content">
                        <li class="<?= current_url() == base_url('datapegawai/data_karir') ? "active" : '' ?>">
                            <a class="menu-item" href="<?= base_url('datapegawai/data_karir') ?>">
                                Data Karir
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-content">
                        <li class="<?= current_url() == base_url('datapegawai/data_pelatihan') ? "active" : '' ?>">
                            <a class="menu-item" href="<?= base_url('datapegawai/data_pelatihan') ?>">
                                Data Pelatihan
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-content">
                        <li class="<?= current_url() == base_url('datapegawai/slip_gaji') ? "active" : '' ?>">
                            <a class="menu-item" href="<?= base_url('datapegawai/slip_gaji') ?>">
                                Slip Gaji
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-content">
                        <li class="<?= current_url() == base_url('datapegawai/unggah_file') ? "active" : '' ?>">
                            <a class="menu-item" href="<?= base_url('datapegawai/unggah_file') ?>">
                                Unggah File
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

        </ul>
    </div>
</div>