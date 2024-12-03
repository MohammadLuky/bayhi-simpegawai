  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?= $title;?></h1>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?= base_url('assets/manage/')?>img/<?= $pelamar['foto'];?>" alt="Profile" class="rounded-circle">
              <h2><?= $pelamar['nama_lengkap'];?></h2>
              <h3><?= $pelamar['ket_role'];?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#cv">Daftar Riwayat Hidup</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#riwayat-pendidikan">Riwayat Pendidikan</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#riwayat-pekerjaan">Riwayat Pekerjaan</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#riwayat-pelatihan">Riwayat Pelatihan</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="cv">
                  <h5 class="card-title">Tentang Saya</h5>
                  <?php if($pelamar['about_me'] != ''):?>
                  <p class="small fst-italic"><?= $pelamar['about_me'];?></p>
                  <?php else:?>
                  <p class="small fst-italic text-danger">Tolong isilah sesuai kepribadianmu.</p>
                  <?php endif;?>
                  <hr>
                  <h5 class="card-title">Detail Profil</h5>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label ">Nama Lengkap</div>
                    <div class="col-lg-8 col-md-8"><?= $pelamar['nama_lengkap']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Tempat Tanggal Lahir</div>
                    <!-- <div class="col-lg-8 col-md-8"><?= $pelamar['tempat_lahir']?>, <?= $pelamar['tanggal_lahir']?></div> -->
                    <div class="col-lg-8 col-md-8"><?= $pelamar['tempat_lahir']?>, <?= tanggal_indonesia_format($pelamar['tanggal_lahir'])?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Jenis Kelamin</div>
                    <div class="col-lg-8 col-md-8"><?= $pelamar['jenis_kelamin']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Alamat</div>
                    <div class="col-lg-8 col-md-8"><?= $pelamar['alamat']?>, Kelurahan <?= $pelamar['nama_kelurahan']?>, Kecamatan <?= $pelamar['nama_kecamatan']?>, <?= $pelamar['nama_kota_kab']?>, <?= $pelamar['nama_provinsi']?></div>
                    <!-- <div class="col-lg-8 col-md-8"><span class="text-danger small fst-italic">Proses sikronisasi API.</span></div> -->
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Agama</div>
                    <div class="col-lg-8 col-md-8"><?= $pelamar['nama_agama']?></div>
                    <!-- <div class="col-lg-8 col-md-8"><span class="text-danger small fst-italic">Proses sikronisasi Data.</span></div> -->
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Status Perkawinan</div>
                    <div class="col-lg-8 col-md-8"><?= $pelamar['status_perkawinan']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Nomor WA/Telp Aktif</div>
                    <div class="col-lg-8 col-md-8"><?= $pelamar['no_wa_telp']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Email Aktif</div>
                    <div class="col-lg-8 col-md-8"><?= $pelamar['email_pegawai']?></div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Unit Dilamar</div>
                    <div class="col-lg-8 col-md-8"><strong><?= $pelamar['ket_role']?> | <?= $pelamar['nama_unit']?></strong></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-overview" id="riwayat-pendidikan">
                  <h5 class="card-title">Pendidikan Terakhir</h5>
                  
                    <table class="table table-bordered">
                      <thead class="text-center">
                        <tr class="table-primary">
                          <th scope="col">No</th>
                          <th scope="col">Tingkat Pendidikan</th>
                          <th scope="col">Nama Lembaga</th>
                          <th scope="col">Program Studi</th>
                          <th scope="col">Tahun Lulus</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Brandon Jacob</td>
                          <td>Designer</td>
                          <td>28</td>
                          <td>2016-05-25</td>
                        </tr>
                      </tbody>
                    </table>

                </div>

                <div class="tab-pane fade profile-overview" id="riwayat-pekerjaan">
                  <h5 class="card-title">Pekerjaan Terakhir</h5>
                  
                    <table class="table table-bordered">
                      <thead class="text-center">
                        <tr class="table-primary">
                          <th scope="col">No</th>
                          <th scope="col">Tempat Kerja Sebelumnya</th>
                          <th scope="col">Posisi Pekerjaan</th>
                          <th scope="col">Tahun Bekerja</th>
                          <th scope="col">Deskripsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>P3GI</td>
                          <td>Staff IT</td>
                          <td>2022 - 2023</td>
                          <td>Membosankan Wkwkwk</td>
                        </tr>
                      </tbody>
                    </table>

                </div>

                <div class="tab-pane fade profile-overview" id="riwayat-pelatihan">
                  <h5 class="card-title">Pelatihan Terakhir</h5>
                  
                    <table class="table table-bordered">
                      <thead class="text-center">
                        <tr class="table-primary">
                          <th scope="col">No</th>
                          <th scope="col">Nama Pelatihan</th>
                          <th scope="col">Penyelenggara</th>
                          <th scope="col">Tahun</th>
                          <th scope="col">Total Jam Pelatihan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Decoding</td>
                          <td>Android Dev - Pemula</td>
                          <td>2021</td>
                          <td>3 jam</td>
                        </tr>
                      </tbody>
                    </table>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  