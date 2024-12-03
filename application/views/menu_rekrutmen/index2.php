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
                            <li class="breadcrumb-item"><a href="<?= base_url('menurekrutmen'); ?>"><?= $title; ?></a>
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
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Input <?= $title; ?></h4>
                        </div>
                        <div class="card-block">
                            <form action="<?= base_url('menurekrutmen') ?>" method="POST">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <p class="text-bold-600 font-medium-2">
                                                    Pilih Posisi
                                                </p>
                                                <select class="select2 form-control" id="kebutuhan_role_id" name="kebutuhan_role_id">
                                                    <option value="">Pilih Posisi</option>
                                                    <?php foreach ($posisi as $p) : ?>
                                                        <?php if ($p['id_role'] == 7 || $p['id_role'] == 8) : ?>
                                                            <option value="<?= $p['id_role']; ?>"><?= $p['ket_role']; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <p class="text-bold-600 font-medium-2">
                                                    Pilih Tahun Rekrutmen
                                                </p>
                                                <select class="select2 form-control" id="tahun_rekrutmen" name="tahun_rekrutmen">
                                                    <option value="">Pilih Tahun Rekrutmen</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <p class="text-bold-600 font-medium-2">
                                                    Kuota Kebutuhan Rekrutmen
                                                </p>
                                                <input type="number" class="form-control" id="kebutuhan_kuota" name="kebutuhan_kuota" placeholder="Isikan Angka Kuota Rekrutmen" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <p class="text-bold-600 font-medium-2">
                                                    Keterangan/Alasan Kebutuhan Rekrutmen
                                                </p>
                                                <textarea type="text" class="form-control" id="kebutuhan_ket" name="kebutuhan_ket" placeholder="Jelaskan Alasan Kebutuhan Rekrutmen" autocomplete="off"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12" id="unit_rekrutmen">
                                            <div class="form-group">
                                                <p class="text-bold-600 font-medium-2">
                                                    Pilih Unit
                                                </p>
                                                <select class="select2 form-control" id="kebutuhan_unit_id" name="kebutuhan_unit_id">
                                                    <option value="">Pilih Unit</option>
                                                    <?php foreach ($unit as $u) : ?>
                                                        <?php if ($u['id_unit'] != 1) : ?>
                                                            <option value="<?= $u['id_unit']; ?>"><?= $u['nama_unit']; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12" id="mapel_rekrutmen">
                                            <div class="form-group">
                                                <p class="text-bold-600 font-medium-2">
                                                    Pilih Mata Pelajaran
                                                </p>
                                                <select class="select2 form-control" id="kebutuhan_mapel_id" name="kebutuhan_mapel_id">
                                                    <option value="">Pilih Mata Pelajaran</option>
                                                    <?php foreach ($mapel as $m) : ?>
                                                        <option value="<?= $m['id_mapel_guru']; ?>"><?= $m['mata_pelajaran']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-info" type="submit">Simpan Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section id="horizontal">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card bg-gradient-directional-warning">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left align-self-bottom mt-3">
                                            <span class="d-block text-white mb-1 font-medium-5">Total Kebutuhan Rekrutmen</span>
                                            <h1 class="text-white mb-0"><?= $jumlah_kebrek; ?> Rekrutmen</h1>
                                        </div>
                                        <div class="align-self-top">
                                            <i class="fas fa-briefcase icon-opacity text-white font-large-4 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= $title; ?></h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered zero-configuration">
                                            <thead class="text-white text-center" style="background-color: green;">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tahun</th>
                                                    <th>Posisi</th>
                                                    <th>Kuota</th>
                                                    <th>Keterangan</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php $no = 1;
                                                foreach ($kebutuhan_rekrutmen as $kr) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $kr['tahun_rekrutmen']; ?></td>
                                                        <td>
                                                            <?= $kr['ket_role']; ?> -
                                                            <?php if ($kr['id_unit']) : ?>
                                                                <?= $kr['nama_unit']; ?>
                                                            <?php elseif ($kr['id_mapel_guru']) : ?>
                                                                <?= $kr['mata_pelajaran']; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?= $kr['kebutuhan_kuota']; ?></td>
                                                        <td><?= $kr['kebutuhan_ket']; ?></td>
                                                        <?php if ($kr['keb_rek_aktif'] == 0): ?>
                                                            <td><span class="badge badge-danger">Belum Aktif</span></td>
                                                        <?php else: ?>
                                                            <td><span class="badge badge-success">Aktif</span></td>
                                                        <?php endif; ?>
                                                        <td>
                                                            <button class="btn btn-icon btn-danger btn-sm hapus-kebrek" data-toggle="tooltip" data-placement="top" title="Hapus Data" data-id="<?= $kr['id_kebutuhan_rekrutmen']; ?>"><i class="fas fa-trash"></i>
                                                            </button>
                                                            <?php if ($kr['keb_rek_aktif'] == 0): ?>
                                                                <button type="button" class="btn btn-icon btn-success btn-sm aktivasi-kebrek" data-toggle="tooltip" data-placement="top" data-id="<?= $kr['id_kebutuhan_rekrutmen']; ?>" data-posisi="<?= $kr['ket_role']; ?>" data-kuota="<?= $kr['kebutuhan_kuota']; ?>" data-namaunitkebrek="<?= $kr['nama_unit']; ?>" title="Aktivasi"><i class="fas fa-check-circle"></i></button>
                                                            <?php else: ?>
                                                                <button type="button" class="btn btn-icon btn-warning btn-sm nonaktivasi-kebrek" data-toggle="tooltip" data-placement="top" data-id="<?= $kr['id_kebutuhan_rekrutmen']; ?>" data-posisi2="<?= $kr['ket_role']; ?>" data-kuota2="<?= $kr['kebutuhan_kuota']; ?>" data-namaunitkebrek2="<?= $kr['nama_unit']; ?>" title="Non-Aktivasi"><i class="fas fa-times-circle"></i></button>
                                                            <?php endif; ?>
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

<!-- AKTIVASI -->
<div class="modal fade text-left" id="aktivasiKebRek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('menurekrutmen/kebrek_aktif') ?>" method="post">
            <div class="modal-content">
                <div class="modal-header bg-danger white">
                    <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-exclamation-triangle"></i> Mengaktifkan Kebutuhan Rekrutmen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success mb-2" role="alert">
                        <strong class="h4 text-white">Peringatan.</strong><br>
                        <input type="hidden" name="id_kebrek_aktif" id="id_kebrek_aktif">
                        Apakah anda akan mengaktifkan Rekrutmen Unit <strong id="nama_unit_kebrek"></strong> posisi <strong id="ket_role_kebrek"></strong> berjumlah <strong id="kebutuhan_kuota_kebrek"></strong> pelamar ?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Ya, Aktifkan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- NON AKTIF -->
<div class="modal fade text-left" id="NonAktivasiKebRek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('menurekrutmen/kebrek_nonaktif') ?>" method="post">
            <div class="modal-content">
                <div class="modal-header bg-danger white">
                    <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-exclamation-triangle"></i> Menon-aktifkan Kebutuhan Rekrutmen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success mb-2" role="alert">
                        <strong class="h4 text-white">Peringatan.</strong><br>
                        <input type="hidden" name="id_kebrek_nonaktif" id="id_kebrek_nonaktif">
                        Apakah anda akan menon-aktifkan Rekrutmen Unit <strong id="nama_unit_kebrek2"></strong> posisi <strong id="ket_role_kebrek2"></strong> berjumlah <strong id="kebutuhan_kuota_kebrek2"></strong> pelamar ?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Ya, Non-Aktifkan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END: Content-->