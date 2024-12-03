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
              <li class="breadcrumb-item"><a href="<?= base_url('datapelamar/daftar_pelamar'); ?>"><?= $title; ?></a>
              </li>
              <!-- <li class="breadcrumb-item active">Basic DataTables
                            </li> -->
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
      <section id="horizontal">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><?= $title; ?></h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a href="<?= base_url('datapelamar/rekap_pelamar') ?>" class="btn btn-icon btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Download Daftar Pelamar"><i class="fas fa-file-download"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <div class="table-responsive">
                    <table class="table display nowrap table-striped table-bordered zero-configuration">
                      <thead class="text-white text-center" style="background-color: green;">
                        <tr>
                          <th>No</th>
                          <th>Nama Pelamar</th>
                          <th>Alamat KTP</th>
                          <th>Unit Dilamar</th>
                          <th>Pendidikan Terakhir</th>
                          <th>Nama Sekolah</th>
                          <th>IPK</th>
                          <th>Umur</th>
                          <th>Aksi</th>
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
                                  <a href="<?= base_url('datapelamar/data_individu/') . $pa['id_pegawai'] ?>" class="badge badge-info mb-1" target="_blank"><i class="fas fa-eye"></i> Lihat Data</a>
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
      </section>
    </div>
  </div>
</div>
<!-- END: Content-->