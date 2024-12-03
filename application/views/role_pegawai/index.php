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
                            <li class="breadcrumb-item"><a href="<?= base_url('unit'); ?>"><?= $title; ?></a>
                            </li>
                            <!-- <li class="breadcrumb-item active">Basic DataTables
                            </li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- <?php if (validation_errors()) : ?>
            <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?= validation_errors(); ?></strong>
            </div>
        <?php endif; ?> -->

        <!-- <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark">
                    <strong class="h4 text-white">Note.</strong><br>
                </div>
                <div class="card-body">
                    <div class="alert alert-info mb-2" role="alert">
                        Bila tombol hapus tidak bisa / disable maka Nonaktifkan pegawai yang berstatus tersebut.
                    </div>
                </div>
            </div>
        </div> -->

        <div class="content-body">
            <section id="horizontal">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-cyan bg-darken-4">
                                <h4 class="card-title text-white"><?= $title; ?></h4>
                                <!-- <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><button class="btn btn-icon btn-info btn-sm" data-toggle="modal" data-target="#tambahStatus"><i class="fa fa-plus"></i> Tambah Status Pegawai</button></li>
                                    </ul>
                                </div> -->
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered zero-configuration">
                                            <thead class="text-white text-center" style="background-color: green;">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Keterangan Role/Jabatan Pegawai</th>
                                                    <!-- <th>Aksi</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($roleAll as $role) :
                                                    // $role_data = HitungData('pegawai_data', 'status_pegawai_id', $role['id_status_pegawai']);
                                                ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++; ?></td>
                                                        <td><?= $role['ket_role']; ?></td>
                                                        <!-- <td class="text-center">
                                                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editStatus<?= $role['id_status_pegawai']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                                            <?php if ($role_data) : ?>
                                                                <button type="button" class="btn btn-sm btn-danger" data-id="<?= $role['id_status_pegawai']; ?>" disabled><i class="fas fa-trash"></i> Hapus</button>
                                                            <?php else : ?>
                                                                <button type="button" class="btn btn-sm btn-danger hapus-statpeg" data-id="<?= $role['id_status_pegawai']; ?>"><i class="fas fa-trash"></i> Hapus</button>
                                                            <?php endif; ?>
                                                        </td> -->
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

        <!-- Modal Tambah Unit -->
        <!-- <div class="modal fade text-left" id="tambahStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?= base_url('statuspegawai'); ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header bg-info white">
                            <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-plus-circle"></i> Tambah Status Pegawai</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="timesheetinput1">Keterangan Status Pegawai</label>
                                    <input type="text" class="form-control" id="ket_status_pegawai" name="ket_status_pegawai" autocomplete="off" placeholder="Keterangan Status Pegawai" value="">
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
        </div> -->

        <!-- Modal Tambah Unit
        <?php foreach ($roleAll as $role) : ?>
        <div class="modal fade text-left" id="editStatus<?= $role['id_status_pegawai']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?= base_url('statuspegawai/edit_status/' . $role['id_status_pegawai']); ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header bg-info white">
                            <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-plus-circle"></i> Edit Status Pegawai</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="timesheetinput1">Keterangan Status Pegawai</label>
                                    <input type="text" class="form-control" id="ket_status_pegawai_edit" name="ket_status_pegawai_edit" autocomplete="off" placeholder="Keterangan Status Pegawai" value="<?= $role['ket_status_pegawai']; ?>">
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
    <?php endforeach; ?> -->

    </div>
</div>
<!-- END: Content-->