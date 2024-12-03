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
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-secondary">
            <div class="d-flex align-items-center">
              <h4 class="card-title"><?= $title; ?></h4>
              <button class="btn btn-light btn-round btn-sm ml-auto" data-toggle="modal" data-target="#tambahSeleksi">
                <i class="fa fa-plus"></i>
                Tambah Tahap Rekrutmen
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="tableSeleksi">
                <thead style="background-color: green;">
                  <tr class="text-center text-white">
                    <th>No</th>
                    <th>Nama Tahapan Seleksi</th>
                    <th>Waktu Pelaksanaan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($tahap_rekrutmen as $tr) : ?>
                    <?php if ($tr['id_tahap_rekrutmen'] == 1) : ?>
                      <tr>
                        <td class="text-center"><?= $i; ?></td>
                        <td><?= $tr['tahap_rekrutmen']; ?></td>
                        <td class="text-center">
                          <span class="badge badge-info"> Tidak ada Keterangan waktu untuk Tahap ini.</span>
                        </td>
                        <td class="text-center">
                          <span class="badge badge-info"> Tidak ada aksi untuk Tahap ini.</span>
                        </td>
                      </tr>
                    <?php else : ?>
                      <tr>
                        <td class="text-center"><?= $i; ?></td>
                        <td><?= $tr['tahap_rekrutmen']; ?></td>
                        <td class="text-center"><?= tanggal_indonesia_format($tr['jadwal_tahap']); ?> - <?= $tr['waktu_pelaksanaan']; ?> WIB</td>
                        <td class="text-center">
                          <button type="button" class="btn btn-xs btn-info btn-round" data-toggle="modal" data-target="#editSeleksi<?= $tr['id_tahap_rekrutmen']; ?>"><i class="fa fa-edit"></i> Edit</button>
                          <button type="button" class="btn btn-xs btn-danger btn-round hapus-seleksi" data-id="<?= $tr['id_tahap_rekrutmen']; ?>"><i class="fa fa-times"></i> Hapus</button>
                        </td>
                      </tr>
                    <?php endif; ?>
                  <?php $i++;
                  endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Tambah Tahapan Seleksi -->
          <div class="modal fade" id="tambahSeleksi" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header no-bd bg-secondary">
                  <h5 class="modal-title">
                    <span class="fw-mediumbold">
                      Tambah Tahap Rekrutmen</span>
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?= base_url('menurekrutmen/tahap_rekrutmen') ?>" method="post">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="largeInput">Nama Tahap Seleksi</label>
                          <input type="text" class="form-control form-control" id="tahap_rekrutmen" name="tahap_rekrutmen" autocomplete="off" placeholder="Nama Tahap Seleksi." value="<?= set_value('tahap_rekrutmen'); ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Jadwal Pelaksanaan</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="jadwal_tahap" name="jadwal_tahap">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="fa fa-calendar-check"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Waktu Pelaksanaan</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="waktu_pelaksanaan" name="waktu_pelaksanaan">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="fa fa-clock"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Keterangan Tahap Seleksi</label>
                          <textarea class="form-control" id="ket_tahap" name="ket_tahap" autocomplete="off" placeholder="Isi Keterangan Seleksi"><?= set_value('ket_tahap'); ?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-success">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Edit Tahapan Seleksi -->
          <?php foreach ($tahap_rekrutmen as $tr) : ?>
            <div class="modal fade" id="editSeleksi<?= $tr['id_tahap_rekrutmen']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header no-bd bg-secondary">
                    <h5 class="modal-title">
                      <span class="fw-mediumbold">
                        Tambah Tahap Rekrutmen</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="<?= base_url('menurekrutmen/edit_tahap_rekrutmen/') . $tr['id_tahap_rekrutmen'] ?>" method="post">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="largeInput">Nama Tahap Seleksi</label>
                            <input type="text" class="form-control form-control" id="tahap_rekrutmen_edit" name="tahap_rekrutmen_edit" autocomplete="off" placeholder="Nama Tahap Seleksi." value="<?= $tr['tahap_rekrutmen']; ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Jadwal Pelaksanaan</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="jadwal_tahap_edit<?= $tr['id_tahap_rekrutmen']; ?>" name="jadwal_tahap_edit" value="<?= $tr['jadwal_tahap']; ?>">
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="fa fa-calendar-check"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Waktu Pelaksanaan</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="waktu_pelaksanaan_edit<?= $tr['id_tahap_rekrutmen']; ?>" name="waktu_pelaksanaan_edit" value="<?= $tr['waktu_pelaksanaan']; ?>">
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <i class="fa fa-clock"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Keterangan Tahap Seleksi</label>
                            <textarea class="form-control" id="ket_tahap_edit" name="ket_tahap_edit" autocomplete="off" placeholder="Isi Keterangan Seleksi"><?= $tr['ket_tahap']; ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer no-bd">
                      <button type="submit" class="btn btn-success">Ubah</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>

  </div>
</div>