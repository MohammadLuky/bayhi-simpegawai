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
          <a href="<?= base_url('datapelamar') ?>">Data Pelamar</a>
        </li>
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href=""><?= $title; ?></a>
        </li>
      </ul>
    </div>

    <form action="<?= base_url('datapelamar/riwayat_proyek') ?>" method="POST">
      <div class="page-inner mt--5">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-secondary">
              <h4 class="card-title">Input Riwayat Proyek</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tingkat Proyek</label>
                    <div class="select2-input">
                      <select id="tingkat_proyek_id" name="tingkat_proyek_id" class="form-control <?= (form_error('tingkat_proyek_id') != '') ? 'is-invalid' : ''; ?>">
                        <option value="">Pilih Tingkat Proyek</option>
                        <?php foreach ($tingkatan as $tingkat) : ?>
                          <option value="<?= $tingkat['id_tingkatan']; ?>"><?= $tingkat['tingkatan']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"><?= form_error('tingkat_proyek_id'); ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Nama Proyek</label>
                    <input type="text" class="form-control form-control <?= (form_error('nama_proyek') != '') ? 'is-invalid' : ''; ?>" id="nama_proyek" name="nama_proyek" autocomplete="off" placeholder="Nama proyek.">
                    <div class="invalid-feedback"><?= form_error('nama_proyek'); ?></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Deskripsi Proyek</label>
                    <textarea class="form-control <?= (form_error('deskripsi_proyek') != '') ? 'is-invalid' : ''; ?>" id="deskripsi_proyek" name="deskripsi_proyek" autocomplete="off" placeholder="Deskripsikan Secara Singkat Proyek Anda."></textarea>
                    <div class="invalid-feedback"><?= form_error('deskripsi_proyek'); ?></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-action">
              <button class="btn btn-info" type="submit">Simpan Data</button>
            </div>
          </div>
        </div>
      </div>
    </form>

  </div>
</div>