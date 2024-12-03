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
                            <!-- <li class="breadcrumb-item active">Basic DataTables
                            </li> -->
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

        <?php if ($this->session->userdata('role_id') != 1): ?>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-danger">
                        <strong class="h4 text-white">Note.</strong><br>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger mb-2 h5" role="alert">
                            <p>Mohon Jika mengubah Data Posisi Unit konfirmasi ke Admin terlebih dahulu.</p>
                            <p>Terimakasih</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="content-body">
            <section id="horizontal">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-cyan bg-darken-4">
                                <h4 class="card-title text-white"><?= $title; ?></h4>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <?php if ($this->session->userdata('role_id') == 1): ?>
                                            <li>
                                                <a href="<?= base_url('unit'); ?>" data-toggle-tooltip="tooltip" data-placement="top" title="Kembali" class="btn btn-icon btn-sm btn-warning"><i class="fas fa-arrow-left"></i></a>
                                                <button class="btn btn-icon btn-info btn-sm" data-toggle="modal" data-toggle-tooltip="tooltip" data-placement="top" title="Tambah Posisi Unit" data-target="#tambahUnit"><i class="fa fa-plus"></i></button>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered zero-configuration">
                                            <thead class="text-white text-center" style="background-color: green;">
                                                <tr>
                                                    <?php if ($this->session->userdata('role_id') == 1): ?>
                                                        <th style="width: 10%;">ID Posisi Unit</th>
                                                    <?php else: ?>
                                                        <th style="width: 10%;">No</th>
                                                    <?php endif; ?>
                                                    <th style="width: 70%;">Nama Posisi Unit</th>
                                                    <th style="width: 20%;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($PosisiunitAll as $posisi) : ?>
                                                    <?php if ($this->session->userdata('role_id') == 1): ?>
                                                        <tr>
                                                            <td class="text-center"><?= $posisi['id_posisi_unit']; ?></td>
                                                            <td><?= $posisi['nama_posisi']; ?></td>
                                                            <td class="text-center">
                                                                <button class="btn btn-sm btn-warning" data-toggle-tooltip="tooltip" data-placement="top" title="Edit Data" data-toggle="modal" data-target="#editPosisiUnit<?= $posisi['id_posisi_unit']; ?>"><i class="fas fa-edit"></i></button>
                                                                <button class="btn btn-sm btn-danger" data-toggle-tooltip="tooltip" data-placement="top" title="Hapus Data" data-toggle="modal" data-target="#hapusPosisiUnit<?= $posisi['id_posisi_unit']; ?>"><i class="fas fa-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no++; ?></td>
                                                            <td><?= $posisi['nama_posisi']; ?></td>
                                                            <td class="text-center">
                                                                <span class="badge badge-danger">Aksi Tidak Ada</span>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
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

        <!-- Modal Tambah Posisi Unit -->
        <div class="modal fade text-left" id="tambahUnit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?= base_url('unit/posisi_unit/' . $GetUnit['id_unit']); ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header bg-info white">
                            <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-plus-circle"></i> Tambah Posisi Unit</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="timesheetinput1">Nama Posisi Unit</label>
                                    <input type="text" class="form-control" id="nama_posisi" name="nama_posisi" autocomplete="off" placeholder="Nama Posisi Unit" value="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-success">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php foreach ($PosisiunitAll as $posisi) : ?>
            <!-- Modal Tambah Posisi Unit -->
            <div class="modal fade text-left" id="editPosisiUnit<?= $posisi['id_posisi_unit']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?= base_url('unit/edit_posisi_unit/' . $GetUnit['id_unit'] . '/' . $posisi['id_posisi_unit']); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header bg-info white">
                                <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-plus-circle"></i> Edit Posisi Unit</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="timesheetinput1">Nama Posisi Unit</label>
                                        <input type="text" class="form-control" id="nama_posisi_edit" name="nama_posisi_edit" autocomplete="off" placeholder="Nama Posisi Unit" value="<?= $posisi['nama_posisi']; ?>">
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

        <?php foreach ($PosisiunitAll as $posisi) : ?>
            <!-- Modal Tambah Posisi Unit -->
            <div class="modal fade text-left" id="hapusPosisiUnit<?= $posisi['id_posisi_unit']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?= base_url('unit/hapus_posisi_unit/' . $GetUnit['id_unit'] . '/' . $posisi['id_posisi_unit']); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header bg-danger white">
                                <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-plus-circle"></i> Hapus Unit</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <!-- <input type="hidden" class="form-control" id="id_unit" name="id_unit" value="<?= $posisi['id_posisi_unit']; ?>"> -->
                                        <p class="h5">Apakah anda yakin akan menghapus data ini?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>
<!-- END: Content-->