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
              <a href="<?= base_url('homepelamar') ?>" class="btn btn-round btn-sm btn-success">
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
              <h4 class="card-title">Input Daftar Riwayat Hidup</h4>
              <?php if ($pelamar['progres_lamaran'] == 0) : ?>
                <div class="card-tools">
                  <a href="<?= base_url('datapelamar/upload_foto'); ?>" class="btn btn-light btn-sm btn-round">
                    <span class="btn-label">
                      <i class="fas fa-camera"></i>
                    </span>
                    Upload Foto
                  </a>
                  <a href="<?= base_url('datapelamar/upload_berkas'); ?>" class="btn btn-light btn-sm btn-round">
                    <span class="btn-label">
                      <i class="fas fa-file-pdf"></i>
                    </span>
                    Upload Berkas PDF
                  </a>
                </div>
              <?php else : ?>
                <div class="card-tools">
                  <a href="" class="btn btn-light btn-sm btn-round">
                    <span class="btn-label">
                      <i class="fas fa-paper-plane"></i>
                    </span>
                    Lamaran Terkirim
                  </a>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-5 col-md-2">
                <div class="nav flex-column nav-pills nav-warning nav-pills-no-bd nav-pills-icons" id="v-pills-tab-with-icon" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="v-pills-home-tab-icons" data-toggle="pill" href="#data-diri" role="tab" aria-controls="data-diri" aria-selected="true">
                    <i class="fas fa-id-card"></i>
                    Data Diri
                  </a>
                  <a class="nav-link" id="v-pills-profile-tab-icons" data-toggle="pill" href="#riwayat-pendidikan" role="tab" aria-controls="riwayat-pendidikan" aria-selected="false">
                    <i class="fas fa-graduation-cap"></i>
                    Pendidikan
                  </a>
                  <a class="nav-link" id="v-pills-profile-tab-icons" data-toggle="pill" href="#riwayat-pekerjaan" role="tab" aria-controls="riwayat-pekerjaan" aria-selected="false">
                    <i class="fas fa-briefcase"></i>
                    Pekerjaan
                  </a>
                  <a class="nav-link" id="v-pills-profile-tab-icons" data-toggle="pill" href="#riwayat-organisasi" role="tab" aria-controls="riwayat-organisasi" aria-selected="false">
                    <i class="fas fa-user-tag"></i>
                    Organisasi
                  </a>
                  <a class="nav-link" id="v-pills-profile-tab-icons" data-toggle="pill" href="#riwayat-proyek" role="tab" aria-controls="riwayat-proyek" aria-selected="false">
                    <i class="fas fa-project-diagram"></i>
                    Proyek
                  </a>
                </div>
              </div>
              <div class="col-7 col-md-10">
                <div class="tab-content" id="v-pills-with-icon-tabContent">

                  <div class="tab-pane fade show active" id="data-diri" role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
                    <form action="<?= base_url('datapelamar') ?>" method="POST">

                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header card-secondary">
                              <div class="card-title">Lengkapi Data Diri Anda.</div>
                            </div>

                            <div class="card-body">
                              <div class="col-md-8">
                                <div class="form-group">
                                  <label for="largeInput">Nama Lengkap (Sesuai KTP)</label>
                                  <input type="text" class="form-control <?= (form_error('nama_lengkap') != '') ? 'is-invalid' : ''; ?>" id="nama_lengkap" name="nama_lengkap" autocomplete="off" value="<?= strtoupper($pelamar['nama_lengkap']) ?>" placeholder="Isi Sesuai di KTP.">
                                  <div class="invalid-feedback"><?= form_error('nama_lengkap'); ?></div>
                                </div>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <label for="largeInput">NIK KTP</label>
                                  <input type="number" class="form-control <?= (form_error('nik_pelamar') != '') ? 'is-invalid' : ''; ?>" id="nik_pelamar" name="nik_pelamar" autocomplete="off" value="<?= strtoupper($pelamar['nik_pegawai']) ?>" placeholder="Isi Sesuai di KTP.">
                                  <div class="invalid-feedback"><?= form_error('nik_pelamar'); ?></div>
                                </div>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <label for="largeInput">Tempat Lahir</label>
                                  <input type="text" class="form-control <?= (form_error('tempat_lahir') != '') ? 'is-invalid' : ''; ?>" id="tempat_lahir" name="tempat_lahir" autocomplete="off" value="<?= strtoupper($pelamar['tempat_lahir']) ?>" placeholder="Isi Sesuai di KTP.">
                                  <div class="invalid-feedback"><?= form_error('tempat_lahir'); ?></div>
                                </div>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <label>Tanggal Lahir</label>
                                  <div class="input-group">
                                    <input type="text" class="form-control <?= (form_error('tanggal_lahir') != '') ? 'is-invalid' : ''; ?>" id="tanggal_lahir" name="tanggal_lahir" value="<?= $pelamar['tanggal_lahir'] ?>">
                                    <div class="input-group-append">
                                      <span class="input-group-text">
                                        <i class="fa fa-calendar-check"></i>
                                      </span>
                                    </div>
                                    <div class="invalid-feedback"><?= form_error('tanggal_lahir'); ?></div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-7">
                                <div class="form-group">
                                  <label>Jenis Kelamin</label>
                                  <div class="select2-input">
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control <?= (form_error('jenis_kelamin') != '') ? 'is-invalid' : ''; ?>">
                                      <option value="">Pilih Jenis Kelamin</option>
                                      <?php foreach ($jenis_kelamin as $jk) : ?>
                                        <?php if ($pelamar['jenis_kelamin'] == $jk) : ?>
                                          <option value="<?= $jk; ?>" selected><?= $jk; ?></option>
                                        <?php else : ?>
                                          <option value="<?= $jk; ?>"><?= $jk; ?></option>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback"><?= form_error('jenis_kelamin'); ?></div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-9">

                                <?php if ($pelamar['alamat'] != '') : ?>
                                  <div class="form-group">
                                    <label>Alamat KTP</label>
                                    <span class="form-control mb-2" readonly><?= strtoupper($pelamar['alamat']); ?>, KELURAHAN <?= $pelamar['nama_kelurahan_pelamar']; ?>, KECAMATAN <?= $pelamar['nama_kecamatan_pelamar']; ?> <?= $pelamar['nama_kotakab_pelamar']; ?></span>
                                  </div>
                                <?php else : ?>
                                  <div class="form-group">
                                    <label>Alamat KTP</label>
                                    <textarea class="form-control <?= (form_error('alamat') != '') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autocomplete="off"><?= strtoupper($pelamar['alamat']); ?></textarea>
                                    <div class="invalid-feedback"><?= form_error('alamat'); ?></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <div class="select2-input">
                                          <select id="prov_rekrutmen" name="prov_rekrutmen" class="form-control <?= (form_error('prov_rekrutmen') != '') ? 'is-invalid' : ''; ?>">
                                            <option value="">Pilih Provinsi</option>
                                            <?php foreach ($provinsi as $prov) : ?>
                                              <option value="<?= $prov['id_provinsi']; ?>"><?= $prov['nama_provinsi']; ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                          <div class="invalid-feedback"><?= form_error('prov_rekrutmen'); ?></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <div class="select2-input">
                                          <select id="kota_kab_rekrutmen" name="kota_kab_rekrutmen" class="form-control <?= (form_error('kota_kab_rekrutmen') != '') ? 'is-invalid' : ''; ?>">
                                            <option value="">Pilih Kota/Kabupaten</option>
                                          </select>
                                          <div class="invalid-feedback"><?= form_error('kota_kab_rekrutmen'); ?></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <div class="select2-input">
                                          <select id="kec_rekrutmen" name="kec_rekrutmen" class="form-control <?= (form_error('kec_rekrutmen') != '') ? 'is-invalid' : ''; ?>">
                                            <option value="">Pilih Kecamatan</option>
                                          </select>
                                          <div class="invalid-feedback"><?= form_error('kec_rekrutmen'); ?></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <div class="select2-input">
                                          <select id="kel_rekrutmen" name="kel_rekrutmen" class="form-control <?= (form_error('kel_rekrutmen') != '') ? 'is-invalid' : ''; ?>">
                                            <option value="">Pilih Kelurahan</option>
                                          </select>
                                          <div class="invalid-feedback"><?= form_error('kel_rekrutmen'); ?></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <?php endif; ?>

                                <?php if (empty($pelamar['alamat_domisili'])): ?>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input" id="cek_domisili" name="cek_domisili" type="checkbox" value="1">
                                      <span class="form-check-sign">Klik Centang Bila Alamat Domisili sama dengan Alamat KTP Anda.</span>
                                    </label>
                                  </div>
                                <?php endif; ?>

                              </div>
                              <div class="col-md-9" id="FormDomisili">

                                <?php if ($pelamar['alamat_domisili'] != '') : ?>
                                  <div class="form-group">
                                    <label>Alamat Domisili</label>
                                    <span class="form-control mb-2" readonly><?= strtoupper($pelamar['alamat_domisili']); ?>, KELURAHAN <?= $pelamar['nama_kelurahan_domisili']; ?>, KECAMATAN <?= $pelamar['nama_kecamatan_domisili']; ?> <?= $pelamar['nama_kotakab_domisili']; ?></span>
                                    <span class="text-danger">* Bila ingin mengubah Alamat KTP dan Domisili silahkan klik tombol edit. Terimakasih.</span>
                                    <a href="<?= base_url('datapelamar/edit_alamat') ?>" class="badge badge-warning"><i class="fas fa-user-edit"></i> Edit</a>
                                  </div>
                                <?php else : ?>
                                  <div class="form-group">
                                    <label>Alamat Domisili</label>
                                    <textarea class="form-control <?= (form_error('alamat_domisili') != '') ? 'is-invalid' : ''; ?>" id="alamat_domisili" name="alamat_domisili" autocomplete="off"><?= strtoupper($pelamar['alamat_domisili']); ?></textarea>
                                    <div class="invalid-feedback"><?= form_error('alamat_domisili'); ?></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <div class="select2-input">
                                          <select id="prov_rek_domisili" name="prov_rek_domisili" class="form-control <?= (form_error('prov_rek_domisili') != '') ? 'is-invalid' : ''; ?>">
                                            <option value="">Pilih Provinsi</option>
                                            <?php foreach ($provinsi as $prov) : ?>
                                              <option value="<?= $prov['id_provinsi']; ?>"><?= $prov['nama_provinsi']; ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                          <div class="invalid-feedback"><?= form_error('prov_rek_domisili'); ?></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <div class="select2-input">
                                          <select id="kota_kab_rek_domisili" name="kota_kab_rek_domisili" class="form-control <?= (form_error('kota_kab_rek_domisili') != '') ? 'is-invalid' : ''; ?>">
                                            <option value="">Pilih Kota/Kabupaten</option>
                                          </select>
                                          <div class="invalid-feedback"><?= form_error('kota_kab_rek_domisili'); ?></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <div class="select2-input">
                                          <select id="kec_rek_domisili" name="kec_rek_domisili" class="form-control <?= (form_error('kec_rek_domisili') != '') ? 'is-invalid' : ''; ?>">
                                            <option value="">Pilih Kecamatan</option>
                                          </select>
                                          <div class="invalid-feedback"><?= form_error('kec_rek_domisili'); ?></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <div class="select2-input">
                                          <select id="kel_rek_domisili" name="kel_rek_domisili" class="form-control <?= (form_error('kel_rek_domisili') != '') ? 'is-invalid' : ''; ?>">
                                            <option value="">Pilih Kelurahan</option>
                                          </select>
                                          <div class="invalid-feedback"><?= form_error('kel_rek_domisili'); ?></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <?php endif; ?>

                              </div>

                              <div class="col-md-7">
                                <div class="form-group">
                                  <label>Agama</label>
                                  <div class="select2-input">
                                    <select id="agama" name="agama" class="form-control <?= (form_error('agama') != '') ? 'is-invalid' : ''; ?>">
                                      <option value="">Pilih Agama</option>
                                      <?php foreach ($agama as $agamas) : ?>
                                        <?php if ($pelamar['agama_id'] == $agamas['id_agama']) : ?>
                                          <option value="<?= $agamas['id_agama']; ?>" selected><?= $agamas['nama_agama']; ?></option>
                                        <?php else : ?>
                                          <option value="<?= $agamas['id_agama']; ?>"><?= $agamas['nama_agama']; ?></option>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback"><?= form_error('agama'); ?></div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-7">
                                <div class="form-group">
                                  <label>Status Perkawinan</label>
                                  <div class="select2-input">
                                    <select id="status_perkawinan" name="status_perkawinan" class="form-control <?= (form_error('status_perkawinan') != '') ? 'is-invalid' : ''; ?>">
                                      <option value="">Pilih Status Perkawinan</option>
                                      <?php foreach ($status_perkawinan as $sp) : ?>
                                        <?php if ($pelamar['status_perkawinan'] == $sp) : ?>
                                          <option value="<?= $sp; ?>" selected><?= $sp; ?></option>
                                        <?php else : ?>
                                          <option value="<?= $sp; ?>"><?= $sp; ?></option>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback"><?= form_error('status_perkawinan'); ?></div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <label for="largeInput">Nomor WA/Telp Aktif</label>
                                  <input type="number" class="form-control form-control <?= (form_error('no_wa_telp') != '') ? 'is-invalid' : ''; ?>" id="no_wa_telp" name="no_wa_telp" autocomplete="off" value="<?= $pelamar['no_wa_telp'] ?>" placeholder="Isi Nomor WA/Telp Aktif Anda.">
                                  <div class="invalid-feedback"><?= form_error('no_wa_telp'); ?></div>
                                </div>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <label for="largeInput">Email Aktif</label>
                                  <input type="email" class="form-control form-control <?= (form_error('email_pegawai') != '') ? 'is-invalid' : ''; ?>" id="email_pegawai" name="email_pegawai" autocomplete="off" value="<?= $pelamar['email_pegawai'] ?>" placeholder="Contoh : nama@gmail.com">
                                  <div class="invalid-feedback"><?= form_error('email_pegawai'); ?></div>
                                </div>
                              </div>
                              <hr>
                              <?php if ($pelamar['role_id'] != 8) : ?>
                                <div class="col-md-7">
                                  <div class="form-group">
                                    <label>Unit Yang Pilih</label>
                                    <div class="select2-input">
                                      <select id="pilih_unit" name="pilih_unit" class="form-control <?= (form_error('pilih_unit') != '') ? 'is-invalid' : ''; ?>">
                                        <option value="">Pilih Unit</option>
                                        <?php foreach ($staffs as $unit) : ?>
                                          <?php if ($pelamar['unit_kerja_id'] == $unit['id_unit']) : ?>
                                            <option value="<?= $unit['id_unit']; ?>" selected><?= $unit['nama_unit']; ?></option>
                                          <?php else : ?>
                                            <option value="<?= $unit['id_unit']; ?>"><?= $unit['nama_unit']; ?></option>
                                          <?php endif; ?>
                                        <?php endforeach; ?>
                                      </select>
                                      <div class="invalid-feedback"><?= form_error('pilih_unit'); ?></div>
                                    </div>
                                  </div>
                                </div>
                              <?php elseif ($pelamar['role_id'] == 8) : ?>
                                <div class="col-md-7">
                                  <div class="form-group">
                                    <label>Mata Pelajaran Yang Pilih</label>
                                    <div class="select2-input">
                                      <select id="pilih_mapel" name="pilih_mapel" class="form-control <?= (form_error('pilih_mapel') != '') ? 'is-invalid' : ''; ?>">
                                        <option value="">Pilih Mata Pelajaran</option>
                                        <?php foreach ($gurus as $mapel) : ?>
                                          <?php if ($pelamar['ket_guru_id'] == $mapel['id_mapel_guru']) : ?>
                                            <option value="<?= $mapel['id_mapel_guru']; ?>" selected><?= $mapel['mata_pelajaran']; ?></option>
                                          <?php else : ?>
                                            <option value="<?= $mapel['id_mapel_guru']; ?>"><?= $mapel['mata_pelajaran']; ?></option>
                                          <?php endif; ?>
                                        <?php endforeach; ?>
                                      </select>
                                      <div class="invalid-feedback"><?= form_error('pilih_mapel'); ?></div>
                                    </div>
                                  </div>
                                </div>
                              <?php endif; ?>

                            </div>

                            <?php if ($pelamar['progres_lamaran'] == 0) : ?>
                              <div class="card-action">
                                <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                              </div>
                            <?php endif; ?>

                          </div>
                        </div>
                      </div>

                    </form>
                  </div>

                  <div class="tab-pane fade" id="riwayat-pendidikan" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header card-secondary">
                            <div class="card-head-row">
                              <div class="card-title">Daftar Riwayat Pendidikan</div>
                              <?php if ($pelamar['progres_lamaran'] == 0) : ?>
                                <div class="card-tools">
                                  <a href="<?= base_url('datapelamar/riwayat_pendidikan'); ?>" class="btn btn-sm btn-light btn-round">
                                    <span class="btn-label">
                                      <i class="fas fa-plus-square"></i>
                                    </span>
                                    Tambah Pendidikan
                                  </a>
                                </div>
                              <?php endif; ?>
                            </div>
                          </div>
                          <div class="card-body table-responsive">
                            <table class="table table-bordered">
                              <thead style="background-color: green;" class="text-white text-center">
                                <tr>
                                  <th>No</th>
                                  <th>Jenjang Pendidikan</th>
                                  <th>Nama Sekolah</th>
                                  <th>Jurusan/Prodi</th>
                                  <th>Tahun Lulus</th>
                                  <th>Ket. Pendidikan Terakhir</th>
                                  <th>File</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i = 1;
                                foreach ($riwayat_pendidikan as $rp) : ?>
                                  <?php if (empty($rp)) : ?>
                                    <tr>
                                      <td colspan="5"><span class="text-danger">Data Tidak Ditemukan.</span></td>
                                    </tr>
                                  <?php else : ?>
                                    <tr>

                                      <td><?= $i; ?></td>
                                      <td><?= strtoupper($rp['tingkat_pendidikan']); ?></td>
                                      <td><?= strtoupper($rp['instansi_pendidikan']); ?></td>
                                      <td><?= strtoupper($rp['program_studi']); ?></td>
                                      <td><?= $rp['tahun_lulus']; ?></td>
                                      <?php if ($pelamar['pend_aktif_id'] == $rp['id_history_pendidikan']) : ?>
                                        <td class="text-center">
                                          <div class="form-check">
                                            <span class="badge badge-success">Ya</span>
                                          </div>
                                        </td>
                                      <?php else : ?>
                                        <td class="text-center">
                                          <div class="form-check">
                                            <span class="badge badge-danger">Bukan</span>
                                          </div>
                                        </td>
                                      <?php endif; ?>
                                      <td>
                                        <a href="<?= base_url('assets/file_ijazah/') . $rp['ijazah_transkrip_pdf']; ?>" class="badge badge-info" target="_blank">File Ijazah/Transkrip</a>
                                      </td>
                                      <?php if ($pelamar['progres_lamaran'] == 0) : ?>
                                        <td>
                                          <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusHisPend<?= $rp['id_history_pendidikan']; ?>">
                                            Hapus
                                          </a>
                                        </td>
                                      <?php else : ?>
                                        <td>
                                          <span class="badge badge-success">Data Telah Terkirim</span>
                                        </td>
                                      <?php endif; ?>

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


                    <!-- Modal Hapus Pendidikan -->
                    <?php foreach ($riwayat_pendidikan as $rp) : ?>
                      <div class="modal fade" id="hapusHisPend<?= $rp['id_history_pendidikan']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header no-bd bg-secondary">
                              <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                  Validasi Hapus Riwayat Pendidikan</span>
                              </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="<?= base_url('datapelamar/hapus_riwayat_pendidikan') ?>" method="post">
                              <div class="modal-body">
                                <div class="row">
                                  <input class="form-control" type="hidden" name="id_history_pendidikan" id="" value="<?= $rp['id_history_pendidikan']; ?>">
                                  <div class="col-md-12">
                                    <p class="h4">Apakah anda yakin akan menghapus data Riwayat Pendidikan ini? </p>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer no-bd">
                                <button type="submit" class="btn btn-success">Hapus</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                    <!-- End Modal -->

                  </div>

                  <div class="tab-pane fade" id="riwayat-pekerjaan" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header card-secondary">
                            <div class="card-head-row">
                              <div class="card-title">Daftar Riwayat Pekerjaan</div>
                              <?php if ($pelamar['progres_lamaran'] == 0) : ?>
                                <div class="card-tools">
                                  <a href="<?= base_url('datapelamar/riwayat_pekerjaan'); ?>" class="btn btn-sm btn-light btn-round">
                                    <span class="btn-label">
                                      <i class="fas fa-plus-square"></i>
                                    </span>
                                    Tambah Pekerjaan
                                  </a>
                                </div>
                              <?php endif; ?>
                            </div>
                          </div>
                          <div class="card-body table-responsive">
                            <table class="table table-bordered">
                              <thead style="background-color: green;" class="text-white text-center">
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Tempat Kerja</th>
                                  <th scope="col">Posisi Pekerjaan</th>
                                  <th scope="col">Lama Kerja</th>
                                  <th scope="col">Deskripsi Pekerjaan</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i = 1;
                                foreach ($riwayat_pekerjaan as $kerja) : ?>
                                  <?php if (empty($kerja)) : ?>
                                    <tr>
                                      <td colspan="5"><span class="text-danger">Data Tidak Ditemukan.</span></td>
                                    </tr>
                                  <?php else : ?>
                                    <tr>
                                      <td><?= $i; ?></td>
                                      <td><?= strtoupper($kerja['tempat_kerja']); ?></td>
                                      <td><?= strtoupper($kerja['posisi_pekerjaan']); ?></td>
                                      <td><?= ($kerja['tahun_akhir_bekerja'] - $kerja['tahun_awal_bekerja']); ?> TAHUN</td>
                                      <td><?= strtoupper($kerja['deskripsi_pekerjaan']); ?></td>
                                      <?php if ($pelamar['progres_lamaran'] == 0) : ?>
                                        <td>
                                          <button class="btn btn-icon btn-round btn-danger btn-xs hapus-hisper" data-id="<?= $kerja['id_history_pekerjaan']; ?>">
                                            <i class="fas fa-trash"></i>
                                          </button>
                                        </td>
                                      <?php else : ?>
                                        <td>
                                          <span class="badge badge-success">Data Telah Terkirim</span>
                                        </td>
                                        </td>
                                      <?php endif; ?>
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

                  <div class="tab-pane fade" id="riwayat-organisasi" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header card-secondary">
                            <div class="card-head-row">
                              <div class="card-title">Daftar Riwayat Organisasi</div>
                              <?php if ($pelamar['progres_lamaran'] == 0) : ?>
                                <div class="card-tools">
                                  <a href="<?= base_url('datapelamar/riwayat_organisasi'); ?>" class="btn btn-sm btn-light btn-round">
                                    <span class="btn-label">
                                      <i class="fas fa-plus-square"></i>
                                    </span>
                                    Tambah Organisasi
                                  </a>
                                </div>
                              <?php endif; ?>
                            </div>
                          </div>
                          <div class="card-body table-responsive">
                            <table class="table table-bordered">
                              <thead style="background-color: green;" class="text-white text-center">
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Tingkat Organisasi</th>
                                  <th scope="col">Nama Organisasi</th>
                                  <th scope="col">Jabatan</th>
                                  <th scope="col">Periode (Tahun)</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i = 1;
                                foreach ($riwayat_organisasi as $organisasi) : ?>
                                  <?php if (empty($organisasi)) : ?>
                                    <tr>
                                      <td colspan="5"><span class="text-danger">Data Tidak Ditemukan.</span></td>
                                    </tr>
                                  <?php else : ?>
                                    <tr>
                                      <td><?= $i; ?></td>
                                      <td><?= strtoupper($organisasi['tingkatan']); ?></td>
                                      <td><?= strtoupper($organisasi['nama_organisasi']); ?></td>
                                      <td><?= strtoupper($organisasi['jabatan']); ?></td>
                                      <td><?= $organisasi['tahun_awal_jabat']; ?> - <?= $organisasi['tahun_akhir_jabat']; ?></td>
                                      <?php if ($pelamar['progres_lamaran'] == 0) : ?>
                                        <td>
                                          <button class="btn btn-icon btn-round btn-danger btn-xs hapus-hisor" data-id="<?= $organisasi['id_history_organisasi']; ?>">
                                            <i class="fas fa-trash"></i>
                                          </button>
                                        </td>
                                      <?php else : ?>
                                        <td>
                                          <span class="badge badge-success">Data Telah Terkirim</span>
                                        </td>
                                        </td>
                                      <?php endif; ?>
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

                  <div class="tab-pane fade" id="riwayat-proyek" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header card-secondary">
                            <div class="card-head-row">
                              <div class="card-title">Daftar Riwayat Proyek</div>
                              <?php if ($pelamar['progres_lamaran'] == 0) : ?>
                                <div class="card-tools">
                                  <a href="<?= base_url('datapelamar/riwayat_proyek'); ?>" class="btn btn-sm btn-light btn-round">
                                    <span class="btn-label">
                                      <i class="fas fa-plus-square"></i>
                                    </span>
                                    Tambah Proyek
                                  </a>
                                </div>
                              <?php endif; ?>
                            </div>
                          </div>
                          <div class="card-body table-responsive">
                            <table class="table table-bordered">
                              <thead style="background-color: green;" class="text-white text-center">
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Tingkat Proyek</th>
                                  <th scope="col">Nama Proyek</th>
                                  <th scope="col">Deskripsi Proyek</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i = 1;
                                foreach ($riwayat_proyek as $proyek) : ?>
                                  <?php if (empty($proyek)) : ?>
                                    <tr>
                                      <td colspan="5"><span class="text-danger">Data Tidak Ditemukan.</span></td>
                                    </tr>
                                  <?php else : ?>
                                    <tr>
                                      <td><?= $i; ?></td>
                                      <td><?= strtoupper($proyek['tingkatan']); ?></td>
                                      <td><?= strtoupper($proyek['nama_proyek']); ?></td>
                                      <td><?= strtoupper($proyek['deskripsi_proyek']); ?></td>
                                      <?php if ($pelamar['progres_lamaran'] == 0) : ?>
                                        <td>
                                          <button class="btn btn-icon btn-round btn-danger btn-xs hapus-hispro" data-id="<?= $proyek['id_history_proyek']; ?>">
                                            <i class="fas fa-trash"></i>
                                          </button>
                                        </td>
                                      <?php else : ?>
                                        <td>
                                          <span class="badge badge-success">Data Telah Terkirim</span>
                                        </td>
                                        </td>
                                      <?php endif; ?>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>