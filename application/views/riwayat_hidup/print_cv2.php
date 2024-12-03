<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?> | Rekrutmen</title>
  <link rel="icon" href="<?= base_url('assets/') ?>bayhi.ico" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <div class="col-lg-12" style="padding: 10px;">
    <div class="card mt-2">
      <div class="card-header text-bg-info">
        <?= $title; ?>
      </div>
      <div class="card-body">

        <div style="margin-bottom: 20px; margin-top: 1px;">
          <table class="table table-striped">
            <tr>
              <td style="width: 10%;">
                <img src="<?= base_url('assets/file_foto/'); ?><?= $pelamar['foto']; ?>" alt="..." width="150" height="215">
              </td>
              <td style="width: 90%;">
                <span style="font-size: 11pt;"><strong><?= strtoupper($pelamar['nama_lengkap']); ?></strong></span><br>
                <?php if ($pelamar['role_id'] != 8) : ?>
                  <span style="font-size: 9pt;"><?= strtoupper($pelamar['ket_role']); ?> | <?= strtoupper($pelamar['nama_unit']); ?></span>
                <?php elseif ($pelamar['role_id'] == 8) : ?>
                  <span style="font-size: 9pt;"><?= strtoupper($pelamar['ket_role']); ?>
                    <?php if ($pelamar['ket_guru_id'] == 0) : ?>
                      Belum Memilih Mata Pelajaran
                    <?php else : ?>
                      <?= strtoupper($pelamar['mata_pelajaran']); ?>
                    <?php endif; ?>
                  </span>
                <?php endif; ?>
                <hr style="width: 35%;">
                <div class="row">
                  <div class="col-sm-6">
                    <span style="font-size: 11pt;"><strong>Tempat Tanggal Lahir</strong></span><br>
                    <span style="font-size: 9pt;"><?= strtoupper($pelamar['tempat_lahir']); ?>, <?= tanggal_indonesia_format($pelamar['tanggal_lahir']); ?></span>
                  </div>
                  <div class="col-sm-6">
                    <span style="font-size: 11pt;"><strong>Jenis Kelamin</strong></span><br>
                    <span style="font-size: 9pt;"><?= strtoupper($pelamar['jenis_kelamin']); ?></span>
                  </div>
                </div>
                <hr>
                <span style="font-size: 11pt;"><strong>Alamat KTP</strong></span><br>
                <span style="font-size: 9pt;"><?= strtoupper($pelamar['alamat']); ?> KELURAHAN <?= $pelamar['nama_kelurahan_pelamar']; ?> KECAMATAN <?= $pelamar['nama_kecamatan_pelamar']; ?> <?= $pelamar['nama_kotakab_pelamar']; ?></span>
                <hr>
                <span style="font-size: 11pt;"><strong>Alamat Domisili</strong></span><br>
                <span style="font-size: 9pt;"><?= strtoupper($pelamar['alamat_domisili']); ?> KELURAHAN <?= $pelamar['nama_kelurahan_domisili']; ?> KECAMATAN <?= $pelamar['nama_kecamatan_domisili']; ?> <?= $pelamar['nama_kotakab_domisili']; ?></span>
                <hr>
                <div class="row">
                  <div class="col-sm-6">
                    <span style="font-size: 11pt;"><strong>Agama</strong></span><br>
                    <span style="font-size: 9pt;"><?= strtoupper($pelamar['nama_agama']); ?></span>
                  </div>
                  <div class="col-sm-6">
                    <span style="font-size: 11pt;"><strong>Status Perkawinan</strong></span><br>
                    <span style="font-size: 9pt;"><?= strtoupper($pelamar['status_perkawinan']); ?></span>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-6">
                    <span style="font-size: 11pt;"><strong>Nomor WA/Telp Aktif</strong></span><br>
                    <span style="font-size: 9pt;"><?= strtoupper($pelamar['no_wa_telp']); ?></span>
                  </div>
                  <div class="col-sm-6">
                    <span style="font-size: 11pt;"><strong>Email Aktif</strong></span><br>
                    <span style="font-size: 9pt;"><?= strtoupper($pelamar['email_pegawai']); ?></span>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>

        <div style="margin-bottom: 20px;">
          <div class="mb-2">
            <span class="h4">Riwayat Pendidikan</span>
          </div>
          <table class="table table-bordered">
            <tr class="table-success">
              <th>No</th>
              <th>Nama Sekolah</th>
              <th>Tingkat - Jurusan</th>
              <th>Tahun Lulus</th>
            </tr>
            <?php $no = 1;
            foreach ($riwayat_pendidikan as $pend) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><span style="font-size: 9pt;"><?= strtoupper($pend['instansi_pendidikan']); ?></span></td>
                <td><span style="font-size: 9pt;"><?= strtoupper($pend['tingkat_pendidikan']); ?> - <?= strtoupper($pend['program_studi']); ?></span></td>
                <td><span style="font-size: 9pt;"><?= $pend['tahun_lulus']; ?></span></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>

        <div style="margin-bottom: 10px;">
          <div class="mb-2 mt-10">
            <span class="h4">Riwayat Pekerjaan</span>
          </div>
          <table class="table table-bordered">
            <tr class="table-danger">
              <th>No</th>
              <th>Tempat Kerja</th>
              <th>Posisi/Jabatan</th>
              <th>Lama Kerja</th>
            </tr>
            <?php $no = 1;
            foreach ($riwayat_pekerjaan as $kerja) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><span style="font-size: 9pt;"><?= strtoupper($kerja['tempat_kerja']); ?></span></td>
                <td><span style="font-size: 9pt;"><?= strtoupper($kerja['posisi_pekerjaan']); ?></span></td>
                <td><span style="font-size: 9pt;"><?= ($kerja['tahun_akhir_bekerja'] - $kerja['tahun_awal_bekerja']); ?> Tahun.</span></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>

        <div style="margin-bottom: 10px;">
          <div class="mb-2 mt-2">
            <span class="h4">Riwayat Organisasi</span>
          </div>
          <table class="table table-bordered">
            <tr class="table-info">
              <th>No</th>
              <th>Nama Organisasi</th>
              <th>Tingkat - Jabatan</th>
              <th>Masa Pengabdian</th>
            </tr>
            <?php $no = 1;
            foreach ($riwayat_organisasi as $organisasi) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><span style="font-size: 9pt;"><?= strtoupper($organisasi['nama_organisasi']); ?></span></td>
                <td><span style="font-size: 9pt;">TINGKAT <?= strtoupper($organisasi['tingkatan']); ?> - SEBAGAI <?= strtoupper($organisasi['jabatan']); ?></span></td>
                <td><span span style="font-size: 9pt;"><?= $organisasi['tahun_awal_jabat']; ?> - <?= $organisasi['tahun_akhir_jabat']; ?></span></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>

        <div style="margin-bottom: 10px;">
          <div class="mb-2 mt-2">
            <span class="h4">Riwayat Proyek</span>
          </div>
          <table class="table table-bordered">
            <tr class="table-warning">
              <th>No</th>
              <th>Nama Proyek</th>
              <th>Tingkat</th>
            </tr>
            <?php $no = 1;
            foreach ($riwayat_proyek as $proyek) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><span style="font-size: 9pt;"><?= strtoupper($proyek['nama_proyek']); ?></span></td>
                <td><span style="font-size: 9pt;">TINGKAT <?= strtoupper($proyek['tingkatan']); ?></span></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>

      </div>

      <div class="card-footer">
        <div class="row">
          <div class="col-auto me-auto"><i class="far fa-copyright"></i> <strong> IT - BAYHI <?= date('Y'); ?> </strong></div>
          <div class="col-auto"><?= $title; ?> | <strong><?= $pelamar['nama_lengkap']; ?></strong> | <?= $pelamar['ket_role']; ?> | <?= $pelamar['nama_unit']; ?></div>
        </div>
      </div>

    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/d5210717f1.js" crossorigin="anonymous"></script>
  <script>
    window.onload = function() {
      window.print();
    };
  </script>
</body>

</html>