<div class="content">
  <div class="page-inner">
    <div class="page-header mb-5">
      <h4 class="page-title"><?= $title; ?></h4>
      <ul class="breadcrumbs">
        <li class="nav-home">
          <a href="<?= base_url('home_pelamar') ?>">
            <i class="fas fa-home"></i>
          </a>
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
      <?php if ($pelamar['progres_lamaran'] == 1) : ?>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-header card-info">
              <h4 class="card-title"><i class="fas fa-info-circle"></i> Informasi</h4>
            </div>
            <div class="card-body">
              <p>
                <strong>
                  <h4>Terimakasih telah melengkapi data rekrutmen anda.</h4>
                </strong>
              </p>
              <p>
                Selalu cek update informasi pada laman Home aplikasi E-Rekrutmen Yayasan Pondok Pesantren Bayt Al-Hikmah Pasuruan.
              </p>
              <a href="<?= base_url('home_pelamar') ?>" class="btn btn-round btn-sm btn-success">
                <span class="btn-label">
                  <i class="fas fa-home"></i>
                </span>
                Halaman Home
              </a>
            </div>
          </div>
        </div>
      <?php elseif ($pelamar['progres_lamaran'] == 99) : ?>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-header card-danger">
              <h4 class="card-title"><i class="fas fa-info-circle"></i> Informasi</h4>
            </div>
            <div class="card-body">
              <p>
              <h4>Kami Mohon Maaf dan Terimakasih telah berpartisipasi pada Rekrutmen Bersama Yayasan Pondok Pesantren Bayt Alhikmah Pasuruan.</h4>
              </p>
              <p>
                Jangan Patah Semangat dan tetaplah berusaha.
              </p>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-secondary">
            <div class="card-head-row">
              <div class="card-title">Curriculum Vitae</div>
              <?php if ($pelamar['progres_lamaran'] == 0) : ?>
                <div class="card-tools">
                  <button class="btn btn-light btn-round btn-sm ml-auto" data-toggle="modal" data-target="#validasiKirimLamaran">
                    <span class="btn-label">
                      <i class="fas fa-paper-plane"></i>
                    </span>
                    Kirim Lamaran
                  </button>
                </div>
              <?php else : ?>
                <div class="card-tools">
                  <a href="<?= base_url('riwayathidup/print_cv') ?>" target="_blank" class="btn btn-light btn-sm btn-round">
                    <span class="btn-label">
                      <i class="fas fa-print"></i>
                    </span>
                    Print
                  </a>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <div class="modal fade" id="validasiKirimLamaran" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header no-bd bg-secondary">
                  <h5 class="modal-title">
                    <span class="fw-mediumbold">
                      Validasi Kirim Lamaran</span>
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?= base_url('riwayathidup/kirim_lamaran') ?>" method="post">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <p class="h4">Dokumen Validasi. </p>
                        <table class="table table-bordered">
                          <thead style="background-color: teal;" class="text-white text-center">
                            <tr>
                              <th>Keterangan Dokumen</th>
                              <th>Validasi Dokumen</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="text-center">
                              <td>Ijazah</td>
                              <?php if ($pelamar['pend_aktif_id']): ?>
                                <td><span class="btn btn-round btn-sm btn-success"><i class="fas fa-check-circle"></i></span></td>
                              <?php else: ?>
                                <td><span class="btn btn-round btn-sm btn-danger"><i class="fas fa-times-circle"></i></span></td>
                              <?php endif; ?>
                            </tr>
                            <tr class="text-center">
                              <td>Alamat KTP</td>
                              <?php if ($pelamar['alamat']): ?>
                                <td><span class="btn btn-round btn-sm btn-success"><i class="fas fa-check-circle"></i></span></td>
                              <?php else: ?>
                                <td><span class="btn btn-round btn-sm btn-danger"><i class="fas fa-times-circle"></i></span></td>
                              <?php endif; ?>
                            </tr>
                            <tr class="text-center">
                              <td>Alamat Domisili</td>
                              <?php if ($pelamar['alamat_domisili']): ?>
                                <td><span class="btn btn-round btn-sm btn-success"><i class="fas fa-check-circle"></i></span></td>
                              <?php else: ?>
                                <td><span class="btn btn-round btn-sm btn-danger"><i class="fas fa-times-circle"></i></span></td>
                              <?php endif; ?>
                            </tr>
                            <tr class="text-center">
                              <td>Usia</td>
                              <?php if (empty($pelamar['tanggal_lahir'])): ?>
                                <td><span class="btn btn-round btn-sm btn-danger"><i class="fas fa-times-circle"></i></span>
                                  <p><code>Tanggal Lahir Belum diisi.</code></p>
                                </td>
                              <?php else: ?>
                                <?php if (calculate_age($pelamar['tanggal_lahir']) >= 36): ?>
                                  <td><span class="btn btn-round btn-sm btn-danger"><i class="fas fa-times-circle"></i></span>
                                    <p><code>Usia melebihi ketentuan.</code></p>
                                  </td>
                                <?php else: ?>
                                  <td><span class="btn btn-round btn-sm btn-success"><i class="fas fa-check-circle"></i></span></td>
                                <?php endif; ?>
                              <?php endif; ?>
                            </tr>
                            <tr class="text-center">
                              <td>Dokumen Surat Komitmen</td>
                              <?php if ($berkas_pelamar['file_komitmen_pdf']): ?>
                                <td><span class="btn btn-round btn-sm btn-success"><i class="fas fa-check-circle"></i></span></td>
                              <?php else: ?>
                                <td><span class="btn btn-round btn-sm btn-danger"><i class="fas fa-times-circle"></i></span></td>
                              <?php endif; ?>
                            </tr>
                            <tr class="text-center">
                              <td>Dokumen Surat Kesehatan</td>
                              <?php if ($berkas_pelamar['file_suket_sehat_pdf']): ?>
                                <td><span class="btn btn-round btn-sm btn-success"><i class="fas fa-check-circle"></i></span></td>
                              <?php else: ?>
                                <td><span class="btn btn-round btn-sm btn-danger"><i class="fas fa-times-circle"></i></span></td>
                              <?php endif; ?>
                            </tr>
                            <tr class="text-center">
                              <td>File Foto</td>
                              <?php if ($pelamar['foto'] != 'akun.jpg'): ?>
                                <td>
                                  <span class="btn btn-round btn-sm btn-success"><i class="fas fa-check-circle"></i></span>
                                </td>
                              <?php else: ?>
                                <td><span class="btn btn-round btn-sm btn-danger"><i class="fas fa-times-circle"></i></span></td>
                              <?php endif; ?>
                            </tr>
                          </tbody>
                        </table>

                        <p class="h4">Apakah anda yakin akan mengirim lamaran dan data anda telah sesuai? </p>
                        <p><code>* Bila anda menekan kirim data tidak bisa diubah.</code></p>

                      </div>
                      <?php if (!empty($tahap_rekrutmen)) : ?>
                        <?php foreach ($tahap_rekrutmen as $seleksi) : ?>
                          <div class="form-group">
                            <input type="hidden" class="form-control" value="<?= $seleksi['tahap_rekrutmen']; ?>">
                            <input type="hidden" class="form-control" value="<?= $seleksi['id_tahap_rekrutmen']; ?>" name="input_id_tahap" id="input_id_tahap">
                          </div>
                        <?php endforeach; ?>
                      <?php else : ?>
                        <input type="hidden" value="Tidak ada Tahap Kedua" readonly>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="modal-footer no-bd">
                    <?php if ($pelamar['pend_aktif_id'] && $pelamar['alamat'] && calculate_age($pelamar['tanggal_lahir']) <= 35 && $berkas_pelamar['file_komitmen_pdf'] && $berkas_pelamar['file_suket_sehat_pdf'] && $pelamar['foto'] != 'akun.jpg'): ?>
                      <button type="submit" class="btn btn-success">Kirim</button>
                    <?php else: ?>
                      <button type="submit" class="btn btn-success" disabled>Kirim</button>
                    <?php endif; ?>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-header" style="background-image: url('<?= base_url('assets/manage/') ?>img/blogpost.jpg')">
                    <div class="profile-picture">
                      <div class="avatar avatar-xxl">
                        <img src="<?= base_url('assets/file_foto/') ?><?= $pelamar['foto']; ?>" alt="..." class="avatar-img rounded-circle">
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="user-profile text-center">
                      <div class="name"><?= strtoupper($pelamar['nama_lengkap']); ?></div>
                      <?php if ($pelamar['role_id'] == 7) : ?>
                        <div class="job"><?= strtoupper($pelamar['ket_role']); ?> | <?= strtoupper($pelamar['nama_unit']); ?></div>
                      <?php elseif ($pelamar['role_id'] == 8) : ?>
                        <div class="job"><?= strtoupper($pelamar['ket_role']); ?> |
                          <?php if ($pelamar['ket_guru_id'] == 0) : ?>
                            <span class="badge badge-danger"> Belum Memilih Mata Pelajaran </span>
                          <?php else : ?>
                            <?= strtoupper($pelamar['mata_pelajaran']); ?>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>
                      <hr>
                      <div class="job">Tempat Tanggal Lahir</div>
                      <?php if ($pelamar['tanggal_lahir'] == '') : ?>
                        <div class="desc"><strong><span class="text-danger">0</span></strong></div>
                      <?php else : ?>
                        <div class="desc"><strong><?= strtoupper($pelamar['tempat_lahir']); ?>, <?= tanggal_indonesia_format($pelamar['tanggal_lahir']); ?></strong></div>
                      <?php endif; ?>
                      <hr>
                      <div class="job">Alamat KTP</div>
                      <div class="desc"><strong><?= strtoupper($pelamar['alamat']); ?> KELURAHAN <?= $pelamar['nama_kelurahan_pelamar']; ?> KECAMATAN <?= $pelamar['nama_kecamatan_pelamar']; ?> <?= $pelamar['nama_kotakab_pelamar']; ?></strong></div>
                      <hr>
                      <div class="job">Alamat Domisili</div>
                      <div class="desc"><strong><?= strtoupper($pelamar['alamat_domisili']); ?> KELURAHAN <?= $pelamar['nama_kelurahan_domisili']; ?> KECAMATAN <?= $pelamar['nama_kecamatan_domisili']; ?> <?= $pelamar['nama_kotakab_domisili']; ?></strong></div>
                      <hr>
                      <div class="job">Jenis Kelamin</div>
                      <div class="desc"><strong><?= strtoupper($pelamar['jenis_kelamin']); ?></strong></div>
                      <hr>
                      <div class="job">Agama</div>
                      <div class="desc"><strong><?= strtoupper($pelamar['nama_agama']); ?></strong></div>
                      <hr>
                      <div class="job">Status Perkawinan</div>
                      <div class="desc"><strong><?= strtoupper($pelamar['status_perkawinan']); ?></strong></div>
                      <hr>
                      <div class="job">Nomor WA/Telp Aktif</div>
                      <div class="desc"><strong><?= strtoupper($pelamar['no_wa_telp']); ?></strong></div>
                      <hr>
                      <div class="job">Email</div>
                      <div class="desc"><strong><?= $pelamar['email_pegawai']; ?></strong></div>
                      <hr>
                      <div class="job">Lampiran Berkas</div>
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
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-8">
                <div class="accordion accordion-secondary">

                  <div class="card">
                    <div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour" role="button">
                      <div class="span-icon">
                        <div class="fas fa-graduation-cap"></div>
                      </div>
                      <div class="span-title">
                        Riwayat Pendidikan
                      </div>
                      <div class="span-mode"></div>
                    </div>

                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion" role="button">
                      <div class="card-body">

                        <div class="row">
                          <div class="col-md-12">
                            <ul class="timeline">
                              <?php foreach ($riwayat_pendidikan as $index => $pend) : ?>
                                <li class="<?php echo $index % 2 == 0 ? '' : 'timeline-inverted'; ?>">
                                  <div class="timeline-badge warning"> <i class="fas fa-graduation-cap"></i></div>
                                  <div class="timeline-panel">
                                    <div class="timeline-heading">
                                      <h4 class="timeline-title"><strong><?= strtoupper($pend['instansi_pendidikan']); ?></strong></h4>
                                    </div>
                                    <div class="timeline-body">
                                      <p><?= strtoupper($pend['tingkat_pendidikan']); ?> - <?= strtoupper($pend['program_studi']); ?></p>
                                      <p>LULUS TAHUN <?= $pend['tahun_lulus']; ?></p>
                                    </div>
                                  </div>
                                </li>
                              <?php endforeach; ?>
                            </ul>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour" role="button">
                      <div class="span-icon">
                        <div class="fas fa-briefcase"></div>
                      </div>
                      <div class="span-title">
                        Riwayat Pekerjaan
                      </div>
                      <div class="span-mode"></div>
                    </div>

                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion" role="button">
                      <div class="card-body">

                        <div class="row">
                          <div class="col-md-12">
                            <ul class="timeline">
                              <?php foreach ($riwayat_pekerjaan as $index => $kerja) : ?>
                                <li class="<?php echo $index % 2 == 0 ? '' : 'timeline-inverted'; ?>">
                                  <div class="timeline-badge success"><i class="fas fa-briefcase"></i></div>
                                  <div class="timeline-panel">
                                    <div class="timeline-heading">
                                      <h4 class="timeline-title"><strong><?= strtoupper($kerja['tempat_kerja']); ?></strong></h4>
                                    </div>
                                    <div class="timeline-body">
                                      <p><?= strtoupper($kerja['posisi_pekerjaan']); ?> - SELAMA <?= ($kerja['tahun_akhir_bekerja'] - $kerja['tahun_awal_bekerja']); ?> TAHUN.</p>
                                      <p> <strong>DESKRIPSI PEKERJAAN :</strong>
                                        <?= strtoupper($kerja['deskripsi_pekerjaan']); ?>
                                      </p>
                                    </div>
                                  </div>
                                </li>
                              <?php endforeach; ?>
                            </ul>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour" role="button">
                      <div class="span-icon">
                        <div class="fas fa-user-tag"></div>
                      </div>
                      <div class="span-title">
                        Riwayat Organisasi
                      </div>
                      <div class="span-mode"></div>
                    </div>

                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion" role="button">
                      <div class="card-body">

                        <div class="row">
                          <div class="col-md-12">
                            <ul class="timeline">
                              <?php foreach ($riwayat_organisasi as $index => $organisasi) : ?>
                                <li class="<?php echo $index % 2 == 0 ? '' : 'timeline-inverted'; ?>">
                                  <div class="timeline-badge info"><i class="fas fa-user-tag"></i></div>
                                  <div class="timeline-panel">
                                    <div class="timeline-heading">
                                      <h4 class="timeline-title"><strong><?= strtoupper($organisasi['nama_organisasi']); ?></strong></h4>
                                    </div>
                                    <div class="timeline-body">
                                      <p>TINGKAT <?= strtoupper($organisasi['tingkatan']); ?> - MENJABAT SEBAGAI <strong><?= strtoupper($organisasi['jabatan']); ?></strong>.</p>
                                      <p> <strong>MASA JABATAN (TAHUN) :</strong></p>
                                      <p><?= $organisasi['tahun_awal_jabat']; ?> - <?= $organisasi['tahun_akhir_jabat']; ?>.</p>
                                    </div>
                                  </div>
                                </li>
                              <?php endforeach; ?>
                            </ul>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour" role="button">
                      <div class="span-icon">
                        <div class="fas fa-project-diagram"></div>
                      </div>
                      <div class="span-title">
                        Riwayat Proyek
                      </div>
                      <div class="span-mode"></div>
                    </div>

                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion" role="button">
                      <div class="card-body">

                        <div class="row">
                          <div class="col-md-12">
                            <ul class="timeline">
                              <?php foreach ($riwayat_proyek as $index => $proyek) : ?>
                                <li class="<?php echo $index % 2 == 0 ? '' : 'timeline-inverted'; ?>">
                                  <div class="timeline-badge secondary"><i class="fas fa-project-diagram"></i></div>
                                  <div class="timeline-panel">
                                    <div class="timeline-heading">
                                      <h4 class="timeline-title"><strong><?= strtoupper($proyek['nama_proyek']); ?></strong></h4>
                                    </div>
                                    <div class="timeline-body">
                                      <p>TINGKAT <?= strtoupper($proyek['tingkatan']); ?>.</p>
                                      <p> <strong>DESKRIPSI PROYEK :</strong>
                                        <?= strtoupper($proyek['deskripsi_proyek']); ?>.
                                      </p>
                                    </div>
                                  </div>
                                </li>
                              <?php endforeach; ?>
                            </ul>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>