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

    <div class="page-inner mt--5">

      <!-- <div class="col-md-6">
        <div class="card">
          <div class="card-header card-warning">
            <h4 class="card-title">Filter Data Pelamar</h4>
          </div>
          <div class="card-body">
            <div class="col-md-10">
              <div class="form-group">
                <label>Tahun Rekrutmen</label>
                <div class="select2-input">
                  <select id="tahun_rekrutmen" name="tahun_rekrutmen" class="form-control <?= (form_error('tahun_rekrutmen') != '') ? 'is-invalid' : ''; ?>">
                    <option value="">Pilih Tahun Rekrutmen</option>
                  </select>
                  <div class="invalid-feedback"><?= form_error('tahun_rekrutmen'); ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->

      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-secondary">
            <div class="card-head-row">
              <h4 class="card-title">Daftar Pelamar</h4>
              <div class="card-tools">
                <a href="<?= base_url('datapelamar/rekap_pelamar') ?>" class="btn btn-light btn-sm btn-round">
                  <span class="btn-label">
                    <i class="fas fa-file-excel"></i>
                  </span>
                  Download
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="row table-responsive">
              <table class="display table table-striped table-hover" id="daftar_pegawai">
                <thead style="background-color: green;" class="text-white text-center">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pelamar</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Unit Dilamar</th>
                    <th scope="col">Pendidikan Terakhir</th>
                    <th scope="col">Nama Sekolah</th>
                    <th scope="col">IPK</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($pelamarAll as $pa) : ?>
                    <?php if (empty($pa)) : ?>
                      <tr>
                        <td colspan="5"><span class="text-danger">Data Tidak Ditemukan.</span></td>
                      </tr>
                    <?php else : ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= strtoupper($pa['nama_lengkap']); ?></td>
                        <?php if ($pa['alamat'] == '') : ?>
                          <td><span class="badge badge-danger">Belum Mengisi Alamat</span></td>
                        <?php else : ?>
                          <td><?= strtoupper($pa['alamat']); ?> KELURAHAN <?= $pa['nama_kelurahan']; ?> KECAMATAN <?= $pa['nama_kecamatan']; ?> <?= $pa['nama_kota_kab']; ?></td>
                        <?php endif; ?>
                        <?php if ($pa['role_id'] != 8) : ?>
                          <?php if ($pa['unit_kerja_id'] == 1) : ?>
                            <td class="text-center">
                              <span class="badge badge-danger">Belum Mengisi Posisi</span>
                            </td>
                          <?php else : ?>
                            <td class="text-center">UNIT <?= $pa['nama_unit']; ?></td>
                          <?php endif; ?>
                        <?php elseif ($pa['role_id'] == 8) : ?>
                          <?php if ($pa['ket_guru_id'] != NULL) : ?>
                            <td class="text-center"><?= $pa['ket_role']; ?> <?= $pa['mata_pelajaran']; ?></td>
                          <?php else : ?>
                            <td class="text-center">
                              <span class="badge badge-danger">Belum Mengisi Mata Pelajaran</span>
                            </td>
                          <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($pa['pend_aktif_id'] == 0) : ?>
                          <td class="text-center">
                            <span class="badge badge-danger">Belum Memilih Pendidikan Terakhir</span>
                          </td>
                          <td class="text-center">
                            <span class="badge badge-danger">Belum Memilih Sekolah Terakhir</span>
                          </td>
                          <td class="text-center">
                            <span class="badge badge-danger">IPK Tidak Ada</span>
                          </td>
                        <?php else : ?>
                          <td class="text-center"><?= $pa['tingkat_pendidikan']; ?> <?= $pa['program_studi']; ?></td>
                          <td class="text-center"><?= $pa['instansi_pendidikan']; ?></td>
                          <td class="text-center"><?= $pa['ipk']; ?></td>
                        <?php endif; ?>
                        <?php if ($pa['tanggal_lahir'] == '') : ?>
                          <td class="text-center">
                            <span class="badge badge-danger">Belum Mengisi Tanggal Lahir</span>
                          </td>
                        <?php else : ?>
                          <td class="text-center"><?= calculate_age($pa['tanggal_lahir']); ?> Tahun</td>
                        <?php endif; ?>
                        <td class="text-center">
                          <a href="">
                            <a href="<?= base_url('datapelamar/data_individu/') . $pa['id_pegawai'] ?>" class="badge badge-info mb-1"><i class="fas fa-eye"></i> Lihat Data</a>
                          </a>
                          <!-- <a href="">
                            <span class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</span>
                          </a> -->
                        </td>
                      </tr>
                    <?php endif; ?>
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