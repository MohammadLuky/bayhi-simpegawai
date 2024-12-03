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

    <?php if (validation_errors()) : ?>
      <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
        <strong><?= validation_errors(); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    <?php endif; ?>

    <div class="page-inner mt--5">

      <form action="<?= base_url('menurekrutmen') ?>" method="POST">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-secondary">
              <h4 class="card-title">Input <?= $title; ?></h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Pilih Posisi</label>
                    <div class="select2-input">
                      <select id="kebutuhan_role_id" name="kebutuhan_role_id" class="form-control">
                        <option value="">Pilih Posisi</option>
                        <?php foreach ($posisi as $p) : ?>
                          <?php if ($p['id_role'] == 7 || $p['id_role'] == 8) : ?>
                            <option value="<?= $p['id_role']; ?>"><?= $p['ket_role']; ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Pilih Tahun Rekrutmen</label>
                    <div class="select2-input">
                      <select id="tahun_rekrutmen" name="tahun_rekrutmen" class="form-control">
                        <option value="">Pilih Tahun Rekrutmen</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-10" id="unit_rekrutmen">
                  <div class="form-group">
                    <label>Pilih Unit</label>
                    <div class="select2-input">
                      <select id="kebutuhan_unit_id" name="kebutuhan_unit_id" class="form-control ">
                        <option value="">Pilih Unit</option>
                        <?php foreach ($unit as $u) : ?>
                          <?php if ($u['id_unit'] != 1) : ?>
                            <option value="<?= $u['id_unit']; ?>"><?= $u['nama_unit']; ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-lg-10" id="mapel_rekrutmen">
                  <div class="form-group">
                    <label>Pilih Mata Pelajaran</label>
                    <div class="select2-input">
                      <select id="kebutuhan_mapel_id" name="kebutuhan_mapel_id" class="form-control">
                        <option value="">Pilih Mata Pelajaran</option>
                        <?php foreach ($mapel as $m) : ?>
                          <option value="<?= $m['id_mapel_guru']; ?>"><?= $m['mata_pelajaran']; ?></option>
                        <?php endforeach; ?>
                      </select>
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
      </form>

      <div class="col-lg-12">
        <div class="card">
          <div class="card-header card-secondary">
            <h4 class="card-title">Tabel <?= $title; ?></h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="kebutuhan_rek">
                <thead class="text-white text-center" style="background-color: green;">
                  <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Posisi</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php $no = 1;
                  foreach ($kebutuhan_rekrutmen as $kr) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $kr['tahun_rekrutmen']; ?></td>
                      <td><?= $kr['ket_role']; ?></td>
                      <?php if ($kr['id_unit']) : ?>
                        <td><?= $kr['nama_unit']; ?></td>
                      <?php elseif ($kr['id_mapel_guru']) : ?>
                        <td><?= $kr['mata_pelajaran']; ?></td>
                      <?php endif; ?>
                      <td><button class="btn btn-icon btn-round btn-danger btn-xs hapus-kebrek" data-id="<?= $kr['id_kebutuhan_rekrutmen']; ?>">
                          <i class="fas fa-trash"></i>
                        </button></td>
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
</div>