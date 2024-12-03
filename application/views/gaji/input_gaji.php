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
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header bg-warning bg-darken-4">
                                <h4 class="card-title text-white">Form <?= $title; ?></h4>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a href="<?= base_url('gaji/pegawai_perperiode_gaji/' . $idPeriodeGaji); ?>" type="submit" data-toggle-tooltip="tooltip" data-placement="top" title="Kembali" class="btn btn-teal btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <form action="<?= base_url('gaji/InputGajiPegawai/' . $idPeriodeGaji . '/' . $id_pegawaiGaji); ?>" method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="timesheetinput1">Pilih Penerimaan <span class="text-danger">*</span></label>
                                                    <select class="select2 form-control <?= (form_error('penerimaan_pegawai') != '') ? 'is-invalid' : ''; ?>" id="penerimaan_pegawai" name="penerimaan_pegawai[]" multiple="multiple">
                                                        <?php foreach ($RincianPenerimaan as $penerimaan) : ?>
                                                            <option value="<?= $penerimaan['id_rincian_gaji']; ?>"><?= $penerimaan['rincian_gaji']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback"><?= form_error('penerimaan_pegawai'); ?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="timesheetinput1">Pilih Potongan <span class="text-danger">*</span></label>
                                                    <select class="select2 form-control <?= (form_error('potongan_pegawai') != '') ? 'is-invalid' : ''; ?>" id="potongan_pegawai" name="potongan_pegawai[]" multiple="multiple">
                                                        <?php foreach ($RincianPotongan as $potongan) : ?>
                                                            <option value="<?= $potongan['id_rincian_gaji']; ?>"><?= $potongan['rincian_gaji']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback"><?= form_error('potongan_pegawai'); ?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="timesheetinput1">Jabatan Pegawai</label>
                                                    <select class="select2 form-control" id="jabatan_gaji" name="jabatan_gaji[]" multiple="multiple">
                                                        <?php foreach ($JabatanPegawai as $jabatan) : ?>
                                                            <option value="<?= $jabatan['id_history_karir']; ?>"><?= $jabatan['nama_jabatan']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header bg-purple bg-lighten-2">
                                <h4 class="card-title text-white">Tabel Total Gaji</h4>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a href="<?= base_url('gaji/slip_gaji/' . $idPeriodeGaji . '/' . $id_pegawaiGaji); ?>" target="_blank" data-toggle-tooltip="tooltip" data-placement="top" title="Cetak Slip Gaji" class="btn btn-warning btn-sm btn-round"><i class="fas fa-print"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <tr class="text-white text-center" style="background-color: green;">
                                                <th>Keterangan</th>
                                                <th>Nominal</th>
                                            </tr>
                                            <tr class="bg-info white">
                                                <td>Total Penerimaan</td>
                                                <td>: Rp. <?= number_format($TotalAllPenerimaanGaji, 0, ',', '.'); ?></td>
                                            </tr>
                                            <tr class="bg-danger white">
                                                <td>Total Potongan</td>
                                                <td>: Rp. <?= number_format($TotalAllPotongan, 0, ',', '.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Total Yang Diterima</td>
                                                <td>: <strong>Rp. <?= number_format($Totalditerima, 0, ',', '.'); ?></strong> </td>
                                            </tr>
                                        </table>
                                    </div>
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
                                                    <th>Rincian Gaji</th>
                                                    <th>Jabatan Pegawai</th>
                                                    <th>Jumlah Rincian</th>
                                                    <th>Nominal Rincian</th>
                                                    <th>Total Rincian</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($GajiperPegawai as $datagaji) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++; ?></td>
                                                        <td class="text-center">
                                                            <?php if ($datagaji['kategori_rincian_gaji_id'] == 0): ?>
                                                                -
                                                            <?php else: ?>
                                                                <?= $datagaji['rincian_gaji']; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php if ($datagaji['jabatan_gaji_id'] == 0): ?>
                                                                -
                                                            <?php else: ?>
                                                                <?= $datagaji['nama_jabatan']; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <?php if ($datagaji['kategori_rincian_gaji_id'] != 1): ?>
                                                            <td class="text-center">
                                                                <input type="number"
                                                                    class="form-control jumlah-rincian-gaji"
                                                                    value="<?= $datagaji['jumlah_rincian_gaji']; ?>"
                                                                    data-id="<?= $datagaji['id_gaji']; ?>"
                                                                    autocomplete="off"
                                                                    name="jumlah_rincian_gaji" />
                                                            </td>
                                                            <td class="text-center">
                                                                <input type="text"
                                                                    class="form-control nominal-rincian-gaji"
                                                                    value="<?= number_format($datagaji['nominal_rincian_gaji'], 0, ',', '.'); ?>"
                                                                    data-id="<?= $datagaji['id_gaji']; ?>"
                                                                    autocomplete="off"
                                                                    name="nominal_rincian_gaji" />
                                                            </td>
                                                        <?php else: ?>
                                                            <td class="text-center"><?= $datagaji['jumlah_rincian_gaji']; ?></td>
                                                            <td class="text-center"><?= $datagaji['nominal_rincian_gaji']; ?></td>
                                                        <?php endif; ?>
                                                        <td class="text-center">Rp. <?= number_format($datagaji['total_rincian_gaji'], 0, ',', '.'); ?></td>
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