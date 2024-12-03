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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-cyan bg-darken-4">
                                <div class="row justify-content-end">
                                    <label class="h4 col-md-10 text-white">Tabel <?= $title; ?> | <?= $GetKat_Gaji['kategori_gaji']; ?></label>
                                    <div class="col-md-2">
                                        <button data-toggle="tooltip" data-placement="top" title="Tambah Data" class="btn btn-success btn-sm btn-round" id="tambahRincian_Gaji"><i class="fas fa-plus-square"></i></button>
                                        <a href="<?= base_url('gaji/katGaji'); ?>" data-toggle="tooltip" data-placement="top" title="Kembali" class="btn btn-warning btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div id="CardAddRincianGaji" style="display: none;" class="mb-2">
                                        <div class="col-lg-8">
                                            <div class="card box-shadow-0 border-primary">
                                                <div class="card-header bg-primary">
                                                    <label class="h4 text-white">Form Tambah <?= $title; ?></label>
                                                </div>
                                                <form action="<?= base_url('gaji/rincianGaji/' . $GetKat_Gaji['id_kategori_gaji']); ?>" method="POST">
                                                    <div class="card-body">
                                                        <div class="col-lg-12">
                                                            <label for="timesheetinput1">Nama Rincian Gaji <span class="text-danger">*</span></label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control <?= (form_error('rincian_gaji') != '') ? 'is-invalid' : ''; ?>" id="rincian_gaji" name="rincian_gaji" autocomplete="off" placeholder="Tulis Nama Rincian Gaji.">
                                                            </div>
                                                            <div class="invalid-feedback"><?= form_error('rincian_gaji'); ?></div>
                                                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                                            <button type="button" class="btn btn-sm btn-secondary" id="BatalTambahRincian_Gaji">Batal</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered zero-configuration">
                                            <thead class="text-white text-center" style="background-color: green;">
                                                <tr>
                                                    <th style="width: 10%;">No</th>
                                                    <th style="width: 70%;">Rincian Gaji</th>
                                                    <th style="width: 20%;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($Rincian_KategoriGaji as $rincian) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++; ?></td>
                                                        <td><?= $rincian['rincian_gaji']; ?></td>
                                                        <td class="text-center">
                                                            <button class="btn btn-sm btn-warning" data-toggle-tooltip="tooltip" data-placement="top" title="Edit Data" data-toggle="modal" data-target="#EditRincianGaji<?= $rincian['id_rincian_gaji']; ?>"><i class="fas fa-edit"></i></button>
                                                            <button class="btn btn-sm btn-danger hapus-rincian-gaji" data-id="<?= $rincian['id_rincian_gaji']; ?>" data-toggle-tooltip="tooltip" data-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></button>
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

<?php foreach ($Rincian_KategoriGaji as $rincian) : ?>
    <!-- Modal Tambah Unit -->
    <div class="modal fade text-left" id="EditRincianGaji<?= $rincian['id_rincian_gaji']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('gaji/edit_rincianGaji/' . $rincian['id_rincian_gaji'] . '/' . $GetKat_Gaji['id_kategori_gaji']); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header bg-info white">
                        <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-plus-circle"></i> Tambah Unit</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="timesheetinput1">Nama Rincian</label>
                                <input type="text" class="form-control" id="rincian_gaji_edit" name="rincian_gaji_edit" autocomplete="off" placeholder="Nama Rincian" value="<?= $rincian['rincian_gaji']; ?>">
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