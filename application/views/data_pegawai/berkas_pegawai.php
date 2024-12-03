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
                            <li class="breadcrumb-item"><a href="<?= base_url('datapegawai/berkas_pegawai/' . $GetPegawai['id_pegawai']); ?>"><?= $title; ?> | <?= $GetPegawai['nama_lengkap']; ?></a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $this->session->flashdata('error'); ?></strong>
            </div>
        <?php endif; ?>

        <div class="content-body">
            <section id="horizontal">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-content collapse show">
                                <form action="<?= base_url('datapegawai/unggah_berkas_perpegawai/' . $GetPegawai['id_pegawai']) ?>" method="post" enctype="multipart/form-data">
                                    <div class="card-header bg-secondary">
                                        <div class="row justify-content-end">
                                            <label class="h4 col-md-9 text-white">Form <?= $title; ?> | <?= $GetPegawai['nama_lengkap']; ?> </label>
                                            <div class="col-md-3">
                                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Simpan Data" class="btn btn-success btn-sm btn-round"><i class="fas fa-save"></i></button>
                                                <?php if (!empty($file_pegawai['file_kk_pdf']) && !empty($file_pegawai['file_ktp_pdf'])): ?>
                                                    <a href="<?= base_url('datapegawai/hapus_berkas_perpegawai/' . $GetPegawai['id_pegawai']) ?>" data-toggle="tooltip" data-placement="top" title="Edit File Pegawai" class="btn btn-warning btn-sm btn-round"><i class="fas fa-edit"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body card-dashboard">

                                        <div class="alert alert-danger mb-2" role="alert">
                                            <strong class="h4 text-white">Informasi!!!</strong><br>
                                            File Maksimal berukuran 500 Kb. Terimakasih.
                                        </div>

                                        <div class="row">
                                            <?php if (empty($file_pegawai['file_kk_pdf'])): ?>
                                                <div class="col-md-12">
                                                    <div class="card mb-1 border-top-amber border-top-darken-3 border-top-5">
                                                        <div class="card-content">
                                                            <div class="p-1">
                                                                <label class="h5 text-muted amber darken-3">Upload Kartu Keluarga</label>
                                                                <div class="mb-2">
                                                                    <input class="form-control" type="file" id="pegawai_kk" name="pegawai_kk" accept=".pdf">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="col-md-12">
                                                    <div class="card mb-1 border-top-amber border-top-darken-3 border-top-5">
                                                        <div class="card-content">
                                                            <div class="p-1">
                                                                <label for="exampleFormControlFile1">Lihat File</label><br>
                                                                <a href="<?= base_url('assets/file_berkas/'); ?><?= $file_pegawai['file_kk_pdf']; ?>" class="badge badge-success" target="_blank"><i class="fas fa-file-pdf"></i> File Kartu Keluarga Anda</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="row">
                                            <?php if (empty($file_pegawai['file_kk_pdf'])): ?>
                                                <div class="col-md-12">
                                                    <div class="card mb-1 border-top-amber border-top-darken-3 border-top-5">
                                                        <div class="card-content">
                                                            <div class="p-1">
                                                                <label class="h5 text-muted amber darken-3">Upload Kartu KTP</label>
                                                                <div class="mb-2">
                                                                    <input class="form-control" type="file" id="pegawai_ktp" name="pegawai_ktp" accept=".pdf">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="col-md-12">
                                                    <div class="card mb-1 border-top-amber border-top-darken-3 border-top-5">
                                                        <div class="card-content">
                                                            <div class="p-1">
                                                                <label for="exampleFormControlFile1">Lihat File</label><br>
                                                                <a href="<?= base_url('assets/file_berkas/'); ?><?= $file_pegawai['file_kk_pdf']; ?>" class="badge badge-success" target="_blank"><i class="fas fa-file-pdf"></i> File Kartu Tanda Penduduk Anda</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->