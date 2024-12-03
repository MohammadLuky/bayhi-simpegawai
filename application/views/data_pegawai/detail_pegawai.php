<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div id="user-profile">
        <div class="row">
          <div class="col-sm-12 col-xl-10">
            <div class="media d-flex m-1 ">
              <div class="align-left p-1">
                <a href="#" class="profile-image">
                  <img src="<?= base_url('assets/file_foto/'); ?><?= $individu['foto']; ?>" class="rounded-circle img-border height-100" alt="Card image">
                </a>
              </div>
              <div class="media-body text-left  mt-1">
                <h3 class="font-large-1 white"><?= strtoupper($individu['nama_lengkap']); ?>
                  <?php if ($individu['role_id'] == 7) : ?>
                    <span class="font-medium-1 white">(<?= strtoupper($individu['ket_role']); ?> | <?= strtoupper($individu['nama_unit']); ?>)</span>
                  <?php elseif ($individu['role_id'] == 8) : ?>
                    <span class="font-medium-1 white">(<?= strtoupper($individu['ket_role']); ?> |
                      <?php if ($individu['ket_guru_id'] == 0) : ?>
                        <span class="badge badge-danger"> Belum Memilih Mata Pelajaran </span>
                      <?php else : ?>
                        <?= strtoupper($individu['mata_pelajaran']); ?>
                        <?php endif; ?>)</span>
                  <?php endif; ?>
                </h3>
                <p class="white">
                  <span class="text-white h4"><strong>ALAMAT KTP :</strong></span><br>
                  <i class="fas fa-map-marker-alt"> </i> <strong><?= strtoupper($individu['alamat']); ?> KELURAHAN <?= $individu['nama_kelurahan_pegawai']; ?><br>
                    KECAMATAN <?= $individu['nama_kecamatan_pegawai']; ?> <?= $individu['nama_kotakab_pegawai']; ?></strong>
                </p>
                <p class="white">
                  <span class="text-white h4"><strong>ALAMAT DOMISILI :</strong></span><br>
                  <i class="fas fa-map-marker-alt"> </i> <strong><?= strtoupper($individu['alamat_domisili']); ?> KELURAHAN <?= $individu['nama_kelurahan_domisili']; ?><br>
                    KECAMATAN <?= $individu['nama_kecamatan_domisili']; ?> <?= $individu['nama_kotakab_domisili']; ?></strong>
                </p>
                <!-- <p class="white text-bold-300 d-none d-sm-block">
                  <?php if ($individu['tanggal_lahir'] == '') : ?>
                    <strong><span class="text-danger">0</span></strong>
                  <?php else : ?>
                    <strong><?= strtoupper($individu['tempat_lahir']); ?>, <?= tanggal_indonesia_format($individu['tanggal_lahir']); ?></strong>
                  <?php endif; ?>
                </p> -->
                <!-- <ul class="list-inline">
                  <li class="pr-1 line-height-1">
                    <a href="#" class="font-medium-4 white ">
                      <span class="ft-facebook"></span>
                    </a>
                  </li>
                  <li class="pr-1 line-height-1">
                    <a href="#" class="font-medium-4 white ">
                      <span class="ft-twitter white"></span>
                    </a>
                  </li>
                  <li class="line-height-1">
                    <a href="#" class="font-medium-4 white ">
                      <span class="ft-instagram"></span>
                    </a>
                  </li>
                </ul> -->

              </div>
            </div>
          </div>
          <div class="col-sm-12 col-xl-2 justify-content-end">
            <div class="media d-flex m-1 ">
              <!-- <a href="<?= base_url('datapelamar/print_cv_individu/') . $individu['id_pegawai'] ?>" data-toggle="tooltip" data-placement="top" title="Print CV" class="btn btn-icon round btn-success box-shadow-1 mr-1 mb-1" target="_blank"><i class="fas fa-print"></i></a> -->
              <a href="<?= base_url('datapegawai'); ?>" data -toggle="tooltip" data-placement="top" title="Daftar Pelamar" class="btn btn-icon round btn-warning box-shadow-1 mr-1 mb-1"><i class="fas fa-arrow-circle-left"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-3 col-lg-5 col-md-12">
            <div class="card">
              <div class="card-header pb-0">
                <div class="card-title-wrap bar-primary">
                  <div class="card-title">Detail Profile</div>
                  <hr>
                </div>
              </div>
              <div class="card-content">
                <div class="card-body p-0 pt-0 pb-1">
                  <ul>
                    <li class="mb-2">
                      <strong>Tempat Tanggal Lahir</strong><br>
                      <?php if ($individu['tanggal_lahir'] == '') : ?>
                        0
                      <?php else : ?>
                        <?= strtoupper($individu['tempat_lahir']); ?>, <?= tanggal_indonesia_format($individu['tanggal_lahir']); ?>
                      <?php endif; ?>
                      <!-- <?= strtoupper($individu['jenis_kelamin']); ?> -->
                    </li>
                    <li class="mb-2">
                      <strong>Jenis Kelamin</strong><br>
                      <?= strtoupper($individu['jenis_kelamin']); ?>
                    </li>
                    <li class="mb-2">
                      <strong>Agama</strong><br>
                      <?= strtoupper($individu['nama_agama']); ?>
                    </li>
                    <li class="mb-2">
                      <strong>Status Perkawinan</strong><br>
                      <?= strtoupper($individu['status_perkawinan']); ?>
                    </li>
                    <li class="mb-2">
                      <strong>Nomor WA/Telp Aktif</strong><br>
                      <?= strtoupper($individu['no_wa_telp']); ?>
                    </li>
                    <li class="mb-2">
                      <strong>Email</strong><br>
                      <?= $individu['email_pegawai']; ?>
                    </li>

                  </ul>
                </div>
              </div>

            </div>
            <div class="card">
              <div class="card-header pb-0">
                <div class="card-title-wrap bar-primary">
                  <div class="card-title">Berkas - berkas</div>
                  <hr>
                </div>
              </div>
              <div class="card-content">
                <div class="card-body p-0 pt-0 pb-1">
                  <ul>
                    <?php if ($berkas_pelamar['file_ktp_pdf'] != '') : ?>
                      <a href="<?= base_url('assets/file_berkas/'); ?><?= $berkas_pelamar['file_ktp_pdf']; ?>" class="badge badge-success mb-2" target="_blank"><i class="fas fa-file-pdf"></i> File KTP</a>
                    <?php else : ?>
                      <span class="badge badge-danger mb-2">Belum Upload Berkas KTP</span>
                    <?php endif; ?>
                    <br>
                    <?php if ($berkas_pelamar['file_kk_pdf'] != '') : ?>
                      <a href="<?= base_url('assets/file_berkas/'); ?><?= $berkas_pelamar['file_kk_pdf']; ?>" class="badge badge-success mb-2" target="_blank"><i class="fas fa-file-pdf"></i> File KK</a>
                    <?php else : ?>
                      <span class="badge badge-danger mb-2">Belum Upload Berkas KK</span>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>

            </div>
          </div>
          <div class="col-xl-9 col-lg-7 col-md-12">
            <!--Project Timeline div starts-->
            <div id="timeline">
              <div class="card">

                <ul class="nav nav-tabs mb-2 mt-2 ml-2">
                  <li class="nav-item">
                    <a class="nav-link" id="keluarga-tab" data-toggle="tab" href="#keluarga" aria-controls="keluarga" aria-expanded="true"><i class="fas fa-user-friends"></i> Data Keluarga</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="riwayatpegawai-tab" data-toggle="tab" href="#riwayatpegawai" aria-controls="riwayatpegawai" aria-expanded="false"><i class="fas fa-folder-open"></i> Riwayat Pegawai</a>
                  </li>
                </ul>

                <div class="tab-content px-1 pt-1">
                  <div role="tabpanel" class="tab-pane" id="keluarga" aria-labelledby="keluarga-tab" aria-expanded="true">
                    <div class="card-header">
                      <div class="card-title-wrap bar-primary">
                        <div class="card-title">Data Keluarga</div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table display nowrap table-striped table-bordered zero-configuration">
                          <thead class="text-white text-center" style="background-color: green;">
                            <tr>
                              <th>No</th>
                              <th>NIK Keluarga</th>
                              <th>Nama Keluarga</th>
                              <th>Status Keluarga</th>
                              <th>Jenis Kelamin</th>
                              <th>Tempat Tanggal Lahir</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1;
                            foreach ($data_keluarga as $dk) : ?>
                              <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $dk['nik_anggota_keluarga']; ?></td>
                                <td><?= $dk['nama_anggota_keluarga']; ?></td>
                                <td><?= $dk['hubungan_pegawai']; ?></td>
                                <td><?= $dk['jenis_kelamin_anggota']; ?></td>
                                <td><?= $dk['tempat_lahir_anggota']; ?>,
                                  <?php if ($dk['tanggal_lahir_anggota'] != '') : ?>
                                    <?= tanggal_indonesia_format($dk['tanggal_lahir_anggota']); ?>
                                  <?php else : ?>
                                    <?= '' ?>
                                  <?php endif; ?>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="riwayatpegawai" aria-labelledby="riwayatpegawai-tab" aria-expanded="true">
                    <div class="card-header">
                      <div class="card-title-wrap bar-primary">
                        <div class="card-title">Timeline Riwayat</div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="card-block">
                        <div class="timeline">
                          <h4><strong>Riwayat Pendidikan</strong></h4>
                          <hr>
                          <ul class="list-unstyled base-timeline activity-timeline mt-3">
                            <?php foreach ($riwayat_pendidikan as $pend) : ?>
                              <li>
                                <div class="timeline-icon bg-warning">
                                  <i class="fas fa-graduation-cap font-medium-1"></i>
                                </div>
                                <div class="act-time">Lulus Tahun <br> <?= $pend['tahun_lulus']; ?></div>
                                <div class="base-timeline-info">
                                  <a href="#" class="text-warning text-uppercase line-height-2"><?= strtoupper($pend['instansi_pendidikan']); ?></a>
                                  <span class="d-block"><?= strtoupper($pend['tingkat_pendidikan']); ?> - <?= strtoupper($pend['program_studi']); ?> </span>
                                </div>
                              </li>
                            <?php endforeach; ?>
                          </ul>

                          <br>

                          <h4><strong>Riwayat Pekerjaan</strong></h4>
                          <hr>
                          <ul class="list-unstyled base-timeline activity-timeline mt-3">
                            <?php foreach ($riwayat_pekerjaan as $kerja) : ?>
                              <li>
                                <div class="timeline-icon bg-success">
                                  <i class="fas fa-briefcase font-medium-1"></i>
                                </div>
                                <div class="act-time"><?= ($kerja['tahun_akhir_bekerja'] - $kerja['tahun_awal_bekerja']); ?> TAHUN.</div>
                                <div class="base-timeline-info">
                                  <a href="#" class="text-success text-uppercase  line-height-2"><?= strtoupper($kerja['tempat_kerja']); ?> - <?= strtoupper($kerja['posisi_pekerjaan']); ?></a>
                                  <span class="d-block"><strong>DESKRIPSI PEKERJAAN :</strong>
                                    <?= strtoupper($kerja['deskripsi_pekerjaan']); ?></span>
                                </div>
                              </li>
                            <?php endforeach; ?>
                          </ul>

                          <br>

                          <h4><strong>Riwayat Organisasi</strong></h4>
                          <hr>
                          <ul class="list-unstyled base-timeline activity-timeline mt-3">
                            <?php foreach ($riwayat_organisasi as $organisasi) : ?>
                              <li>
                                <div class="timeline-icon bg-info">
                                  <i class="fas fa-user-tag font-medium-1"></i>
                                </div>
                                <div class="act-time">Periode <br> <?= $organisasi['tahun_awal_jabat']; ?> - <?= $organisasi['tahun_akhir_jabat']; ?></div>
                                <div class="base-timeline-info">
                                  <a href="#" class="text-info text-uppercase  line-height-2"><?= strtoupper($organisasi['nama_organisasi']); ?></a>
                                  <span class="d-block">TINGKAT <?= strtoupper($organisasi['tingkatan']); ?> - MENJABAT SEBAGAI <?= strtoupper($organisasi['jabatan']); ?>.</span>
                                </div>
                              </li>
                            <?php endforeach; ?>
                          </ul>

                          <br>

                          <h4><strong>Riwayat Proyek</strong></h4>
                          <hr>
                          <ul class="list-unstyled base-timeline activity-timeline mt-3">
                            <?php foreach ($riwayat_proyek as $proyek) : ?>
                              <li>
                                <div class="timeline-icon bg-danger">
                                  <i class="fas fa-project-diagram font-medium-1"></i>
                                </div>
                                <!-- <div class="act-time"><?= $organisasi['tahun_awal_jabat']; ?> - <?= $organisasi['tahun_akhir_jabat']; ?></div> -->
                                <div class="base-timeline-info">
                                  <a href="#" class="text-danger text-uppercase  line-height-2"><?= strtoupper($proyek['nama_proyek']); ?></a>
                                  <span class="d-block">
                                    <p>TINGKAT <?= strtoupper($proyek['tingkatan']); ?></p>
                                    <p> <strong>DESKRIPSI PROYEK :</strong>
                                      <?= strtoupper($proyek['deskripsi_proyek']); ?>
                                    </p>
                                  </span>
                                </div>
                              </li>
                            <?php endforeach; ?>
                          </ul>

                          <br>

                          <h4><strong>Riwayat Pelatihan</strong></h4>
                          <hr>
                          <!-- <ul class="list-unstyled base-timeline activity-timeline mt-3">
                        <?php foreach ($riwayat_proyek as $proyek) : ?>
                          <li>
                            <div class="timeline-icon bg-danger">
                              <i class="fas fa-project-diagram font-medium-1"></i>
                            </div>
                            <div class="base-timeline-info">
                              <a href="#" class="text-danger text-uppercase  line-height-2"><?= strtoupper($proyek['nama_proyek']); ?></a>
                              <span class="d-block">
                                <p>TINGKAT <?= strtoupper($proyek['tingkatan']); ?></p>
                                <p> <strong>DESKRIPSI PROYEK :</strong>
                                  <?= strtoupper($proyek['deskripsi_proyek']); ?>
                                </p>
                              </span>
                            </div>
                          </li>
                        <?php endforeach; ?>
                      </ul> -->

                          <br>

                          <h4><strong>Riwayat Karir</strong></h4>
                          <hr>
                          <table class="table display nowrap table-striped table-bordered zero-configuration">
                            <thead class="text-white text-center" style="background-color: green;">
                              <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                                <th>Unit</th>
                                <th>Tahun Periode</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1;
                              foreach ($riwayat_karir as $karir) : ?>
                                <tr>
                                  <td><?= $no++; ?></td>
                                  <td><?= $karir['nama_jabatan']; ?></td>
                                  <td><?= $karir['nama_unit']; ?></td>
                                  <td class="text-center"><?= $karir['tahun_pengabdian_awal']; ?> - <?= $karir['tahun_pengabdian_akhir']; ?></td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>

                          <br>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Project Timeline div ends-->
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>