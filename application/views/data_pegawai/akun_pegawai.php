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
                            <li class="breadcrumb-item"><a href="<?= base_url('datapegawai'); ?>">Data Pegawai</a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?= base_url('datapegawai/tambah_pegawai'); ?>"><?= $title; ?></a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $this->session->flashdata('error'); ?></strong>
            </div>
        <?php endif; ?>

        <div class="content-body">
            <section id="horizontal">
                <!-- <div class="row justify-content-md-center"> -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-content collapse show">
                                <form action="<?= base_url('datapegawai/akun_pegawai') ?>" method="post">
                                    <div class="card-header bg-secondary">
                                        <div class="row justify-content-end">
                                            <label class="h4 col-md-9 text-white">Form <?= $title; ?> </label>
                                            <div class="col-md-3">
                                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Simpan Data" class="btn btn-success btn-sm btn-round"><i class="fas fa-save"></i></button>
                                                <a href="<?= base_url('datapegawai/data_diri') ?>" data-toggle="tooltip" data-placement="top" title="Data Diri Pegawai" class="btn btn-warning btn-sm btn-round"><i class="fas fa-arrow-circle-left"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body card-dashboard">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">Username</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="<?= $pegawai['username']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">Password</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="<?= $pegawai['pass_tampil']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">Password Baru</label>
                                                <div class="form-group">
                                                    <input type="password" class="form-control <?= (form_error('password_baru') != '') ? 'is-invalid' : ''; ?>" name="password_baru" id="password_baru">
                                                </div>
                                                <?= form_error('password_baru', '<div class="alert alert-danger alert-dismissible mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">Konfirmasi Password Baru</label>
                                                <div class="form-group">
                                                    <input type="password" class="form-control <?= (form_error('password_baru2') != '') ? 'is-invalid' : ''; ?>" name="password_baru2" id="password_baru2">
                                                </div>
                                                <?= form_error('password_baru2', '<div class="alert alert-danger alert-dismissible mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <label class="h4 text-white">Foto</label>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('datapegawai/uploadFile_foto'); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="profile-image text-center">
                                        <img src="<?= base_url('assets/file_foto/'); ?><?= $pegawai['foto']; ?>" class="rounded-circle img-border height-100" alt="Card image">
                                    </div>
                                    <div class="mb-2">
                                        <label for="formFile" class="form-label">Pilih Foto</label>
                                        <input class="form-control" type="file" id="foto_profile" name="foto_profile" accept="image/*">
                                    </div>
                                    <button type="submit" class="btn btn-info round btn-sm">Ubah Foto</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->