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
                            <li class="breadcrumb-item"><a href="<?= base_url('datapegawai'); ?>">Data Pegawai</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left align-self-bottom mt-3">
                                        <span class="d-block text-info mb-1 font-medium-5">Total Staff</span>
                                        <h1 class="text-info mb-0"><?= $jumlah_staff; ?></h1>
                                    </div>
                                    <div class="align-self-top">
                                        <i class="fas fa-user-friends icon-opacity text-info font-large-4 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card bg-gradient-directional-success">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-white text-left align-self-bottom mt-3">
                                        <span class="d-block mb-1 font-medium-5">Total Guru</span>
                                        <h1 class="text-white mb-0"><?= $jumlah_guru; ?></h1>
                                    </div>
                                    <div class="align-self-top">
                                        <i class="fas fa-user-friends icon-opacity text-white font-large-4 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-4 col-lg-6 col-12"> -->
                <!-- <div class="col-lg-4">
                    <div class="card bg-gradient-directional-danger">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-white text-left align-self-bottom mt-3">
                                        <span class="d-block mb-1 font-medium-5">Total Kepala</span>
                                        <h1 class="text-white mb-0">BELUM</h1>
                                    </div>
                                    <div class="align-self-top">
                                        <i class="fas fa-user-friends icon-opacity text-white font-large-4 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <section id="horizontal">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?= $title; ?></h4>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a href="<?= base_url('datapegawai/tambah_pegawai') ?>" class="btn btn-icon btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Pegawai</a></li>
                                        <li><button type="button" class="btn btn-icon btn-warning btn-sm unggah-pegawai" data-toggle="tooltip" data-placement="top" title="Unggah Data Pegawai"><i class="fas fa-cloud-upload-alt"></i></button></li>
                                        <li><a href="<?= base_url('datapegawai/unduh_datapegawai') ?>" class="btn btn-icon btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Download Data Pegawai"><i class="fas fa-file-download"></i></a></li>
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
                                                    <th>Posisi</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($data_pegawai as $pegawais) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++; ?></td>
                                                        <td><?= $pegawais['nama_lengkap']; ?></td>
                                                        <td class="text-center">
                                                            <?php if ($pegawais['role_id'] != 8) : ?>
                                                                <?= $pegawais['ket_role']; ?> - <?= $pegawais['nama_unit']; ?>
                                                            <?php elseif ($pegawais['role_id'] == 8) : ?>
                                                                <?= $pegawais['ket_role']; ?> - <?= $pegawais['mata_pelajaran']; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-center"><?= $pegawais['ket_status_pegawai']; ?></td>
                                                        <td class="text-center">
                                                            <a class="badge badge-danger text-white nonaktif-pegawai" data-toggle="tooltip" data-placement="top" title="Nonaktif Pegawai" data-id="<?= $pegawais['id_pegawai']; ?>"><i class="fas fa-times-circle"></i></a>
                                                            <a href="<?= base_url('datapegawai/edit_pegawai/') . $pegawais['id_pegawai'] ?>" class="badge badge-warning" data-toggle="tooltip" data-placement="top" title="Edit Data Pegawai"><i class="fas fa-user-edit"></i></a>
                                                            <!-- <a href="#" class="badge badge-warning" data-toggle="tooltip" data-placement="top" title="Edit Data Pegawai" id="edit-pegawai"><i class="fas fa-user-edit"></i></a> -->
                                                            <a href="<?= base_url('datapegawai/jabatan_pegawai/') . $pegawais['id_pegawai'] ?>" class="badge badge-secondary" data-toggle="tooltip" data-placement="top" title="Pilih Jabatan Pegawai"><i class="fas fa-user-plus"></i></a>
                                                            <a href="<?= base_url('datapegawai/detail_pegawai/') . $pegawais['id_pegawai'] ?>" class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Detail Data Pegawai"><i class="fas fa-info-circle"></i></a>
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

<!-- Modal Nonaktif -->
<div class="modal fade text-left" id="nonAktifPegawai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('datapegawai/nonaktif_pegawai') ?>" method="post">
            <div class="modal-content">
                <div class="modal-header bg-danger white">
                    <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-exclamation-triangle"></i> Nonaktif Pegawai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success mb-2" role="alert">
                        <strong class="h4 text-white">Peringatan.</strong><br>
                        <input type="hidden" name="id_pegawai_update" id="id_pegawai_update">
                        Apakah anda yakin akan menon-aktifkan pegawai tersebut dari aplikasi SIM PEGAWAI BAYT ALHIKMAH ?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Ya, Nonaktif</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Nonaktif -->
<div class="modal fade text-left" id="unggahPegawai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('datapegawai/upload_pegawai'); ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header bg-warning white">
                    <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-exclamation-triangle"></i> Unggah Data Pegawai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success mb-2" role="alert">
                        <p>Pilih File Format Unggah Data Pegawai.</p>
                        <span><a href="<?= base_url('assets/file_template/format_upload_pegawai_new.xlsx'); ?>" class="badge badge-info">Download Format File Data Pegawai</a></span>
                    </div>
                    <input class="form-control" type="file" id="unggah_data_pegawai" name="unggah_data_pegawai" accept=".xlsx, .xls">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Ya, Unggah</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END: Content-->