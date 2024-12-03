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

        <div class="content-body">
            <section id="horizontal">
                <div class="row justify-content-md-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-header bg-secondary">
                                    <div class="row justify-content-end">
                                        <label class="h4 col-md-10 text-white">Form <?= $title; ?> </label>
                                        <div class="col-md-2">
                                            <!-- <button type="submit" data-toggle="tooltip" data-placement="top" title="Simpan Data" class="btn btn-success btn-sm btn-round"><i class="fas fa-save"></i></button> -->
                                            <a href="<?= base_url('datapegawai/data_diri') ?>" data-toggle="tooltip" data-placement="top" title="Data Diri Pegawai" class="btn btn-warning btn-sm btn-round"><i class="fas fa-arrow-circle-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-success mb-2" role="alert">
                                                <strong class="h4 text-white"><i class="fas fa-info-circle"></i> Informasi!<br></strong>
                                                <p>Data unit kerja berfungsi menginformasikan unit kerja anda saat ini. Apabila ada kesalahan data mohon konfirmasi ke Unit HCD.</p>
                                                Terimakasih.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="timesheetinput1">Jabatan Pegawai</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?= $pegawai['ket_role']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="timesheetinput1">Status Pegawai</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?= $pegawai['ket_status_pegawai']; ?>" readonly>
                                            </div>
                                        </div>
                                        <?php if ($pegawai['role_id'] != 8) : ?>
                                            <div class="col-md-12">
                                                <label for="timesheetinput1">Unit</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="<?= $pegawai['nama_unit']; ?>" readonly>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">Unit</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="<?= $pegawai['nama_unit']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">Mata Pelajaran</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="<?= $pegawai['mata_pelajaran']; ?>" readonly>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->