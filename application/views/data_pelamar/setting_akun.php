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

    <form action="<?= base_url('datapelamar/setting_akun') ?>" method="POST">
      <div class="page-inner mt--5">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-secondary">
              <h4 class="card-title">Setting Akun</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Username</label>
                    <input type="text" class="form-control form-control <?= (form_error('username') != '') ? 'is-invalid' : ''; ?>" id="username" name="username" readonly value="<?= $pelamar['username']; ?>">
                    <div class="invalid-feedback"><?= form_error('username'); ?></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Password Lama</label>
                    <input type="text" class="form-control form-control <?= (form_error('pass_tampil') != '') ? 'is-invalid' : ''; ?>" id="pass_tampil" name="pass_tampil" value="<?= $pelamar['pass_tampil']; ?>" readonly>
                    <div class="invalid-feedback"><?= form_error('pass_tampil'); ?></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Password Baru</label>
                    <input type="password" class="form-control form-control <?= (form_error('password_baru') != '') ? 'is-invalid' : ''; ?>" id="password_baru" name="password_baru" autocomplete="off" placeholder="Password Baru.">
                    <div class="invalid-feedback"><?= form_error('password_baru'); ?></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="largeInput">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control form-control <?= (form_error('password_baru2') != '') ? 'is-invalid' : ''; ?>" id="password_baru2" name="password_baru2" autocomplete="off" placeholder="Konfirmasi Password.">
                    <div class="invalid-feedback"><?= form_error('password_baru2'); ?></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-action">
              <button class="btn btn-info" type="submit">Simpan Data</button>
            </div>
          </div>
        </div>
      </div>
    </form>

  </div>
</div>