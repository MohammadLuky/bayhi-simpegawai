  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?= $title;?></h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Input Daftar Riwayat Hidup</h5>

              <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#data-diri" type="button" role="tab" aria-controls="home" aria-selected="true">Data Diri</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#riwayat-pendidikan" type="button" role="tab" aria-controls="profile" aria-selected="false">Riwayat Pendidikan</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-justified" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabjustifiedContent">
                <div class="tab-pane fade show active" id="data-diri" role="tabpanel" aria-labelledby="home-tab">

                  <div class="col-md-12">
                    <form action="<?= base_url('data_pelamar')?>" method="POST">
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control <?= (form_error('nama_lengkap') != '') ? 'is-invalid' : ''; ?>" name="nama_lengkap" id="nama_lengkap" autocomplete="off" value="<?= $pelamar['nama_lengkap'] ?>" placeholder="Isi Sesuai di KTP">
                          <div class="invalid-feedback"><?= form_error('nama_lengkap'); ?></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control <?= (form_error('tempat_lahir') != '') ? 'is-invalid' : ''; ?>" name="tempat_lahir" id="tempat_lahir" autocomplete="off" value="<?= $pelamar['tempat_lahir'] ?>" placeholder="Isi Sesuai di KTP">
                          <div class="invalid-feedback"><?= form_error('tempat_lahir'); ?></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-5">
                          <input type="date" class="form-control <?= (form_error('tanggal_lahir') != '') ? 'is-invalid' : ''; ?>" name="tanggal_lahir" id="tanggal_lahir" autocomplete="off" value="<?= $pelamar['tanggal_lahir'] ?>" placeholder="Isi Sesuai di KTP">
                          <div class="invalid-feedback"><?= form_error('tanggal_lahir'); ?></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-5">
                          <select class="form-select <?= (form_error('jenis_kelamin') != '') ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                            <option selected value="">Pilih Jenis Kelamin</option>
                            <?php foreach($jenis_kelamin as $jk):?>
                              <?php if($pelamar['jenis_kelamin'] == $jk):?>
                                <option selected value="<?= $jk;?>"><?= $jk;?></option>
                              <?php else:?>
                                <option value="<?= $jk;?>"><?= $jk;?></option>
                              <?php endif;?>
                            <?php endforeach;?>
                          </select>
                          <div class="invalid-feedback"><?= form_error('jenis_kelamin'); ?></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-5">
                          <textarea class="form-control <?= (form_error('alamat') != '') ? 'is-invalid' : ''; ?>" style="height: 80px" name="alamat" id="alamat" placeholder="Isi Sesuai di KTP"><?= $pelamar['alamat'];?>
                        </textarea>
                        <div class="invalid-feedback"><?= form_error('alamat'); ?></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-2"></div>
                        <div class="col-10">
                          <div class="row">

                            <div class="col-md-6 mb-3">
                              <select class="form-select <?= (form_error('prov_rekrutmen') != '') ? 'is-invalid' : ''; ?>" id="prov_rekrutmen" name="prov_rekrutmen">
                                <option selected value="">Pilih Provinsi</option>
                                <?php foreach($provinsi as $prov):?>
                                  <option value="<?= $prov['id_provinsi']; ?>"><?= $prov['nama_provinsi']; ?></option>
                                <?php endforeach;?>
                              </select>
                              <div class="invalid-feedback"><?= form_error('prov_rekrutmen'); ?></div>
                            </div>

                            <div class="col-md-6 mb-3">
                              <select class="form-select <?= (form_error('kota_kab_rekrutmen') != '') ? 'is-invalid' : ''; ?>" id="kota_kab_rekrutmen" name="kota_kab_rekrutmen">
                                <option selected value="">Pilih Kota/Kabupaten</option>
                              </select>
                              <div class="invalid-feedback"><?= form_error('kota_kab_rekrutmen'); ?></div>
                            </div>

                            <div class="col-md-6">
                              <select class="form-select <?= (form_error('kec_rekrutmen') != '') ? 'is-invalid' : ''; ?>" id="kec_rekrutmen" name="kec_rekrutmen">
                                <option selected value="">Pilih Kecamatan</option>
                              </select>
                              <div class="invalid-feedback"><?= form_error('kec_rekrutmen'); ?></div>
                            </div>

                            <div class="col-md-6">
                              <select class="form-select <?= (form_error('kel_rekrutmen') != '') ? 'is-invalid' : ''; ?>" id="kel_rekrutmen" name="kel_rekrutmen">
                                <option selected value="">Pilih Kelurahan</option>
                              </select>
                              <div class="invalid-feedback"><?= form_error('kel_rekrutmen'); ?></div>
                            </div>

                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-5">
                          <select class="form-select <?= (form_error('agama') != '') ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="agama" id="agama">
                            <option value="">Pilih Agama</option>
                            <?php foreach($agama as $agamas):?>
                              <?php if($pelamar['agama_id'] == $agamas['id_agama']):?>
                                <option selected value="<?= $agamas['id_agama'];?>"><?= $agamas['nama_agama'];?></option>
                              <?php else:?>
                                <option value="<?= $agamas['id_agama'];?>"><?= $agamas['nama_agama'];?></option>
                              <?php endif;?>
                            <?php endforeach;?>
                          </select>
                          <div class="invalid-feedback"><?= form_error('agama'); ?></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Status Perkawinan</label>
                        <div class="col-sm-5">
                          <select class="form-select <?= (form_error('status_perkawinan') != '') ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="status_perkawinan" id="status_perkawinan">
                            <option value="">Pilih Status Perkawinan</option>
                            <?php foreach($status_perkawinan as $sp):?>
                              <?php if($pelamar['status_perkawinan'] == $sp):?>
                                <option selected value="<?= $sp;?>"><?= $sp;?></option>
                              <?php else:?>
                                <option value="<?= $sp;?>"><?= $sp;?></option>
                              <?php endif;?>
                            <?php endforeach;?>
                          </select>
                          <div class="invalid-feedback"><?= form_error('status_perkawinan'); ?></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nomor WA/Telp Aktif</label>
                        <div class="col-sm-5">
                          <input type="number" class="form-control <?= (form_error('no_wa_telp') != '') ? 'is-invalid' : ''; ?>" name="no_wa_telp" id="no_wa_telp" autocomplete="off" value="<?= $pelamar['no_wa_telp'] ?>" placeholder="Isi Nomor WA/Telp Aktif Anda" maxlength="12">
                          <div class="invalid-feedback"><?= form_error('no_wa_telp'); ?></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email Aktif</label>
                        <div class="col-sm-5">
                          <input type="email" class="form-control" name="email_pegawai" id="email_pegawai" autocomplete="off" value="<?= $pelamar['email_pegawai'] ?>" placeholder="Contoh : nama@gmail.com">
                        </div>
                      </div>
                      <div class="row mb-3 text-center">
                        <div class="col-sm-12">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                    <!-- <div class="container mt-5">
                        <button id="checkToastr" class="btn btn-primary">Cek Toastr</button>
                    </div> -->
                  </div>

                </div>

                <div class="tab-pane fade" id="riwayat-pendidikan" role="tabpanel" aria-labelledby="profile-tab">
                  Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
                </div>

                <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab">
                  Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                </div>
              </div><!-- End Default Tabs -->

            </div>
          </div>

        </div>

      </div>
    </section>

    <div class="toast-container">
      <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body">
            <span id="toastmessage"></span>
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>

  </main><!-- End #main --> 