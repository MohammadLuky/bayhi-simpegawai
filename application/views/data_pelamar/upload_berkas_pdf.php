<div class="content">
  <div class="page-inner">
    <div class="page-header mb-5">
      <h4 class="page-title"><?= $title; ?></h4>
      <ul class="breadcrumbs">
        <li class="nav-home">
          <a href="<?= base_url('homepelamar') ?>">
            <i class="fas fa-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href=""><?= $title; ?></a>
        </li>
      </ul>
    </div>

    <?php if ($this->session->flashdata('error')) : ?>
      <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
        <strong><?= $this->session->flashdata('error'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    <?php endif; ?>

    <div class="page-inner mt--5">

      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-header card-danger">
            <h4 class="card-title"><i class="fas fa-info-circle"></i> Informasi</h4>
          </div>
          <div class="card-body">
            <p>
              <strong>
                <h4>Format Semua Berkas .pdf dan Maksimal berukuran 500Kb.</h4>
              </strong>
            </p>
            <p>
              Terikasih atas perhatian anda.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-secondary">
            <div class="card-head-row">
              <h4 class="card-title">Upload Berkas Anda Dibawah Ini.</h4>
              <div class="card-tools">
                <?php if ($berkas_pelamar['file_lamaran_pdf'] != '' || $berkas_pelamar['file_ktp_pdf'] != '' || $berkas_pelamar['file_skck_pdf'] != '') : ?>
                  <a href="" class="btn btn-light btn-sm btn-round" data-toggle="modal" data-target="#hapusBerkas_all">
                    <span class="btn-label">
                      <i class="fas fa-trash"></i>
                    </span>
                    Hapus Semua Berkas
                  </a>
                <?php endif; ?>

              </div>
            </div>
          </div>
          <form action="<?= base_url('datapelamar/uploadall_berkas') ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">

              <div class="row">

                <div class="col-md-12">
                  <div class="alert alert-warning" role="alert">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="exampleFormControlFile1">File Lamaran PDF</label>
                          <input type="file" accept=".pdf" name="file_lamaran_pdf" class="form-control-file">
                        </div>
                        <?php if ($berkas_pelamar['file_lamaran_pdf'] != '') : ?>
                          <div class="col-md-6">
                            <label for="exampleFormControlFile1">Lihat File</label><br>
                            <a href="<?= base_url('assets/file_berkas/'); ?><?= $berkas_pelamar['file_lamaran_pdf']; ?>" class="badge badge-success" target="_blank"><i class="fas fa-file-pdf"></i> File Lamaran</a>
                          </div>
                        <?php else : ?>
                          <div class="col-md-6">
                            <label for="exampleFormControlFile1">Lihat File</label><br>
                            <span class="badge badge-danger" target="_blank">Belum Upload File Lamaran</span>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="alert alert-warning" role="alert">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="exampleFormControlFile1">File KTP PDF</label>
                          <input type="file" accept=".pdf" name="file_ktp_pdf" class="form-control-file">
                        </div>
                        <?php if ($berkas_pelamar['file_ktp_pdf'] != '') : ?>
                          <div class="col-md-6">
                            <label for="exampleFormControlFile1">Lihat File</label><br>
                            <a href="<?= base_url('assets/file_berkas/'); ?><?= $berkas_pelamar['file_ktp_pdf']; ?>" class="badge badge-success" target="_blank"><i class="fas fa-file-pdf"></i> File KTP</a>
                          </div>
                        <?php else : ?>
                          <div class="col-md-6">
                            <label for="exampleFormControlFile1">Lihat File</label><br>
                            <span class="badge badge-danger" target="_blank">Belum Upload File KTP</span>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="alert alert-warning" role="alert">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="exampleFormControlFile1">File Kartu Keluarga PDF</label>
                          <input type="file" accept=".pdf" name="file_kk_pdf" class="form-control-file">
                        </div>
                        <?php if ($berkas_pelamar['file_kk_pdf'] != '') : ?>
                          <div class="col-md-6">
                            <label for="exampleFormControlFile1">Lihat File</label><br>
                            <a href="<?= base_url('assets/file_berkas/'); ?><?= $berkas_pelamar['file_kk_pdf']; ?>" class="badge badge-success" target="_blank"><i class="fas fa-file-pdf"></i> File KK</a>
                          </div>
                        <?php else : ?>
                          <div class="col-md-6">
                            <label for="exampleFormControlFile1">Lihat File</label><br>
                            <span class="badge badge-danger" target="_blank">Belum Upload File KK</span>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="alert alert-warning" role="alert">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="exampleFormControlFile1">File Surat Keterangan Sehat PDF</label>
                          <input type="file" accept=".pdf" name="file_suket_sehat_pdf" class="form-control-file">
                        </div>
                        <?php if ($berkas_pelamar['file_suket_sehat_pdf'] != '') : ?>
                          <div class="col-md-6">
                            <label for="exampleFormControlFile1">Lihat File</label><br>
                            <a href="<?= base_url('assets/file_berkas/'); ?><?= $berkas_pelamar['file_suket_sehat_pdf']; ?>" class="badge badge-success" target="_blank"><i class="fas fa-file-pdf"></i> File Surat Keterangan Sehat</a>
                          </div>
                        <?php else : ?>
                          <div class="col-md-6">
                            <label for="exampleFormControlFile1">Lihat File</label><br>
                            <span class="badge badge-danger" target="_blank">Belum Upload File Keterangan Sehat</span>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="alert alert-warning" role="alert">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="exampleFormControlFile1">File Surat Komitmen PDF</label>
                          <input type="file" accept=".pdf" name="file_komitmen_pdf" class="form-control-file">
                        </div>
                        <?php if ($berkas_pelamar['file_komitmen_pdf'] != '') : ?>
                          <div class="col-md-6">
                            <label for="exampleFormControlFile1">Lihat File</label><br>
                            <a href="<?= base_url('assets/file_berkas/'); ?><?= $berkas_pelamar['file_komitmen_pdf']; ?>" class="badge badge-success" target="_blank"><i class="fas fa-file-pdf"></i> File Surat Komitmen</a>
                          </div>
                        <?php else : ?>
                          <div class="col-md-6">
                            <label for="exampleFormControlFile1">Lihat File</label><br>
                            <span class="badge badge-danger" target="_blank">Belum Upload File Komitmen</span>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>

                <?php if ($pelamar['unit_kerja_id'] == 59) : ?>
                  <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="exampleFormControlFile1">File SKCK PDF</label>
                            <input type="file" accept=".pdf" name="file_skck_pdf" class="form-control-file">
                          </div>
                          <?php if ($berkas_pelamar['file_skck_pdf'] != '') : ?>
                            <div class="col-md-6">
                              <label for="exampleFormControlFile1">Lihat File</label><br>
                              <a href="<?= base_url('assets/file_berkas/'); ?><?= $berkas_pelamar['file_skck_pdf']; ?>" class="badge badge-success" target="_blank"><i class="fas fa-file-pdf"></i> File SKCK</a>
                            </div>
                          <?php else : ?>
                            <div class="col-md-6">
                              <label for="exampleFormControlFile1">Lihat File</label><br>
                              <span class="badge badge-danger" target="_blank">Belum Upload File SKCK</span>
                            </div>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>

                <div class="col-md-12">
                  <div class="alert alert-warning" role="alert">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="exampleFormControlFile1">File Sertifikat PDF</label>
                          <input type="file" accept=".pdf" name="file_sertifikat_pdf" class="form-control-file">
                        </div>
                        <?php if ($berkas_pelamar['file_sertifikat_pdf'] != '') : ?>
                          <div class="col-md-6">
                            <label for="exampleFormControlFile1">Lihat File</label><br>
                            <a href="<?= base_url('assets/file_berkas/'); ?><?= $berkas_pelamar['file_sertifikat_pdf']; ?>" class="badge badge-success" target="_blank"><i class="fas fa-file-pdf"></i> File Sertifikat</a>
                          </div>
                        <?php else : ?>
                          <div class="col-md-6">
                            <label for="exampleFormControlFile1">Lihat File</label><br>
                            <span class="badge badge-danger" target="_blank">Belum Upload File Sertifikat</span>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

            </div>
            <?php if ($pelamar['progres_lamaran'] == 0) : ?>
              <div class="card-action">
                <button class="btn btn-info" type="submit">Unggah Berkas</button>
              </div>
            <?php endif; ?>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="modal fade" id="hapusBerkas_all" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd bg-secondary">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
            Validasi Hapus Berkas</span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('datapelamar/hapusall_berkas') ?>" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <p class="h4">Apakah anda yakin akan menghapus semua data berkas lamaran? </p>
            </div>
          </div>
        </div>
        <div class="modal-footer no-bd">
          <button type="submit" class="btn btn-success">Hapus</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>