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
                <h4>Format foto .png/.jpeg/.jpg dan Maksimal berukuran 500Kb.</h4>
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
            <h4 class="card-title">Upload Foto Anda</h4>
          </div>
          <form action="<?= base_url('datapelamar/uploadFile_foto') ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">

                <div class="form-group form-show-validation row">
                  <label class="col-lg-4 col-md-6 col-sm-4 mt-sm-2 text-right">Unggah Foto </label>
                  <div class="col-lg-6 col-md-9 col-sm-8">
                    <div class="input-file input-file-image">
                      <img class="img-upload-preview img-circle" width="100" height="100" src="<?= base_url('assets/file_foto/'); ?><?= $pelamar['foto']; ?>" alt="preview">
                      <input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg" accept="image/*">
                      <?php if ($pelamar['progres_lamaran'] == 0) : ?>
                        <label for="uploadImg" class="btn btn-primary btn-round btn-lg"><i class="fas fa-camera"></i> Pilih Foto</label>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-9 col-sm-8">
                    <img src="<?= base_url('assets/file_foto/'); ?><?= $pelamar['foto']; ?>" alt="" width="145px" height="215px">
                  </div>
                </div>

              </div>
            </div>
            <?php if ($pelamar['progres_lamaran'] == 0) : ?>
              <div class="card-action">
                <button class="btn btn-info" type="submit">Simpan Data</button>
              </div>
            <?php endif; ?>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>