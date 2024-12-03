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
              <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item"><a href="<?= base_url('menurekrutmen'); ?>"><?= $title; ?></a>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <?php if (validation_errors()) : ?>
      <div class="alert alert-danger alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong><?= validation_errors(); ?></strong>
      </div>
    <?php endif; ?>

    <div class="content-body">
      <!-- <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Input <?= $title; ?></h4>
          </div>
          <div class="card-block">
            <form action="<?= base_url('menurekrutmen/riwayat_rekrutmen') ?>" method="POST">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12 col-lg-12">
                    <div class="form-group">
                      <p class="text-bold-600 font-medium-2">
                        Pilih Pelamar
                      </p>
                      <select class="select2 form-control <?= (form_error('pegawai_id_hisrek') != '') ? 'is-invalid' : ''; ?>" id="pegawai_id_hisrek" name="pegawai_id_hisrek[]" multiple="multiple">
                        <option value="">Pilih Pelamar</option>
                        <?php foreach ($pelamarAll as $pelamar) : ?>
                          <option value="<?= $pelamar['id_pegawai']; ?>"><?= $pelamar['nama_lengkap']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"><?= form_error('pegawai_id_hisrek'); ?></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                      <p class="text-bold-600 font-medium-2">
                        Pilih Tahap Seleksi
                      </p>
                      <select class="select2 form-control <?= (form_error('tahap_id_hisrek') != '') ? 'is-invalid' : ''; ?>" id="tahap_id_hisrek" name="tahap_id_hisrek">
                        <option value="">Pilih Tahap Seleksi</option>
                        <?php foreach ($tahap_rekrutmen as $tahap) : ?>
                          <?php if ($tahap['id_tahap_rekrutmen'] != 1) : ?>
                            <option value="<?= $tahap['id_tahap_rekrutmen']; ?>"><?= $tahap['tahap_rekrutmen']; ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"><?= form_error('tahap_id_hisrek'); ?></div>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                      <p class="text-bold-600 font-medium-2">
                        Pilih Status
                      </p>
                      <select class="select2 form-control <?= (form_error('status_hisrek') != '') ? 'is-invalid' : ''; ?>" id="status_hisrek" name="status_hisrek">
                        <option value="">Pilih Status</option>
                        <?php foreach ($status_hisrek as $key => $value) : ?>
                          <option value="<?= $key; ?>"><?= $value; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"><?= form_error('status_hisrek'); ?></div>
                    </div>
                  </div>

                </div>
                <button class="btn btn-info" type="submit">Simpan Data</button>
              </div>
            </form>

          </div>
        </div>
      </div> -->
      <section id="horizontal">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><?= $title; ?></h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <!-- <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload" data-toggle="tooltip" data-placement="top" title="Refresh Data"><i class="fas fa-sync-alt"></i></a></li>
                  </ul>
                </div> -->
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <div class="table-responsive">
                    <table class="table display nowrap table-striped table-bordered zero-configuration">
                      <thead class="text-white text-center" style="background-color: green;">
                        <tr>
                          <th>No</th>
                          <th>Nama Pelamar</th>
                          <th>Tahap Seleksi</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach ($history_seleksi as $history) : ?>
                          <tr>
                            <td class="text-center"><?= $i; ?></td>
                            <td><?= strtoupper($history['nama_lengkap']); ?></td>
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
      </section>
    </div>
  </div>
</div>
<!-- END: Content-->