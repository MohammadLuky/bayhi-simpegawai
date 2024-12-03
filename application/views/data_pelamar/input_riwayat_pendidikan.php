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

    <?php if ($this->session->flashdata('error')) : ?>
      <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
        <strong><?= $this->session->flashdata('error'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('datapelamar/riwayat_pendidikan') ?>" method="POST" enctype="multipart/form-data">
      <div class="page-inner mt--5">

        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-header card-danger">
              <h4 class="card-title"><i class="fas fa-info-circle"></i> Informasi</h4>
            </div>
            <div class="card-body">
              <p>
                <strong>
                  <h4>Format Berkas Ijzah & Transkrip .pdf dan Maksimal berukuran 500Kb.</h4>
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
              <h4 class="card-title">Input Riwayat Pendidikan</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Jenjang Pendidikan</label>
                    <div class="select2-input">
                      <select id="jenjang_pend" name="jenjang_pend" class="form-control <?= (form_error('jenjang_pend') != '') ? 'is-invalid' : ''; ?>">
                        <option value="">Pilih Jenjang Pendidikan</option>
                        <?php foreach ($pendidikan as $jenjang_pend) : ?>
                          <option value="<?= $jenjang_pend['id_pendidikan']; ?>"><?= $jenjang_pend['tingkat_pendidikan']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"><?= form_error('jenjang_pend'); ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Nama Sekolah/Perguruan Tinggi</label>
                    <input type="text" class="form-control form-control <?= (form_error('instansi_pendidikan') != '') ? 'is-invalid' : ''; ?>" id="instansi_pendidikan" name="instansi_pendidikan" autocomplete="off" placeholder="Nama Sekolah/Perguruan Tinggi." value="<?= set_value('instansi_pendidikan') ?>">
                    <div class="invalid-feedback"><?= form_error('instansi_pendidikan'); ?></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Jurusan/Program Studi</label>
                    <input type="text" class="form-control form-control <?= (form_error('program_studi') != '') ? 'is-invalid' : ''; ?>" id="program_studi" name="program_studi" autocomplete="off" placeholder="Jurusan/Program Studi." value="<?= set_value('program_studi') ?>">
                    <div class=" invalid-feedback"><?= form_error('program_studi'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">IPK/Rata - Rata Nilai Akhir</label>
                    <input type="text" class="form-control form-control <?= (form_error('ipk') != '') ? 'is-invalid' : ''; ?>" id="ipk" name="ipk" autocomplete="off" placeholder="IPK/Rata - Rata Nilai Akhir." value="<?= set_value('ipk') ?>">
                    <div class="invalid-feedback"><?= form_error('ipk'); ?></div>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group">
                    <label>Tahun Lulus</label>
                    <div class="select2-input">
                      <select id="tahun_lulus" name="tahun_lulus" class="form-control <?= (form_error('tahun_lulus') != '') ? 'is-invalid' : ''; ?>">
                        <option value="">Pilih Tahun Lulus</option>
                      </select>
                      <div class="invalid-feedback"><?= form_error('tahun_lulus'); ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleFormControlFile1">File Ijazah dan Transkrip/SKHUN .Pdf</label>
                    <input type="file" accept=".pdf" name="ijazah_transkrip_pdf" class="form-control-file" id="ijazah_transkrip_pdf">
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group">
                    <label>Apakah Ini Pendidikan Terakhir Anda ?</label>
                    <div class="select2-input">
                      <select id="valid_pend_terakhir" name="valid_pend_terakhir" class="form-control <?= (form_error('valid_pend_terakhir') != '') ? 'is-invalid' : ''; ?>">
                        <option value="">Pilih Jawaban</option>
                        <option value="1">Ya</option>
                        <option value="0">Bukan</option>
                      </select>
                      <div class="invalid-feedback"><?= form_error('valid_pend_terakhir'); ?></div>
                    </div>
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