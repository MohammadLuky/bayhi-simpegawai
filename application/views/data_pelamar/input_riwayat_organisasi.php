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

    <form action="<?= base_url('datapelamar/riwayat_organisasi') ?>" method="POST">
      <div class="page-inner mt--5">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-secondary">
              <h4 class="card-title">Input Riwayat Organisasi</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tingkat Organisasi</label>
                    <div class="select2-input">
                      <select id="tingkat_organisasi_id" name="tingkat_organisasi_id" class="form-control <?= (form_error('tingkat_organisasi_id') != '') ? 'is-invalid' : ''; ?>">
                        <option value="">Pilih Tingkat Organisasi</option>
                        <?php foreach ($tingkatan as $tingkat) : ?>
                          <option value="<?= $tingkat['id_tingkatan']; ?>"><?= $tingkat['tingkatan']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"><?= form_error('tingkat_organisasi_id'); ?></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Nama Organisasi</label>
                    <input type="text" class="form-control form-control <?= (form_error('nama_organisasi') != '') ? 'is-invalid' : ''; ?>" id="nama_organisasi" name="nama_organisasi" autocomplete="off" placeholder="Nama Organisasi.">
                    <div class="invalid-feedback"><?= form_error('nama_organisasi'); ?></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Jabatan</label>
                    <input type="text" class="form-control form-control <?= (form_error('jabatan') != '') ? 'is-invalid' : ''; ?>" id="jabatan" name="jabatan" autocomplete="off" placeholder="Jabatan.">
                    <div class="invalid-feedback"><?= form_error('jabatan'); ?></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Tahun Awal Menjabat</label>
                    <input type="number" class="form-control form-control <?= (form_error('tahun_awal_jabat') != '') ? 'is-invalid' : ''; ?>" id="tahun_awal_jabat" name="tahun_awal_jabat" autocomplete="off" placeholder="Diisi Angka.">
                    <div class="invalid-feedback"><?= form_error('tahun_awal_jabat'); ?></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Tahun Akhir Menjabat</label>
                    <input type="number" class="form-control form-control <?= (form_error('tahun_akhir_jabat') != '') ? 'is-invalid' : ''; ?>" id="tahun_akhir_jabat" name="tahun_akhir_jabat" autocomplete="off" placeholder="Diisi Angka.">
                    <div class="invalid-feedback"><?= form_error('tahun_akhir_jabat'); ?></div>
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