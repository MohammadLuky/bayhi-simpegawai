<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title"><?= $title; ?></h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a>
                            </li>
                            <!-- <li class="breadcrumb-item"><a href="#">Color System</a>
                            </li>
                            <li class="breadcrumb-item active">Teal Palette
                            </li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left align-self-bottom mt-3">
                                        <span class="d-block mb-1 font-medium-1">Data Unit</span>
                                        <h3 class="teal mb-2"><?= $jumlah_unit; ?> Unit</h3>
                                        <a class="btn btn-info btn-sm h6" href="<?= base_url('unit'); ?>">Detail >>>></a>
                                    </div>
                                    <div class="align-self-top">
                                        <i class="icon-tag icon-opacity teal font-large-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card bg-gradient-x-purple-red">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-top">
                                        <i class="icon-wallet icon-opacity text-white font-large-4 float-left"></i>
                                    </div>
                                    <div class="media-body text-white text-right align-self-bottom mt-3">
                                        <span class="d-block mb-1 font-medium-1">Data Pegawai</span>
                                        <h3 class="text-white mb-2"><?= $jumlah_pegawai; ?> Pegawai</h3>
                                        <a class="btn btn-dark btn-sm h6" href="<?= base_url('datapegawai') ?>">Detail >>>></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left align-self-bottom mt-3">
                                        <span class="d-block mb-1 font-medium-1">Data Pelamar</span>
                                        <h3 class="red mb-2"><?= $jumlah_pelamar; ?> Pelamar</h3>
                                        <a class="btn btn-red btn-sm h6" href="<?= base_url('datapelamar/daftar_pelamar') ?>">Detail >>>></a>
                                    </div>
                                    <div class="align-self-top">
                                        <i class="icon-tag icon-opacity red font-large-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card bg-gradient-x-orange-yellow">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-top">
                                        <i class="icon-wallet icon-opacity text-white font-large-4 float-left"></i>
                                    </div>
                                    <div class="media-body text-white text-right align-self-bottom mt-3">
                                        <span class="d-block mb-1 font-medium-1">Data Renstra</span>
                                        <h3 class="text-white mb-2">0</h3>
                                        <span>Dalam Perbaikan</span>
                                        <a class="btn btn-dark btn-sm h6" href="<?= base_url('') ?>">Detail >>>></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-7 col-lg-12">
                    <!-- <div class="col-sm-12 col-xl-12"> -->
                    <div class="alert alert-success mb-2" role="alert">
                        <strong class="h4 text-white">Selamat Datang! <?= strtoupper($pegawai['nama_lengkap']); ?>.</strong><br>
                        Di aplikasi e-Pegawai Yayasan Pondok Pesantren Bayt Al-Hikmah Pasuruan.
                        Segera cek kelengkapan data anda. Terimakasih.
                    </div>
                    <!-- </div> -->
                    <div class="card">
                        <div class="card-content">
                            <div class="col-sm-12 col-xl-12">
                                <h3 class="align-left p-1">Profil Anda</h3>
                                <div class="media d-flex m-1 ">
                                    <div class="align-left p-1">
                                        <a href="#" class="profile-image">
                                            <img src="<?= base_url('assets/file_foto/'); ?><?= $pegawai['foto']; ?>" class="rounded-circle img-border height-100" alt="Card image">
                                        </a>
                                    </div>
                                    <div class="media-body text-left  mt-1">
                                        <h3 class="font-large-1 dark"><?= strtoupper($pegawai['nama_lengkap']); ?>
                                        </h3>
                                        <?php if ($pegawai['role_id'] != 8) : ?>
                                            <span class="font-medium-1 dark mb-2">(<?= strtoupper($pegawai['ket_role']); ?> - <?= strtoupper($pegawai['nama_unit']); ?>)</span><br>
                                        <?php elseif ($pegawai['role_id'] == 8) : ?>
                                            <span class="font-medium-1 dark mb-2">(<?= strtoupper($pegawai['ket_role']); ?> - <?= strtoupper($pegawai['mata_pelajaran']); ?>)</span><br>
                                        <?php endif; ?>
                                        <p class="dark mt-1">
                                            <i class="fas fa-map-marker-alt"></i> <?= strtoupper($pegawai['alamat']); ?> KELURAHAN <?= strtoupper($pegawai['nama_kelurahan_pegawai']); ?> KECAMATAN <?= strtoupper($pegawai['nama_kecamatan_pegawai']); ?> <?= strtoupper($pegawai['nama_kotakab_pegawai']); ?>
                                        </p>
                                        Status Anda : <span class="bagde badge-pill badge-warning text-white">Pegawai <?= $pegawai['ket_status_pegawai']; ?></span>
                                    </div>
                                </div>
                                <a href="<?= base_url('datapegawai/data_diri'); ?>" class="btn btn-info btn-round mb-2 ">Detail Data</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">PP. Bayt Al-hikmah</h4>
                                <h6 class="card-subtitle text-muted">Yayasan Pondok Pesantren yang berdiri pada tahun 2010 yang berbasis pondok salaf dan modern.</h6>
                            </div>
                            <div id="carousel-area" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-area" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-area" data-slide-to="1"></li>
                                    <li data-target="#carousel-area" data-slide-to="2"></li>
                                    <li data-target="#carousel-area" data-slide-to="3"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img src="<?= base_url('assets/manage'); ?>/img/bayhi.jpg" class="d-block w-100" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?= base_url('assets/manage'); ?>/img/bayhi-1.jpg" class="d-block w-100" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?= base_url('assets/manage'); ?>/img/bayhi-2.jpg" class="d-block w-100" alt="Third slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?= base_url('assets/manage'); ?>/img/bayhi-3.jpg" class="d-block w-100" alt="Forth slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-area" role="button" data-slide="prev">
                                    <span class="la la-angle-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-area" role="button" data-slide="next">
                                    <span class="la la-angle-right icon-next" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics -->
        </div>
    </div>
</div>
<!-- END: Content-->