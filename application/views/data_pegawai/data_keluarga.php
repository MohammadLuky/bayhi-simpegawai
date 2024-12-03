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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <form action="<?= base_url('datapegawai/data_keluarga') ?>" method="post">
                                    <div class="card-header bg-secondary">
                                        <div class="row justify-content-end">
                                            <label class="h4 col-md-11 text-white">Form <?= $title; ?></label>
                                            <div class="col-md-1">
                                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Simpan Data" class="btn btn-info btn-sm btn-round"><i class="fas fa-save"></i></button>
                                                <!-- <a href="<?= base_url('datapegawai'); ?>" data-toggle="tooltip" data-placement="top" title="Data Pegawai" class="btn btn-warning btn-sm btn-round"><i class="fas fa-arrow-circle-left"></i></a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body card-dashboard">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">NIK Anggota Keluarga</label>
                                                <div class="form-group">
                                                    <input type="number" class="form-control <?= (form_error('nik_anggota_keluarga') != '') ? 'is-invalid' : ''; ?>" id="nik_anggota_keluarga" name="nik_anggota_keluarga" autocomplete="off" placeholder="Tulis Nama beserta gelar bila ada." value="<?= set_value('nik_anggota_keluarga') ?>">
                                                </div>
                                                <div class="invalid-feedback"><?= form_error('nik_anggota_keluarga'); ?></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">Nama Lengkap Anggota</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control <?= (form_error('nama_anggota_keluarga') != '') ? 'is-invalid' : ''; ?>" id="nama_anggota_keluarga" name="nama_anggota_keluarga" autocomplete="off" placeholder="Tulis Nama beserta gelar bila ada." value="<?= set_value('nama_anggota_keluarga') ?>">
                                                </div>
                                                <div class="invalid-feedback"><?= form_error('nama_anggota_keluarga'); ?></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput1">Tempat Lahir <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control <?= (form_error('tempat_lahir_anggota') != '') ? 'is-invalid' : ''; ?>" id="tempat_lahir_anggota" name="tempat_lahir_anggota" autocomplete="off" placeholder="Tempat Lahir.">
                                                </div>
                                                <div class="invalid-feedback"><?= form_error('tempat_lahir_anggota'); ?></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput3">Tanggal Lahir <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control <?= (form_error('tanggal_lahir_anggota') != '') ? 'is-invalid' : ''; ?>" id="tanggal_lahir_anggota" name="tanggal_lahir_anggota">
                                                </div>
                                                <div class="invalid-feedback"><?= form_error('tanggal_lahir_anggota'); ?></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">Jenis Kelamin <span class="text-danger">*</span></label>
                                                <div class="row skin skin-square">
                                                    <?php foreach ($jenis_kelamin as $index => $jk) : ?>
                                                        <div class="col-md-6 col-sm-12">
                                                            <fieldset>
                                                                <?php
                                                                $radio_id = 'jenis_kelamin_anggota_' . $index;
                                                                ?>
                                                                <input type="radio" name="jenis_kelamin_anggota" id="<?= $radio_id; ?>" value="<?= $jk; ?>">
                                                                <label for="<?= $radio_id; ?>"><?= $jk; ?></label>
                                                            </fieldset>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <!-- Penempatan form_error di luar loop -->
                                                <?= form_error('jenis_kelamin_anggota', '<div class="alert alert-danger alert-dismissible mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">
                                                    Pilih Status Hubungan
                                                </label>
                                                <div class="form-group">
                                                    <select class="select2 form-control <?= (form_error('hubungan_pegawai_id') != '') ? 'is-invalid' : ''; ?>" id="hubungan_pegawai_id" name="hubungan_pegawai_id">
                                                        <option value="">Pilih Status Hubungan</option>
                                                        <?php foreach ($status_hubungan as $sh) : ?>
                                                            <option value="<?= $sh['id_hubungan_keluarga']; ?>"><?= $sh['ket_hubungan_keluarga']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback"><?= form_error('hubungan_pegawai_id'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="horizontal">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h4 class="card-title text-white"><?= $title; ?></h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered zero-configuration">
                                            <thead class="text-white text-center" style="background-color: green;">
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIK</th>
                                                    <th>Nama Anggota Keluarga</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Status Hubungan</th>
                                                    <th>Tempat Tanggal Lahir</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($anggota_keluarga as $keluarga) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++; ?></td>
                                                        <td><?= $keluarga['nik_anggota_keluarga']; ?></td>
                                                        <td><?= $keluarga['nama_anggota_keluarga']; ?></td>
                                                        <td><?= $keluarga['jenis_kelamin_anggota']; ?></td>
                                                        <td><?= $keluarga['ket_hubungan_keluarga']; ?></td>
                                                        <td><?= $keluarga['tempat_lahir_anggota']; ?>, <?= tanggal_indonesia_format2($keluarga['tanggal_lahir_anggota']); ?></td>
                                                        <td class="text-center">
                                                            <a href="#" class="badge badge-danger text-white hapus-angkel" data-toggle="tooltip" data-placement="top" title="Hapus anggota Keluarga" data-id="<?= $keluarga['id_anggota_keluarga']; ?>"><i class="fas fa-times-circle"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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