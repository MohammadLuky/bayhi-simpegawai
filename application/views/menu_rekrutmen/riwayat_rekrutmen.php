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
          <a href="<?= base_url('menurekrutmen') ?>"><?= $title; ?></a>
        </li>
      </ul>
    </div>

    <form action="<?= base_url('menurekrutmen/riwayat_rekrutmen') ?>" method="POST">
      <div class="page-inner mt--5">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-secondary">
              <h4 class="card-title">Input Seleksi Pelamar</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-10">
                  <div class="form-group">
                    <label>Pilih Pelamar</label>
                    <div class="select2-input select2-warning">
                      <select id="pegawai_id_hisrek" name="pegawai_id_hisrek[]" class="form-control <?= (form_error('pegawai_id_hisrek') != '') ? 'is-invalid' : ''; ?>" multiple="multiple">
                        <option value="">Pilih Pelamar</option>
                        <?php foreach ($pelamarAll as $pelamar) : ?>
                          <option value="<?= $pelamar['id_pegawai']; ?>"><?= $pelamar['nama_lengkap']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"><?= form_error('pegawai_id_hisrek'); ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Pilih Tahap Seleksi</label>
                    <div class="select2-input">
                      <select id="tahap_id_hisrek" name="tahap_id_hisrek" class="form-control <?= (form_error('tahap_id_hisrek') != '') ? 'is-invalid' : ''; ?>">
                        <option value="">Pilih Tahap Seleksi</option>
                        <?php foreach ($tahap_rekrutmen as $tahap) : ?>
                          <?php if ($tahap['id_tahap_rekrutmen'] != 1) : ?>
                            <option value="<?= $tahap['id_tahap_rekrutmen']; ?>"><?= $tahap['tahap_rekrutmen']; ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"><?= form_error('tahap_id_hisrek'); ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Pilih Status</label>
                    <div class="select2-input">
                      <select id="status_hisrek" name="status_hisrek" class="form-control <?= (form_error('status_hisrek') != '') ? 'is-invalid' : ''; ?>">
                        <option value="">Pilih Status</option>
                        <?php foreach ($status_hisrek as $key => $value) : ?>
                          <option value="<?= $key; ?>"><?= $value; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"><?= form_error('status_hisrek'); ?></div>
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

    <div class="page-inner mt--5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-secondary">
            <div class="d-flex align-items-center">
              <h4 class="card-title"><?= $title; ?></h4>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="tableSeleksi">
                <thead style="background-color: green;">
                  <tr class="text-center text-white">
                    <th>No</th>
                    <th>Nama Pelamar</th>
                    <th>Tahap Seleksi</th>
                    <th>Status</th>
                    <!-- <th>Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($history_seleksi as $history) : ?>
                    <tr>
                      <td class="text-center"><?= $i; ?></td>
                      <td><?= $history['nama_lengkap']; ?></td>
                      <td class="text-center"><?= $history['tahap_rekrutmen']; ?></td>
                      <?php if ($history['status_hisrek'] == 1 && $history['tahap_id_hisrek'] == 1) : ?>
                        <td class="text-center"><span class="badge badge-success">Berhasil</span></td>
                      <?php elseif ($history['status_hisrek'] == 1) : ?>
                        <td class="text-center"><span class="badge badge-success">Diterima</span></td>
                      <?php elseif ($history['status_hisrek'] == 2) : ?>
                        <td class="text-center"><span class="badge badge-warning">Proses</span></td>
                      <?php elseif ($history['status_hisrek'] == 0) : ?>
                        <td class="text-center"><span class="badge badge-danger">Ditolak</span></td>
                      <?php endif; ?>
                      <!-- <td class="text-center">
                        <span class="badge badge-info"> Tidak ada aksi untuk Tahap ini.</span>
                        <button type="button" class="btn btn-xs btn-info btn-round" data-toggle="modal" data-target="#editSeleksi<?= $history['id_tahap_rekrutmen']; ?>"><i class="fa fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-xs btn-danger btn-round hapus-seleksi" data-id="<?= $history['id_tahap_rekrutmen']; ?>"><i class="fa fa-times"></i> Hapus</button>
                      </td> -->
                    </tr>
                  <?php $i++;
                  endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>