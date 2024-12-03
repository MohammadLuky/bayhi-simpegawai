<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row"></div>

    <div class="content-body">

      <div id="user-profile">
        <div class="row">
          <div class="col-sm-12 col-xl-8">
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
                      <?php endif; ?>
                      )</span>
                  <?php endif; ?>
                </h3>
                <p class="white">
                  <span class="text-white h4"><strong>ALAMAT KTP :</strong></span><br>
                  <i class="fas fa-map-marker-alt"> </i> <strong><?= strtoupper($individu['alamat']); ?> KELURAHAN <?= $individu['nama_kelurahan_pelamar']; ?><br>
                    KECAMATAN <?= $individu['nama_kecamatan_pelamar']; ?> <?= $individu['nama_kotakab_pelamar']; ?></strong>
                </p>
                <p class="white">
                  <span class="text-white h4"><strong>ALAMAT DOMISILI :</strong></span><br>
                  <i class="fas fa-map-marker-alt"> </i> <strong><?= strtoupper($individu['alamat_domisili']); ?> KELURAHAN <?= $individu['nama_kelurahan_domisili']; ?><br>
                    KECAMATAN <?= $individu['nama_kecamatan_domisili']; ?> <?= $individu['nama_kotakab_domisili']; ?></strong>
                </p>

              </div>
            </div>
          </div>
          <div class="col-sm-12 col-xl-4 justify-content-end">
            <div class="media d-flex m-1 ">
              <a href="<?= base_url('datapelamar/editdata_pelamar/' . $individu['id_pegawai']); ?>" data-toggle="tooltip" data-placement="top" title="Edit Data Pelamar" class="btn btn-icon round btn-dark box-shadow-1 mr-1 mb-1"><i class="fas fa-edit"></i></a>
              <a href="<?= base_url('datapelamar/print_cv_individu/') . $individu['id_pegawai'] ?>" data-toggle="tooltip" data-placement="top" title="Print CV" class="btn btn-icon round btn-primary box-shadow-1 mr-1 mb-1" target="_blank"><i class="fas fa-print"></i></a>
              <a href="<?= base_url('datapelamar/daftar_pelamar'); ?>" data-toggle="tooltip" data-placement="top" title="Daftar Pelamar" class="btn btn-icon round btn-warning box-shadow-1 mr-1 mb-1"><i class="fas fa-arrow-circle-left"></i></a>
              <button data-toggle="tooltip" data-placement="top" title="Validasi Pelamar" class="btn btn-icon round btn-success box-shadow-1 mr-1 mb-1 valid-pelamar" data-id="<?= $individu['id_pegawai']; ?>" data-nama="<?= $individu['nama_lengkap']; ?>"><i class="fas fa-check-circle"></i></button>
            </div>
          </div>

          <!-- Modal Validasi -->
          <div class="modal fade text-left" id="validasiPelamar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="<?= base_url('datapelamar/diterima_pegawai') ?>" method="post">
                <div class="modal-content">
                  <div class="modal-header bg-info white">
                    <h4 class="modal-title white" id="myModalLabel9"><i class="fas fa-plus-circle"></i> Validasi Pelamar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="pelamar_id_validasi" id="pelamar_id_validasi">
                    <div class="alert alert-info mb-2" role="alert">
                      <p>Apakah <strong id="nama_pelamar_valid"></strong> akan resmi menjadi pegawai/guru Bayt Alhikmah tahun <strong><?= date('Y'); ?></strong>?</p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-success">Ya, Diterima.</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-3 col-lg-5 col-md-12">
            <div class="card">
              <div class="card-header pb-0">
                <div class="card-title-wrap bar-primary">
                  <div class="card-title">Detail Profile</div>
                  <!-- <div class="card-title">Detail Profile <a href="" class="btn btn-warning btn-sm btn-round" data-toggle="tooltip" data-placement="top" title="Edit Data Pelamar"><i class="fas fa-edit"></i></a></div> -->
                  <hr>
                </div>
              </div>
              <div class="card-content">
                <div class="card-body p-0 pt-0 pb-1">
                  <ul>
                    <li class="mb-2">
                      <strong>Tanggal Lahir</strong><br>
                      <?php if ($individu['tanggal_lahir'] == '') : ?>
                        <span class="text-danger">0</span>
                      <?php else : ?>
                        <?= strtoupper($individu['tempat_lahir']); ?>, <?= tanggal_indonesia_format($individu['tanggal_lahir']); ?>
                      <?php endif; ?>
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
                  <div class="card-title">Lampiran Berkas</div>
                  <hr>
                </div>
              </div>
              <div class="card-content">
                <div class="card-body p-0 pt-0 pb-1">
                  <ul>
                    <?php if ($berkas_pelamar['file_lamaran_pdf'] != '') : ?>
                      <a href="<?= base_url('assets/file_berkas/'); ?><?= $berkas_pelamar['file_lamaran_pdf']; ?>" class="badge badge-success mb-2" target="_blank"><i class="fas fa-file-pdf"></i> File Lamaran</a>
                    <?php else : ?>
                      <span class="badge badge-danger mb-2">Belum Upload Berkas Lamaran</span>
                    <?php endif; ?>
                    <br>
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
                    <br>
                    <?php if ($berkas_pelamar['file_komitmen_pdf'] != '') : ?>
                      <a href="<?= base_url('assets/file_berkas/'); ?><?= $berkas_pelamar['file_komitmen_pdf']; ?>" class="badge badge-success mb-2" target="_blank"><i class="fas fa-file-pdf"></i> File Surat Komitmen</a>
                    <?php else : ?>
                      <span class="badge badge-danger mb-2">Belum Upload Berkas Komitmen</span>
                    <?php endif; ?>
                    <br>
                    <?php if ($berkas_pelamar['file_sertifikat_pdf'] != '') : ?>
                      <a href="<?= base_url('assets/file_berkas/'); ?><?= $berkas_pelamar['file_sertifikat_pdf']; ?>" class="badge badge-success mb-2" target="_blank"><i class="fas fa-file-pdf"></i> File Sertifikat</a>
                    <?php else : ?>
                      <span class="badge badge-danger mb-2">Belum Upload Berkas Sertifikat</span>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
            </div>

          </div>
          <div class="col-xl-9 col-lg-7 col-md-12">

            <?php if ($individu['progres_lamaran'] == 1) : ?>
              <div class="col-lg-12 col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Input Seleksi Pelamar</h4>
                  </div>
                  <div class="card-block">
                    <form action="<?= base_url('datapelamar/data_individu/') . $individu['id_pegawai'] ?>" method="POST">
                      <div class="card-body">
                        <div class="row">
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
              </div>
            <?php endif; ?>

            <!--Project Timeline div starts-->
            <div class="card">

              <ul class="nav nav-tabs mb-2 mt-2 ml-2">
                <li class="nav-item">
                  <a class="nav-link" id="riwayatpenunjang-tab" data-toggle="tab" href="#penunjang" aria-controls="penunjang" aria-expanded="true"><i class="fas fa-folder-open"></i> Riwayat Penunjang</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="riwayatseleksi-tab" data-toggle="tab" href="#seleksi" aria-controls="seleksi" aria-expanded="false"><i class="fas fa-folder-open"></i> Riwayat Seleksi Pelamar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="riwayatnilai-tab" data-toggle="tab" href="#nilai" aria-controls="nilai" aria-expanded="false"><i class="fas fa-folder-open"></i> Riwayat Penilaian Pelamar</a>
                </li>
              </ul>

              <div class="tab-content px-1 pt-1">
                <div role="tabpanel" class="tab-pane" id="penunjang" aria-labelledby="riwayatpenunjang-tab" aria-expanded="true">
                  <div class="card-header">
                    <div class="card-title-wrap bar-primary">
                      <div class="card-title">Riwayat Penunjang Pelamar</div>
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

                      </div>
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="seleksi" aria-labelledby="riwayatseleksi-tab" aria-expanded="true">
                  <div class="card-header">
                    <div class="card-title-wrap bar-primary">
                      <div class="card-title">Riwayat Seleksi Pelamar</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="card-block">

                      <!-- <div class="card text-white bg-primary text-center">
                        <div class="card-content">
                          <div class="card-body pt-3">

                          </div>
                        </div>
                      </div> -->

                      <table class="table display nowrap table-striped table-bordered zero-configuration">
                        <thead class="text-white text-center" style="background-color: green;">
                          <tr>
                            <th>No</th>
                            <th>Tahap Seleksi</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                          foreach ($history_seleksi as $history) : ?>
                            <tr>
                              <td class="text-center"><?= $i; ?></td>
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
                            </tr>
                          <?php $i++;
                          endforeach; ?>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="nilai" aria-labelledby="riwayatnilai-tab" aria-expanded="true">
                  <div class="card-header">
                    <div class="card-title-wrap bar-primary">
                      <div class="card-title">Riwayat Penilaian Pelamar</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <span class="text-danger">* Perlu Koordinasi terlebih dahulu untuk pengembangan fitur tersebut.</span>
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