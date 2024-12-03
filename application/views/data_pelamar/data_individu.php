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
          <a href="<?= base_url('datapelamar/daftar_pelamar') ?>">Daftar Pelamar</a>
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
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-secondary">
            <div class="card-head-row">
              <div class="card-title">Curriculum Vitae</div>
              <div class="card-tools">
                <a href="<?= base_url('datapelamar/print_cv_individu/') . $individu['id_pegawai'] ?>" target="_blank" class="btn btn-light btn-sm btn-round">
                  <span class="btn-label">
                    <i class="fas fa-print"></i>
                  </span>
                  Print
                </a>
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
                        <img src="<?= base_url('assets/file_foto/'); ?><?= $individu['foto']; ?>" alt="..." class="avatar-img rounded-circle">
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="user-profile text-center">
                      <div class="name"><?= strtoupper($individu['nama_lengkap']); ?></div>
                      <?php if ($individu['role_id'] == 7) : ?>
                        <div class="job"><?= strtoupper($individu['ket_role']); ?> | <?= strtoupper($individu['nama_unit']); ?></div>
                      <?php elseif ($individu['role_id'] == 8) : ?>
                        <div class="job"><?= strtoupper($individu['ket_role']); ?> |
                          <?php if ($individu['ket_guru_id'] == 0) : ?>
                            <span class="badge badge-danger"> Belum Memilih Mata Pelajaran </span>
                          <?php else : ?>
                            <?= strtoupper($individu['mata_pelajaran']); ?>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>
                      <hr>
                      <div class="job">Tempat Tanggal Lahir</div>
                      <?php if ($individu['tanggal_lahir'] == '') : ?>
                        <div class="desc"><strong><span class="text-danger">0</span></strong></div>
                      <?php else : ?>
                        <div class="desc"><strong><?= strtoupper($individu['tempat_lahir']); ?>, <?= tanggal_indonesia_format($individu['tanggal_lahir']); ?></strong></div>
                      <?php endif; ?>
                      <hr>
                      <div class="job">Alamat</div>
                      <div class="desc"><strong><?= strtoupper($individu['alamat']); ?> KELURAHAN <?= $individu['nama_kelurahan']; ?> KECAMATAN <?= $individu['nama_kecamatan']; ?> <?= $individu['nama_kota_kab']; ?></strong></div>
                      <hr>
                      <div class="job">Jenis Kelamin</div>
                      <div class="desc"><strong><?= strtoupper($individu['jenis_kelamin']); ?></strong></div>
                      <hr>
                      <div class="job">Agama</div>
                      <div class="desc"><strong><?= strtoupper($individu['nama_agama']); ?></strong></div>
                      <hr>
                      <div class="job">Status Perkawinan</div>
                      <div class="desc"><strong><?= strtoupper($individu['status_perkawinan']); ?></strong></div>
                      <hr>
                      <div class="job">Nomor WA/Telp Aktif</div>
                      <div class="desc"><strong><?= strtoupper($individu['no_wa_telp']); ?></strong></div>
                      <hr>
                      <div class="job">Email</div>
                      <div class="desc"><strong><?= strtoupper($individu['email_pegawai']); ?></strong></div>
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