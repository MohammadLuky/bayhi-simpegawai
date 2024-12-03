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

    <form action="<?= base_url('datapelamar/riwayat_pekerjaan') ?>" method="POST">
      <div class="page-inner mt--5">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-secondary">
              <h4 class="card-title">Input Riwayat Pekerjaan</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Nama Tempat Kerja</label>
                    <input type="text" class="form-control form-control <?= (form_error('tempat_kerja') != '') ? 'is-invalid' : ''; ?>" id="tempat_kerja" name="tempat_kerja" autocomplete="off" placeholder="Nama Tempat Kerja.">
                    <div class="invalid-feedback"><?= form_error('tempat_kerja'); ?></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Posisi Pekerjaan</label>
                    <input type="text" class="form-control form-control <?= (form_error('posisi_pekerjaan') != '') ? 'is-invalid' : ''; ?>" id="posisi_pekerjaan" name="posisi_pekerjaan" autocomplete="off" placeholder="Posisi Pekerjaan.">
                    <div class="invalid-feedback"><?= form_error('posisi_pekerjaan'); ?></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Tahun Awal Bekerja</label>
                    <input type="number" class="form-control form-control <?= (form_error('tahun_awal_bekerja') != '') ? 'is-invalid' : ''; ?>" id="tahun_awal_bekerja" name="tahun_awal_bekerja" autocomplete="off" placeholder="Ditulis Angka.">
                    <div class="invalid-feedback"><?= form_error('tahun_awal_bekerja'); ?></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Tahun Akhir Bekerja</label>
                    <input type="number" class="form-control form-control <?= (form_error('tahun_akhir_bekerja') != '') ? 'is-invalid' : ''; ?>" id="tahun_akhir_bekerja" name="tahun_akhir_bekerja" autocomplete="off" placeholder="Ditulis Angka.">
                    <div class="invalid-feedback"><?= form_error('tahun_akhir_bekerja'); ?></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Deskripsi Pekerjaan</label>
                    <textarea class="form-control <?= (form_error('deskripsi_pekerjaan') != '') ? 'is-invalid' : ''; ?>" id="deskripsi_pekerjaan" name="deskripsi_pekerjaan" autocomplete="off" placeholder="Deskripsikan Secara Singkat Pekerjaan Sebelumnya."></textarea>
                    <div class="invalid-feedback"><?= form_error('deskripsi_pekerjaan'); ?></div>
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