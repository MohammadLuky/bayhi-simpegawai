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

        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?= validation_errors(); ?></strong>
            </div>
        <?php endif; ?>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark">
                    <strong class="h4 text-white">Note.</strong><br>
                </div>
                <div class="card-body">
                    <div class="alert alert-info mb-2" role="alert">
                        Bila tombol hapus tidak bisa / disable maka Nonaktifkan pegawai yang mempunyai Jabatan tersebut.
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <section id="horizontal">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-cyan bg-darken-4">
                                <h4 class="card-title text-white"><?= $title; ?></h4>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><button class="btn btn-icon btn-info btn-sm" data-toggle="modal" data-target="#tambahJabatan"><i class="fa fa-plus"></i> Tambah Jabatan Pegawai</button></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered zero-configuration">
                                            <thead class="text-white text-center" style="background-color: green;">
                                                <tr>
                                                    <th>ID Jabatan</th>
                                                    <th>Nama Jabatan Pegawai</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($jabatanAll as $jabatan) :
                                                    // $jabatan_data = HitungData('pegawai_data', 'status_pegawai_id', $jabatan['id_jabatan']);
                                                ?>
                                                    <tr>
                                                        <!-- <td class="text-center"><?= $no++; ?></td> -->
                                                        <td class="text-center"><?= $jabatan['id_jabatan']; ?></td>
                                                        <td><?= $jabatan['nama_jabatan']; ?></td>
                                                        <td class="text-center">
                                                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editJabatan<?= $jabatan['id_jabatan']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                                            <!-- <?php if ($jabatan_data) : ?> -->
                                                            <!-- <button type="button" class="btn btn-sm btn-danger" data-id="<?= $jabatan['id_jabatan']; ?>" disabled><i class="fas fa-trash"></i> Hapus</button> -->
                                                            <!-- <?php else : ?> -->
                                                            <button type="button" class="btn btn-sm btn-danger hapus-jabpeg" data-id="<?= $jabatan['id_jabatan']; ?>"><i class="fas fa-trash"></i> Hapus</button>
                                                            <!-- <?php endif; ?> -->
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

        <!-- Modal Tambah Unit -->
        <div class="modal fade text-left" id="tambahJabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?= base_url('jabatan'); ?>" method="post">
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
                                    <label for="timesheetinput1">Nama Jabatan Pegawai</label>
                                    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" autocomplete="off" placeholder="Nama Jabatan Pegawai" value="">
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

        <?php foreach ($jabatanAll as $jabatan) : ?>
            <!-- Modal Tambah Unit -->
            <div class="modal fade text-left" id="editJabatan<?= $jabatan['id_jabatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?= base_url('jabatan/edit_jabatan/' . $jabatan['id_jabatan']); ?>" method="post">
                        <div class="modal-content">
                            <div class="modal-header bg-info white">
                                <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-plus-circle"></i> Edit Jabatan Pegawai</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="timesheetinput1">Nama Jabatan Pegawai</label>
                                        <input type="text" class="form-control" id="nama_jabatan_edit" name="nama_jabatan_edit" autocomplete="off" placeholder="Nama Jabatan Pegawai" value="<?= $jabatan['nama_jabatan']; ?>">
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