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
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <form action="<?= base_url('datapegawai/tambah_pegawai') ?>" method="post">
                                        <div class="row justify-content-end mb-3">
                                            <div class="col-md-2">
                                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Simpan Data" class="btn btn-info btn-sm btn-round"><i class="fas fa-save"></i></button>
                                                <a href="<?= base_url('datapegawai'); ?>" data-toggle="tooltip" data-placement="top" title="Data Pegawai" class="btn btn-warning btn-sm btn-round"><i class="fas fa-arrow-circle-left"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 mb-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="timesheetinput1">Nama Lengkap Pegawai</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control <?= (form_error('nama_lengkap') != '') ? 'is-invalid' : ''; ?>" id="nama_lengkap" name="nama_lengkap" autocomplete="off" placeholder="Tulis Nama beserta gelar bila ada." value="<?= set_value('nama_lengkap') ?>">
                                                    </div>
                                                    <div class="invalid-feedback"><?= form_error('nama_lengkap'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 mb-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="timesheetinput1">NIY Pegawai</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control <?= (form_error('niy_pegawai') != '') ? 'is-invalid' : ''; ?>" id="niy_pegawai" name="niy_pegawai" autocomplete="off" placeholder="NIY Pegawai." value="<?= set_value('niy_pegawai') ?>">
                                                    </div>
                                                    <div class="invalid-feedback"><?= form_error('niy_pegawai'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 mb-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="timesheetinput1">
                                                        Pilih Jabatan
                                                    </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('role_pegawai') != '') ? 'is-invalid' : ''; ?>" id="role_pegawai" name="role_pegawai">
                                                            <option value="">Pilih Status</option>
                                                            <?php foreach ($roles as $role) : ?>
                                                                <?php if ($role['id_role'] >= 5) : ?>
                                                                    <option value="<?= $role['id_role']; ?>"><?= $role['ket_role']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('role_pegawai'); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 mb-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="timesheetinput1">
                                                        Pilih Unit
                                                    </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('unit_pegawai') != '') ? 'is-invalid' : ''; ?>" id="unit_pegawai" name="unit_pegawai">
                                                            <?php foreach ($units as $unit) : ?>
                                                                <?php if ($unit['id_unit'] == 1) : ?>
                                                                    <option value="<?= $unit['id_unit']; ?>" selected><?= $unit['nama_unit']; ?></option>
                                                                <?php else : ?>
                                                                    <option value="<?= $unit['id_unit']; ?>"><?= $unit['nama_unit']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('unit_pegawai'); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 mb-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="timesheetinput1">
                                                        Pilih Mata Pelajaran
                                                    </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('mapel_guru') != '') ? 'is-invalid' : ''; ?>" id="mapel_guru" name="mapel_guru">
                                                            <option value="">Pilih Mata Pelajaran</option>
                                                            <?php foreach ($mapels as $mapel) : ?>
                                                                <option value="<?= $mapel['id_mapel_guru']; ?>"><?= $mapel['mata_pelajaran']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('mapel_guru'); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 mb-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="timesheetinput1">
                                                        Pilih Status Pegawai
                                                    </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('status_pegawai') != '') ? 'is-invalid' : ''; ?>" id="status_pegawai" name="status_pegawai">
                                                            <option value="">Pilih Status Pegawai</option>
                                                            <?php foreach ($status as $st) : ?>
                                                                <?php if ($st['id_status_pegawai'] != 4) : ?>
                                                                    <option value="<?= $st['id_status_pegawai']; ?>"><?= $st['ket_status_pegawai']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('status_pegawai'); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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