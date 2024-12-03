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
                            <li class="breadcrumb-item"><a href="<?= base_url('datapegawai/jabatan_pegawai'); ?>"><?= $title; ?></a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <section id="horizontal">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <form action="<?= base_url('datapegawai/jabatan_pegawai/' . $individu['id_pegawai']) ?>" method="post">
                                    <div class="card-header bg-secondary">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <a href="<?= base_url('datapegawai'); ?>" data-toggle="tooltip" data-placement="top" title="Data Pegawai" class="btn btn-warning btn-sm btn-round"><i class="fas fa-arrow-circle-left"></i></a>
                                            </div>
                                            <div class="col-md-9">
                                                <label class="h4 text-white">Form <?= $title; ?></label>
                                            </div>
                                            <div class="col-md-2">
                                                <?php if (empty($individu['jabatan_1']) || empty($individu['jabatan_2']) || empty($individu['jabatan_3'])): ?>
                                                    <button type="submit" data-toggle="tooltip" data-placement="top" title="Simpan Data" class="btn btn-info btn-sm btn-round"><i class="fas fa-save"></i></button>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-body card-dashboard">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="table-responsive mb-1">
                                                    <table class="table table-bordered table-striped">
                                                        <thead class="bg-primary text-white">
                                                            <tr>
                                                                <th colspan="3">Data Pegawai</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Nama </strong></td>
                                                                <td><?= $individu['nama_lengkap']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Status Pegawai </strong></td>
                                                                <td><?= $individu['ket_status_pegawai']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Unit Kerja Saat Ini </strong></td>
                                                                <td><?= $individu['nama_unit']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <?php foreach ($jabatanAktif as $jA): ?>
                                                    <div class="table-responsive mb-1">
                                                        <table class="table table-bordered table-striped">
                                                            <thead class="bg-teal text-white">
                                                                <tr>
                                                                    <th>Jabatan/Tugas Tambahan <?= $jA['urutan_jabatan']; ?> Pegawai</th>
                                                                    <th class="text-right"><a href="#" data-toggle="tooltip" data-placement="top" title="Hapus Jabatan" class="btn btn-danger btn-sm btn-round hapus-jabatan" data-id="<?= $individu['id_pegawai']; ?>" data-nama="<?= $individu['nama_lengkap']; ?>" data-urutanjabatan="<?= $jA['urutan_jabatan']; ?>" data-idhiskar="<?= $jA['id_history_karir']; ?>"><i class="fas fa-trash"></i></a></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><strong>Jabatan/Tugas Tambahan </strong></td>
                                                                    <td><?= $jA['nama_jabatan']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Nama Unit </strong></td>
                                                                    <td><?= $jA['nama_unit']; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <?php if (empty($individu['jabatan_2']) || empty($individu['jabatan_1']) || empty($individu['jabatan_3'])): ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="timesheetinput1">
                                                        Pilih Jabatan
                                                    </label>
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('jabatan_karir_id') != '') ? 'is-invalid' : ''; ?>" id="jabatan_karir_id" name="jabatan_karir_id">
                                                            <option value="">Pilih Jabatan</option>
                                                            <?php foreach ($jabatanAll as $jabatan) : ?>
                                                                <option value="<?= $jabatan['id_jabatan']; ?>"><?= $jabatan['nama_jabatan']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('jabatan_karir_id'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="timesheetinput1">
                                                        Pilih Unit
                                                    </label>
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('unit_karir_id') != '') ? 'is-invalid' : ''; ?>" id="unit_karir_id" name="unit_karir_id">
                                                            <option value="">Pilih Unit</option>
                                                            <?php foreach ($unitAll as $unit) : ?>
                                                                <option value="<?= $unit['id_unit']; ?>"><?= $unit['nama_unit']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('unit_karir_id'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="timesheetinput1">
                                                        Pilih Tahun Periode
                                                    </label>
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('tahun_pengabdian_awal') != '') ? 'is-invalid' : ''; ?>" id="tahun_pengabdian_awal" name="tahun_pengabdian_awal">
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('tahun_pengabdian_awal'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="timesheetinput1">
                                                        Validasi Jabatan
                                                    </label>
                                                    <p>Pilihlah jika pegawai tersebut mempunyai jabatan lebih.</p>
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('validasi_jabatan') != '') ? 'is-invalid' : ''; ?>" id="validasi_jabatan" name="validasi_jabatan">
                                                            <option value="">Pilih Validasi</option>
                                                            <?php if ($individu['jabatan_1'] == 0 && $individu['jabatan_2'] == 0 && $individu['jabatan_3'] == 0): ?>
                                                                <option value="1">Jabatan Pertama</option>
                                                                <option value="2">Jabatan Kedua</option>
                                                                <option value="3">Jabatan Ketiga</option>
                                                            <?php elseif ($individu['jabatan_3']): ?>
                                                                <option value="1">Jabatan Pertama</option>
                                                                <option value="2">Jabatan Kedua</option>
                                                                <option value="3" disabled>Jabatan Ketiga</option>
                                                            <?php elseif ($individu['jabatan_2']): ?>
                                                                <option value="1">Jabatan Pertama</option>
                                                                <option value="2" disabled>Jabatan Kedua</option>
                                                                <option value="3">Jabatan Ketiga</option>
                                                            <?php elseif ($individu['jabatan_3'] && $individu['jabatan_2']): ?>
                                                                <option value="1">Jabatan Pertama</option>
                                                                <option value="2" disabled>Jabatan Kedua</option>
                                                                <option value="3" disabled>Jabatan Ketiga</option>
                                                            <?php elseif ($individu['jabatan_2'] && $individu['jabatan_1']): ?>
                                                                <option value="1" disabled>Jabatan Pertama</option>
                                                                <option value="2" disabled>Jabatan Kedua</option>
                                                                <option value="3">Jabatan Ketiga</option>
                                                            <?php elseif ($individu['jabatan_1']): ?>
                                                                <option value="1" disabled>Jabatan Pertama</option>
                                                                <option value="2">Jabatan Kedua</option>
                                                                <option value="3">Jabatan Ketiga</option>
                                                            <?php endif; ?>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('validasi_jabatan'); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Modal Hapus Jabatan -->
            <div class="modal fade text-left" id="hapusJabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?= base_url('datapegawai/hapus_jabatan'); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header bg-info white">
                                <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-info-circle"></i> Validasi Hapus Jabatan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_pegawai_jabatan" id="id_pegawai_jabatan">
                                <input type="hidden" name="tahun_pengabdian_akhir" id="tahun_pengabdian_akhir" value="<?= date('Y'); ?>">
                                <input type="hidden" name="urutanjabatan" id="urutanjabatan">
                                <input type="hidden" name="idhiskar" id="idhiskar">
                                <div class="alert alert-danger mb-2" role="alert">
                                    <p>Apakah anda akan menghapus jabatan dari <strong id="nama_pegawai_jabatan"></strong> pada tahun <strong><?= date('Y'); ?></strong>?</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-info">Ya, Hapus.</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END: Content-->