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
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?= current_url(); ?>"><?= $title; ?></a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?= validation_errors(); ?></strong>
            </div>
        <?php endif; ?>

        <div class="content-body">
            <section id="horizontal">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-warning bg-darken-4">
                                <h4 class="card-title text-white">Form <?= $title; ?></h4>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a href="<?= base_url('gaji'); ?>" type="submit" data-toggle-tooltip="tooltip" data-placement="top" title="Kembali" class="btn btn-teal btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <form action="<?= base_url('gaji/settingGajiSetahun'); ?>" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput1">Pilih Pegawai <span class="text-danger">*</span></label>
                                                    <select class="select2 form-control <?= (form_error('pegawai_gaji') != '') ? 'is-invalid' : ''; ?>" id="pegawai_gaji" name="pegawai_gaji[]" multiple="multiple">
                                                        <?php foreach ($AllPegawai as $pegawai) : ?>
                                                            <option value="<?= $pegawai['id_pegawai']; ?>"><?= $pegawai['nama_lengkap']; ?> | Unit <?= $pegawai['nama_unit']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback"><?= form_error('pegawai_gaji'); ?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput1">Pilih Penerimaan <span class="text-danger">*</span></label>
                                                    <select class="select2 form-control <?= (form_error('rincian_penerimaan') != '') ? 'is-invalid' : ''; ?>" id="rincian_penerimaan" name="rincian_penerimaan[]" multiple="multiple">
                                                        <?php foreach ($RincianPenerimaan as $penerimaan) : ?>
                                                            <option value="<?= $penerimaan['id_rincian_gaji']; ?>"><?= $penerimaan['rincian_gaji']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback"><?= form_error('rincian_penerimaan'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput1">Nominal <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control <?= (form_error('angka_nominal_rincian') != '') ? 'is-invalid' : ''; ?>" id="angka_nominal_rincian" name="angka_nominal_rincian" autocomplete="off">
                                                    <div class="invalid-feedback"><?= form_error('angka_nominal_rincian'); ?></div>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput1">Bulan <span class="text-danger">*</span></label>
                                                    <select class="select2 form-control <?= (form_error('bulan_aktif') != '') ? 'is-invalid' : ''; ?>" id="bulan_aktif" name="bulan_aktif[]" multiple="multiple">
                                                        <?php foreach ($BulanTahunAktif as $bulan) : ?>
                                                            <option value="<?= $bulan['id_periode_gaji']; ?>"><?= $bulan['nama_bulan']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback"><?= form_error('bulan_aktif'); ?></div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1" id="ceklist_setahun" name="ceklist_setahun">
                                                        <label class="form-check-label text-danger">
                                                            Klik Centang Untuk Satu Tahun.
                                                        </label>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-cyan bg-darken-4">
                                <h4 class="card-title text-white">Tabel <?= $title; ?></h4>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <button type="submit" data-toggle-tooltip="tooltip" data-placement="top" title="Reload Data" class="btn btn-warning btn-sm btn-round" id="reload_halaman"><i class="fas fa-sync"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered zero-configuration">
                                            <thead class="text-white text-center" style="background-color: green;">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pegawai</th>
                                                    <th>Rincian Gaji</th>
                                                    <th>Bulan</th>
                                                    <th>Jumlah Rincian</th>
                                                    <th>Nominal Rincian</th>
                                                    <th>Total Rincian</th>
                                                    <!-- <th style="width: 20%;">Aksi</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($GajiPegawaiSetahun as $datasetting) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++; ?></td>
                                                        <td class="text-center"><?= $datasetting['nama_lengkap']; ?></td>
                                                        <td class="text-center"><?= $datasetting['rincian_gaji']; ?></td>
                                                        <td class="text-center"><?= $datasetting['nama_bulan']; ?> - <?= $datasetting['tahun']; ?></td>
                                                        <td class="text-center">
                                                            <input type="number"
                                                                class="form-control jumlah-rincian"
                                                                value="<?= $datasetting['jumlah_rincian_gaji']; ?>"
                                                                data-id="<?= $datasetting['id_gaji']; ?>"
                                                                autocomplete="off"
                                                                name="jumlah_rincian_gaji" />
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text"
                                                                class="form-control nominal-rincian"
                                                                value="<?= number_format($datasetting['nominal_rincian_gaji'], 0, ',', '.'); ?>"
                                                                data-id="<?= $datasetting['id_gaji']; ?>"
                                                                autocomplete="off"
                                                                name="nominal_rincian_gaji" />
                                                        </td>
                                                        <td class="text-center">Rp. <?= number_format($datasetting['total_rincian_gaji'], 0, ',', '.'); ?></td>
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