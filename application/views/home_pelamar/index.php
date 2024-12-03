<div class="content">
  <div class="panel-header bg-info-gradient">
    <div class="page-inner py-5">
      <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
          <h2 class="text-white pb-2 fw-bold"><?= $title; ?></h2>
        </div>
      </div>
    </div>
  </div>
  <div class="page-inner mt--5">
    <?php if ($pelamar['progres_lamaran'] != 99) : ?>
      <div class="row">
        <div class="col-md-8">
          <div class="alert alert-warning" role="alert">
            <h3 class="alert-heading">Selamat Datang <strong><?= strtoupper($pelamar['nama_lengkap']); ?></strong></h3>
            <hr>
            <p>Rekrutmen Bersama Yayasan Pondok Pesantren Bayt Alhikmah Pasuruan. Segera lengkapi dan kirimkan berkas lamaran anda.</p><br>

            Bila butuh bantuan bisa menghubungi admin dengan klik tombol dibawah ini : <br>
            <a href="" class="badge badge-success" onclick="chatadmin()"><i class="fab fa-whatsapp"></i> Chat Admin</a>
          </div>
        </div>
        <div class="col-sm-4 col-md-4">
          <div class="card card-stats card-success card-round">
            <div class="card-body">
              <div class="row mt-3">
                <div class="col-5">
                  <div class="icon-big text-center">
                    <i class="flaticon-users"></i>
                  </div>
                </div>
                <div class="col-7 col-stats">
                  <div class="numbers">
                    <p class="card-category">Total</p>
                    <h3 class="card-title"><?= $jumlah_pelamar; ?> Pelamar</h3><br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card full-height">
            <div class="card-header card-secondary">
              <div class="card-title">TimeLine Rekrutmen</div>
            </div>
            <div class="card-body">
              <ol class="activity-feed">
                <?php foreach ($tahap_seleksi as $seleksi) : ?>
                  <?php if ($seleksi['status_hisrek'] == 1 && $seleksi['tahap_id_hisrek'] == 1) : ?>

                    <!-- Jika status berhasil / diterima, maka berwarna hijau, jika ditolak, maka warna merah, jika dalam proses maka berwarna kuning. -->

                    <li class="feed-item feed-item-success">
                      <time class="date">Tahap <?= $seleksi['tahap_rekrutmen']; ?></time>
                      <span class="text"><?= $seleksi['ket_tahap']; ?></span>
                    </li>
                  <?php elseif ($seleksi['status_hisrek'] == 1) : ?>
                    <li class="feed-item feed-item-success">
                      <time class="date">Tahap <?= $seleksi['tahap_rekrutmen']; ?></time>
                      <span class="text">Selamat anda <strong>LOLOS</strong> tahap <?= $seleksi['tahap_rekrutmen']; ?>.</span><br>
                      <span>Silahkan cek Informasi lebih lanjut atau hubungi Contact Person Rekrutmen. Terimakasih. <a href="" class="badge badge-info tampil-next-tahap" data-toggle="modal" data-target="#infoTahap" data-id="<?= $seleksi['id_tahap_rekrutmen']; ?>">Info Selanjutnya</a></span>
                      <!-- <span class="text">Selamat anda <strong>LOLOS</strong> tahap <?= $seleksi['tahap_rekrutmen']; ?>. <?= $seleksi['ket_tahap']; ?> <?= tanggal_indonesia_format($seleksi['jadwal_tahap']); ?> - Pukul <?= $seleksi['waktu_pelaksanaan']; ?> WIB </span> -->
                    </li>
                  <?php elseif ($seleksi['status_hisrek'] == 2) : ?>
                    <li class="feed-item feed-item-warning">
                      <time class="date">Tahap <?= $seleksi['tahap_rekrutmen']; ?></time>
                      <span class="text">Mohon bersabar karena dalam proses pengecekan <?= $seleksi['tahap_rekrutmen']; ?></span>
                    </li>
                  <?php elseif ($seleksi['status_hisrek'] == 0) : ?>
                    <li class="feed-item feed-item-danger">
                      <time class="date">Tahap <?= $seleksi['tahap_rekrutmen']; ?></time>
                      <span class="text">Mohon maaf anda <strong>BELUM LOLOS</strong> dalam tahap <strong><?= $seleksi['tahap_rekrutmen']; ?></strong>. </span>
                      <span>Terimakasih dalam partisipasi anda di Rekrutmen Bersama Yayasan Pondok Pesantren Bayt Alhikmah.</span>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ol>
            </div>
          </div>
        </div>

        <!-- Modul Informasi Tahap -->

        <div class="modal fade" id="infoTahap" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header no-bd bg-secondary">
                <h5 class="modal-title">
                  <span class="fw-mediumbold">
                    Detail Informasi Tahap</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <!-- <p class="h4"><?= $seleksi['ket_tahap']; ?> Pada <?= tanggal_indonesia_format($seleksi['jadwal_tahap']); ?> - Pukul <?= $seleksi['waktu_pelaksanaan']; ?> WIB</p> -->
                        <div id="next-info-tahap">
                        </div>
                        <p class="h4" id="error-info-tahap"></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer no-bd">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
              </div>
            </div>
          </div>
        </div>


        <div class="col-md-6">
          <div class="alert alert-secondary" role="alert">
            <?php if ($pelamar['progres_lamaran'] == 0) : ?>
              <h3 class="alert-heading"><strong>Template Berkas</strong></h3>
              <hr>
              <span class="mb-2">Template Surat Lamaran</span><br>
              <a href="<?= base_url('assets/file_template/SURAT_LAMARAN.docx'); ?>" class="badge badge-warning">Download Surat Lamaran</a>
              <hr>
              <span class="mb-2">Template Surat Komitmen Staff/Guru</span><br>
              <a href="<?= base_url('assets/file_template/SURAT_KOMITMEN.docx'); ?>" class="badge badge-info">Download Surat Komitmen Staff/Guru</a>
              <hr>
              <span class="mb-2">Template Surat Komitmen Musyrif/Musyrifah</span><br>
              <a href="<?= base_url('assets/file_template/SURAT_KOMITMEN_MUSYRIFAH.docx'); ?>" class="badge badge-success">Download Surat Komitmen Musyrif/Musyrifah</a>
              <hr>
            <?php else : ?>
              <h3 class="alert-heading"><strong>Template Berkas</strong></h3>
              <hr>
              <span class="mb-2 badge badge-info">Lamaran Telah Terkirim</span><br>
            <?php endif; ?>
          </div>
        </div>
      </div>

    <?php elseif ($pelamar['progres_lamaran'] == 99) : ?>
      <div class="alert alert-warning" role="alert">
        <p>
        <h4>Kami Mohon Maaf dan Terimakasih telah berpartisipasi pada Rekrutmen Bersama Yayasan Pondok Pesantren Bayt Alhikmah Pasuruan.</h4>
        </p>
        <p>
          Jangan Patah Semangat dan tetaplah berusaha.
        </p>
      </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div id="owl-demo2" class="owl-carousel owl-theme owl-img-responsive">
              <div class="item"><img class="img-fluid" src="<?= base_url('assets/manage/'); ?>img/bayhi.jpg"></div>
              <div class="item"><img class="img-fluid" src="<?= base_url('assets/manage/'); ?>img/bayhi-1.jpg"></div>
              <div class="item"><img class="img-fluid" src="<?= base_url('assets/manage/'); ?>img/bayhi-2.jpg"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>