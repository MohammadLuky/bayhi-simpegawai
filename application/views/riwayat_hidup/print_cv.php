<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?= $title; ?> | Rekrutmen</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="<?= base_url('assets/') ?>bayhi.ico" type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="<?= base_url('assets/manage') ?>/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        "families": ["Lato:300,400,700,900"]
      },
      custom: {
        "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
        urls: ['<?= base_url('assets/manage') ?>/css/fonts.min.css']
      },
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/manage') ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/manage') ?>/css/atlantis.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/manage') ?>/css/atlantis.css">
  <link rel="stylesheet" href="<?= base_url('assets/manage') ?>/css/timeline-custome.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="<?= base_url('assets/manage') ?>/css/demo.css">
</head>

<body>
  <div class="wrapper">

    <div class="content">
      <div class="page-inner">
        <div class="page-header mb-5">
        </div>
        <div class="page-inner mt--5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-secondary">
                <div class="card-head-row">
                  <div class="card-title">Curriculum Vitae</div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card card-profile">
                      <div class="card-header" style="background-image: url('<?= base_url('assets/manage/') ?>img/blogpost.jpg')">
                        <div class="profile-picture">
                          <div class="avatar avatar-xxl">
                            <img src="<?= base_url('assets/manage/') ?>img/<?= $pelamar['foto']; ?>" alt="..." class="avatar-img rounded">
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="user-profile text-center">
                          <div class="name"><?= $pelamar['nama_lengkap']; ?></div>
                          <div class="job"><?= $pelamar['ket_role']; ?> | <?= $pelamar['nama_unit']; ?></div>
                          <hr>
                          <div class="job">Tempat Tanggal Lahir</div>
                          <?php if ($pelamar['tanggal_lahir'] == '') : ?>
                            <div class="desc"><strong><span class="text-danger">0</span></strong></div>
                          <?php else : ?>
                            <div class="desc"><strong><?= $pelamar['tempat_lahir']; ?>, <?= tanggal_indonesia_format($pelamar['tanggal_lahir']); ?></strong></div>
                          <?php endif; ?>
                          <hr>
                          <div class="job">Alamat KTP</div>
                          <div class="desc"><strong><?= $pelamar['alamat']; ?> Kelurahan <?= $pelamar['nama_kelurahan_pelamar']; ?> Kecamatan <?= $pelamar['nama_kecamatan_pelamar']; ?> <?= $pelamar['nama_kotakab_pelamar']; ?></strong></div>
                          <hr>
                          <div class="job">Alamat Domisili</div>
                          <div class="desc"><strong><?= $pelamar['alamat']; ?> Kelurahan <?= $pelamar['nama_kelurahan_domisili']; ?> Kecamatan <?= $pelamar['nama_kecamatan_domisili']; ?> <?= $pelamar['nama_kotakab_domisili']; ?></strong></div>
                          <hr>
                          <div class="job">Jenis Kelamin</div>
                          <div class="desc"><strong><?= $pelamar['jenis_kelamin']; ?></strong></div>
                          <hr>
                          <div class="job">Agama</div>
                          <div class="desc"><strong><?= $pelamar['nama_agama']; ?></strong></div>
                          <hr>
                          <div class="job">Status Perkawinan</div>
                          <div class="desc"><strong><?= $pelamar['status_perkawinan']; ?></strong></div>
                          <hr>
                          <div class="job">Nomor WA/Telp Aktif</div>
                          <div class="desc"><strong><?= $pelamar['no_wa_telp']; ?></strong></div>
                          <hr>
                          <div class="job">Email</div>
                          <div class="desc"><strong><?= $pelamar['email_pegawai']; ?></strong></div>
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
                                          <h4 class="timeline-title"><strong><?= $pend['instansi_pendidikan']; ?></strong></h4>
                                        </div>
                                        <div class="timeline-body">
                                          <p><?= $pend['tingkat_pendidikan']; ?> - <?= $pend['program_studi']; ?></p>
                                          <p>Lulus Tahun <?= $pend['tahun_lulus']; ?></p>
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
                                          <h4 class="timeline-title"><strong><?= $kerja['tempat_kerja']; ?></strong></h4>
                                        </div>
                                        <div class="timeline-body">
                                          <p><?= $kerja['posisi_pekerjaan']; ?> - Selama <?= ($kerja['tahun_akhir_bekerja'] - $kerja['tahun_awal_bekerja']); ?> Tahun.</p>
                                          <p> <strong>Deskripsi Pekerjaan :</strong>
                                            <?= $kerja['deskripsi_pekerjaan']; ?>
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
                                          <h4 class="timeline-title"><strong><?= $organisasi['nama_organisasi']; ?></strong></h4>
                                        </div>
                                        <div class="timeline-body">
                                          <p>Tingkat <?= $organisasi['tingkatan']; ?> - Menjabat Sebagai <strong><?= $organisasi['jabatan']; ?></strong>.</p>
                                          <p> <strong>Masa Periode (Tahun) :</strong></p>
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
                                          <h4 class="timeline-title"><strong><?= $proyek['nama_proyek']; ?></strong></h4>
                                        </div>
                                        <div class="timeline-body">
                                          <p>Tingkat <?= $proyek['tingkatan']; ?>.</p>
                                          <p> <strong>Deskripsi Proyek :</strong>
                                            <?= $proyek['deskripsi_proyek']; ?>.
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
                <div class="row">
                  <div class="col-md-4 text-center">
                    <div class="card">
                      <div class="card-body">
                        <img src="<?= base_url('assets/manage/') ?>img/<?= $pelamar['foto']; ?>" alt="..." width="200" height="300">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="card">
                      <div class="card-body">
                        <div class="user-profile">
                          <div class="name"><?= $pelamar['nama_lengkap']; ?></div>
                          <div class="job"><?= $pelamar['ket_role']; ?> | <?= $pelamar['nama_unit']; ?></div>
                          <!-- <span class="h3 text-dark"><strong><?= $pelamar['nama_lengkap']; ?></strong></span><br>
                        <span class="h5 text-dark"><?= $pelamar['ket_role']; ?> | <?= $pelamar['nama_unit']; ?></span> -->
                          <hr>
                          <div class="job">Tempat Tanggal Lahir</div>
                          <?php if ($pelamar['tanggal_lahir'] == '') : ?>
                            <div class="desc"><strong><span class="text-danger">0</span></strong></div>
                          <?php else : ?>
                            <div class="desc"><strong><?= $pelamar['tempat_lahir']; ?>, <?= tanggal_indonesia_format($pelamar['tanggal_lahir']); ?></strong></div>
                          <?php endif; ?>
                          <hr>
                          <div class="job">Alamat</div>
                          <div class="desc"><strong><?= $pelamar['alamat']; ?> Kelurahan <?= $pelamar['nama_kelurahan']; ?> Kecamatan <?= $pelamar['nama_kecamatan']; ?> <?= $pelamar['nama_kota_kab']; ?></strong></div>
                          <hr>
                          <div class="job">Jenis Kelamin</div>
                          <div class="desc"><strong><?= $pelamar['jenis_kelamin']; ?></strong></div>
                          <hr>
                          <div class="job">Agama</div>
                          <div class="desc"><strong><?= $pelamar['nama_agama']; ?></strong></div>
                          <hr>
                          <div class="job">Status Perkawinan</div>
                          <div class="desc"><strong><?= $pelamar['status_perkawinan']; ?></strong></div>
                          <hr>
                          <div class="job">Nomor WA/Telp Aktif</div>
                          <div class="desc"><strong><?= $pelamar['no_wa_telp']; ?></strong></div>
                          <hr>
                          <div class="job">Email</div>
                          <div class="desc"><strong><?= $pelamar['email_pegawai']; ?></strong></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="container-fluid">
                  <div class="copyright ml-auto">
                    <i class="far fa-copyright"></i> <strong> IT - BAYHI <?= date('Y'); ?> </strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- End Custom template -->
  </div>
  <!--   Core JS Files   -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <script src="<?= base_url('assets/manage/') ?>js/core/jquery.3.2.1.min.js"></script>
  <script src="<?= base_url('assets/manage/') ?>js/core/popper.min.js"></script>
  <script src="<?= base_url('assets/manage/') ?>js/core/bootstrap.min.js"></script>

  <!-- jQuery UI -->
  <script src="<?= base_url('assets/manage/') ?>js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="<?= base_url('assets/manage/') ?>js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

  <script src="<?= base_url('assets/manage/') ?>js/moment.min.js"></script>

  <!-- jQuery Scrollbar -->
  <script src="<?= base_url('assets/manage/') ?>js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


  <!-- Chart JS -->
  <script src="<?= base_url('assets/manage/') ?>js/plugin/chart.js/chart.min.js"></script>

  <!-- jQuery Sparkline -->
  <script src="<?= base_url('assets/manage/') ?>js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

  <!-- Chart Circle -->
  <script src="<?= base_url('assets/manage/') ?>js/plugin/chart-circle/circles.min.js"></script>

  <!-- Datatables -->
  <script src="<?= base_url('assets/manage/') ?>js/plugin/datatables/datatables.min.js"></script>

  <!-- Bootstrap Notify -->
  <!-- <script src="<?= base_url('assets/manage/') ?>js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> -->

  <!-- jQuery Vector Maps -->
  <script src="<?= base_url('assets/manage/') ?>js/plugin/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url('assets/manage/') ?>js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

  <!-- Sweet Alert -->
  <!-- <script src="<?= base_url('assets/manage/') ?>js/plugin/sweetalert/sweetalert.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Atlantis JS -->
  <script src="<?= base_url('assets/manage/') ?>js/bootstrap-toggle.min.js"></script>
  <script src="<?= base_url('assets/manage/') ?>js/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/manage/') ?>js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?= base_url('assets/manage/') ?>js/select2.full.min.js"></script>
  <script src="<?= base_url('assets/manage/') ?>js/dropzone.min.js"></script>
  <script src="<?= base_url('assets/manage/') ?>js/atlantis.min.js"></script>

  <!-- Atlantis DEMO methods, don't include it in your project! -->
  <script src="<?= base_url('assets/manage/') ?>js/setting-demo.js"></script>
  <script src="<?= base_url('assets/manage/') ?>js/demo.js"></script>
  <script>
    <?php if ($this->session->flashdata('message')) : ?>
      var pesan = "<?= $this->session->flashdata('message'); ?>";

      Swal.fire({
        position: "top",
        icon: "success",
        title: pesan,
        showConfirmButton: false,
        timer: 4000
      });
    <?php endif ?>
  </script>
  <script>
    $(document).ready(function() {
      $('#jenis_kelamin').select2({
        theme: "bootstrap"
      });
      $('#agama').select2({
        theme: "bootstrap"
      });
      $('#status_perkawinan').select2({
        theme: "bootstrap"
      });
      $('#prov_rekrutmen').select2({
        theme: "bootstrap"
      });
      $('#kota_kab_rekrutmen').select2({
        theme: "bootstrap"
      });
      $('#kec_rekrutmen').select2({
        theme: "bootstrap"
      });
      $('#kel_rekrutmen').select2({
        theme: "bootstrap"
      });
      $('#jenjang_pend').select2({
        theme: "bootstrap"
      });
      $('#tingkat_organisasi_id').select2({
        theme: "bootstrap"
      });
      $('#tingkat_proyek_id').select2({
        theme: "bootstrap"
      });
      $('#pilih_unit').select2({
        theme: "bootstrap"
      });
      $('#daftar_pegawai').DataTable();


      $(document).ready(function() {
        var startYear = 1950; // Start year
        var endYear = new Date().getFullYear(); // Current year
        var $selectYear = $('#tahun_lulus');

        // Generate years dynamically
        for (var year = startYear; year <= endYear; year++) {
          $selectYear.append('<option value="' + year + '">' + year + '</option>');
        }

        // Initialize Select2
        $selectYear.select2({
          theme: "bootstrap"
        });
      });


      $('#prov_rekrutmen').change(function() {
        var id_prov = $(this).val();
        if (id_prov !== '') {
          $.ajax({
            url: '<?= base_url('data_pelamar/getKota_byProv'); ?>',
            type: 'POST',
            data: {
              id_prov: id_prov
            },
            dataType: 'JSON',
            success: function(response) {
              console.log(response);
              var len = response.length;
              $("#kota_kab_rekrutmen").empty();
              $("#kota_kab_rekrutmen").append('<option selected value="">Pilih Kota/Kabupaten</option>');
              for (var i = 0; i < len; i++) {
                var id = response[i]['id_kota_kab'];
                var name = response[i]['nama_kota_kab'];
                $('#kota_kab_rekrutmen').append('<option value="' + id + '">' + name + '</option>');
              }
            }
          });
        } else {
          $("#kota_kab_rekrutmen").empty();
          $("#kota_kab_rekrutmen").append('<option selected value="">Pilih Kota/Kabupaten</option>');
        }
      });

      $('#kota_kab_rekrutmen').change(function() {
        var id_kota = $(this).val();
        if (id_kota !== '') {
          $.ajax({
            url: '<?= base_url('data_pelamar/getKec_byKota'); ?>',
            type: 'POST',
            data: {
              id_kota: id_kota
            },
            dataType: 'JSON',
            success: function(response) {
              console.log(response);
              var len = response.length;
              $("#kec_rekrutmen").empty();
              $("#kec_rekrutmen").append('<option selected value="">Pilih Kecamatan</option>');
              for (var i = 0; i < len; i++) {
                var id = response[i]['id_kec'];
                var name = response[i]['nama_kecamatan'];
                $('#kec_rekrutmen').append('<option value="' + id + '">' + name + '</option>');
              }
            }
          });
        } else {
          $("#kec_rekrutmen").empty();
          $("#kec_rekrutmen").append('<option selected value="">Pilih Kecamatan</option>');
        }
      });

      $('#kec_rekrutmen').change(function() {
        var id_kec = $(this).val();
        if (id_kec !== '') {
          $.ajax({
            url: '<?= base_url('data_pelamar/getKel_byKec'); ?>',
            type: 'POST',
            data: {
              id_kec: id_kec
            },
            dataType: 'JSON',
            success: function(response) {
              console.log(response);
              var len = response.length;
              $("#kel_rekrutmen").empty();
              $("#kel_rekrutmen").append('<option selected value="">Pilih Kelurahan</option>');
              for (var i = 0; i < len; i++) {
                var id = response[i]['id_kel'];
                var name = response[i]['nama_kelurahan'];
                $('#kel_rekrutmen').append('<option value="' + id + '">' + name + '</option>');
              }
            }
          });
        } else {
          $("#kel_rekrutmen").empty();
          $("#kel_rekrutmen").append('<option selected value="">Pilih Kelurahan</option>');
        }
      });

    });

    var InputElement = document.getElementById('no_wa_telp');
    InputElement.addEventListener("input", function() {
      if (this.value.length > 12) {
        this.value = this.value.slice(0, 12);
      }
    });

    $(document).ready(function() {
      // $('.pend-aktif').click(function() {
      $('.pend-aktif').on('click', function(e) {
        e.preventDefault();

        var selectedOption = $('input[name="pend_aktif_id"]:checked').val();

        if (!selectedOption) {
          Swal.fire({
            icon: 'error',
            title: 'Kesalahan.',
            text: 'Pendidikan Terakhir Belum Dipilih.',
          });
          return;
        }

        Swal.fire({
          title: 'Apakah Anda yakin?',
          text: "Data yang dipilih sesuai dengan Pendidikan Terakhir Anda ?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Betul.',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            $('#PendidikanAktif').submit();
          }
        });
      });
    });
  </script>
  <script>
    $("#owl-demo2").owlCarousel({
      nav: true, // Show next and prev buttons
      autoplaySpeed: 300,
      navSpeed: 400,
      items: 1
    });

    $('#tanggal_lahir').datetimepicker({
      format: 'MM/DD/YYYY',
    });
  </script>
  <script>
    $(document).ready(function() {

      // $('.hapus-hispend').click(function() {
      $('.hapus-hispend').on('click', function(e) {
        e.preventDefault();

        var id_history_pendidikan = $(this).data('id');
        var pesan_terhapus = 'Data Riwayat Pendidikan telah Terhapus.'
        Swal.fire({
          title: 'Apakah anda yakin akan menghapus data ini?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal',
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '<?= base_url("data_pelamar/hapus_riwayat_pendidikan") ?>',
              type: 'POST',
              data: {
                id_history_pendidikan: id_history_pendidikan
              },
              success: function(response) {
                Swal.fire(
                  'Berhasil!',
                  pesan_terhapus,
                  'success'
                ).then(() => {
                  location.reload();
                });
              },
              error: function(xhr, status, error) {
                Swal.fire(
                  'Error!',
                  'Something went wrong.',
                  'error'
                );
              }
            });
          }
        })
      });

      $('.hapus-hisper').click(function() {
        var id_history_pekerjaan = $(this).data('id');
        var pesan_terhapus = 'Data Riwayat Pekerjaan telah Terhapus.'
        Swal.fire({
          title: 'Apakah anda yakin akan menghapus data ini?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal',
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '<?= base_url("data_pelamar/hapus_riwayat_pekerjaan") ?>',
              type: 'POST',
              data: {
                id_history_pekerjaan: id_history_pekerjaan
              },
              success: function(response) {
                Swal.fire(
                  'Berhasil!',
                  pesan_terhapus,
                  'success'
                ).then(() => {
                  location.reload();
                });
              },
              error: function(xhr, status, error) {
                Swal.fire(
                  'Error!',
                  'Something went wrong.',
                  'error'
                );
              }
            });
          }
        })
      });

      $('.hapus-hisor').click(function() {
        var id_history_organisasi = $(this).data('id');
        var pesan_terhapus = 'Data Riwayat Organisasi telah Terhapus.'
        Swal.fire({
          title: 'Apakah anda yakin akan menghapus data ini?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal',
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '<?= base_url("data_pelamar/hapus_riwayat_organisasi") ?>',
              type: 'POST',
              data: {
                id_history_organisasi: id_history_organisasi
              },
              success: function(response) {
                Swal.fire(
                  'Berhasil!',
                  pesan_terhapus,
                  'success'
                ).then(() => {
                  location.reload();
                });
              },
              error: function(xhr, status, error) {
                Swal.fire(
                  'Error!',
                  'Something went wrong.',
                  'error'
                );
              }
            });
          }
        })
      });

      $('.hapus-hispro').click(function() {
        var id_history_proyek = $(this).data('id');
        var pesan_terhapus = 'Data Riwayat Proyek telah Terhapus.'
        Swal.fire({
          title: 'Apakah anda yakin akan menghapus data ini?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal',
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '<?= base_url("data_pelamar/hapus_riwayat_proyek") ?>',
              type: 'POST',
              data: {
                id_history_proyek: id_history_proyek
              },
              success: function(response) {
                Swal.fire(
                  'Berhasil!',
                  pesan_terhapus,
                  'success'
                ).then(() => {
                  location.reload();
                });
              },
              error: function(xhr, status, error) {
                Swal.fire(
                  'Error!',
                  'Something went wrong.',
                  'error'
                );
              }
            });
          }
        })
      });

      $('.kirim-lamaran').click(function() {
        var id_pegawai = $(this).data('id');
        var pesan_terkirim = 'Lamaran Pekerjaan anda telah terkirim.'
        Swal.fire({
          title: 'Apakah anda yakin akan mengirim lamaran dan data anda telah sesuai?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Saya Yakin!',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal',
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '<?= base_url("riwayat_hidup/kirim_lamaran") ?>',
              type: 'POST',
              data: {
                id_pegawai: id_pegawai
              },
              success: function(response) {
                Swal.fire(
                  'Berhasil!',
                  pesan_terkirim,
                  'success'
                ).then(() => {
                  location.reload();
                });
              },
              error: function(xhr, status, error) {
                Swal.fire(
                  'Error!',
                  'Something went wrong.',
                  'error'
                );
              }
            });
          }
        })
      });
    });
  </script>
</body>

</html>