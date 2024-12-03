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
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= $title; ?></h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><button class="btn btn-icon btn-success btn-sm" data-toggle="modal" data-target="#tambahTahap"><i class="fa fa-plus"></i> Tambah Tahap Rekrutmen</button></li>
                                        <!-- <li><a data-action="reload" data-toggle="tooltip" data-placement="top" title="Refresh Data"><i class="fas fa-sync-alt"></i></a></li> -->
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
                                                    <th>Nama Tahapan Seleksi</th>
                                                    <th>Waktu Pelaksanaan</th>
                                                    <th>Keterangan Tahap</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($tahap_rekrutmen as $tr) : ?>
                                                    <?php if ($tr['id_tahap_rekrutmen'] == 1) : ?>
                                                        <tr>
                                                            <td class="text-center"><?= $i; ?></td>
                                                            <td><?= $tr['tahap_rekrutmen']; ?></td>
                                                            <td class="text-center">
                                                                <span class="badge badge-info"> Tidak ada Keterangan waktu untuk Tahap ini.</span>
                                                            </td>
                                                            <td class="text-center">
                                                                <?= $tr['ket_tahap']; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="badge badge-info"> Tidak ada aksi untuk Tahap ini.</span>
                                                            </td>
                                                        </tr>
                                                        </tr>
                                                    <?php else : ?>
                                                        <tr>
                                                            <td class="text-center"><?= $i; ?></td>
                                                            <td><?= $tr['tahap_rekrutmen']; ?></td>
                                                            <?php if ($tr['jadwal_tahap'] != '') : ?>
                                                                <td class="text-center"><?= tanggal_indonesia_format2($tr['jadwal_tahap']); ?> - <?= $tr['waktu_pelaksanaan']; ?> WIB</td>
                                                                <td><?= $tr['ket_tahap']; ?></td>
                                                            <?php else : ?>
                                                                <td class="text-center"><span class="badge badge-danger">Data Kosong</span></td>
                                                                <td class="text-center"><span class="badge badge-danger">Data Kosong</span></td>
                                                            <?php endif; ?>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-sm btn-icon btn-warning btn-round" data-toggle="modal" data-target="#editSeleksi<?= $tr['id_tahap_rekrutmen']; ?>"><i class="fa fa-edit"></i> Edit</button>
                                                                <button type="button" class="btn btn-sm btn-icon btn-danger btn-round hapus-seleksi" data-id="<?= $tr['id_tahap_rekrutmen']; ?>"><i class="fa fa-times"></i> Hapus</button>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php $i++;
                                                endforeach; ?>
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

        <!-- Modal Form -->
        <div class="modal fade text-left" id="tambahTahap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?= base_url('menurekrutmen/tahap_rekrutmen') ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header bg-success white">
                            <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-plus-circle"></i> Tambah Tahap Rekrutmen</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="timesheetinput1">Nama Tahap Seleksi</label>
                                    <input type="text" class="form-control" id="tahap_rekrutmen" name="tahap_rekrutmen" autocomplete="off" placeholder="Nama Tahap Seleksi." value="<?= set_value('tahap_rekrutmen'); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="timesheetinput3">Jadwal Pelaksanaan</label>
                                    <input type="date" class="form-control" id="jadwal_tahap" name="jadwal_tahap">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="timesheetinput5">Waktu Pelaksanaan</label>
                                    <input type="time" class="form-control" id="waktu_pelaksanaan" name="waktu_pelaksanaan">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="projectinput8">Keterangan Tahap Seleksi</label>
                                    <textarea class="form-control" id="ket_tahap" name="ket_tahap" autocomplete="off" placeholder="Keterangan Tahap Seleksi"><?= set_value('ket_tahap'); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Modal Form -->
        <?php foreach ($tahap_rekrutmen as $tr) : ?>
            <div class="modal fade text-left" id="editSeleksi<?= $tr['id_tahap_rekrutmen']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?= base_url('menurekrutmen/edit_tahap_rekrutmen/') . $tr['id_tahap_rekrutmen'] ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header bg-success white">
                                <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-plus-circle"></i> Edit Tahap Rekrutmen</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="timesheetinput1">Nama Tahap Seleksi</label>
                                        <input type="text" class="form-control" id="tahap_rekrutmen_edit" name="tahap_rekrutmen_edit" autocomplete="off" placeholder="Nama Tahap Seleksi." value="<?= $tr['tahap_rekrutmen']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="timesheetinput3">Jadwal Pelaksanaan</label>
                                        <input type="date" class="form-control" id="jadwal_tahap_edit" name="jadwal_tahap_edit" value="<?= $tr['jadwal_tahap']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="timesheetinput5">Waktu Pelaksanaan</label>
                                        <input type="time" class="form-control" id="waktu_pelaksanaan_edit" name="waktu_pelaksanaan_edit" value="<?= $tr['waktu_pelaksanaan']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput8">Keterangan Tahap Seleksi</label>
                                        <textarea class="form-control" id="ket_tahap_edit" name="ket_tahap_edit" autocomplete="off" placeholder="Keterangan Tahap Seleksi"><?= $tr['ket_tahap']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-success">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<!-- END: Content-->