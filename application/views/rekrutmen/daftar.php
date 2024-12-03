<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title><?= $title; ?></title>

  <link rel="icon" href="<?= base_url('assets/') ?>login2/bayhi.ico" type="image/x-icon">
  <!-- Font Icon -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>rekrutmen/fonts/material-icon/css/material-design-iconic-font.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

  <!-- Main css -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>rekrutmen/css/style.css" />
  <style>
    .form-group {
      position: relative;
    }

    #togglePassword1 {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      border: none;
      background: none;
      cursor: pointer;
    }

    #togglePassword2 {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      border: none;
      background: none;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="main">
    <!-- Sign up form -->
    <section class="signup">
      <div class="container">
        <div class="signup-content">
          <div class="signup-form">
            <h3>Daftar Akun Rekrutmen</h3>
            <h3 class="form-title">Bayt Al-hikmah.</h3>
            <form method="POST" class="register-form" id="register-form" action="<?= base_url('rekrutmen/daftar') ?>">
              <div class="form-group">
                <label for="name"><i class="fas fa-user"></i></i></label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?= set_value('nama_lengkap') ?>" autocomplete="off" />
                <?= form_error('nama_lengkap', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>
              </div>
              <div class="form-group">
                <label for="email"><i class="fas fa-mobile-alt"></i></label>
                <input type="number" name="hp" id="hp" autocomplete="off" value="<?= set_value('hp') ?>" maxlength="12" placeholder="Nomor WhatssApp Anda" />
                <input type="hidden" name="tahun_masuk" id="tahun_masuk" readonly value="<?= date('Y'); ?>">
                <?= form_error('hp', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>
              </div>
              <div class="form-group">
                <label for="pass"><i class="fas fa-lock"></i></label>
                <input type="password" name="pass" id="pass" placeholder="Password" />
                <button type="button" id="togglePassword1" class="btn btn-outline-secondary">
                  <i class="fas fa-eye"></i>
                </button>
                <?= form_error('pass', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>
              </div>
              <div class="form-group">
                <label for="re-pass"><i class="fas fa-lock"></i></label>
                <input type="password" name="re_pass" id="re_pass" placeholder="Konfirmasi Password" />
                <button type="button" id="togglePassword2" class="btn btn-outline-secondary">
                  <i class="fas fa-eye"></i>
                </button>
                <?= form_error('re_pass', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>
              </div>
              <p class="text-danger mb-2"><small>* Password minimal 8 karakter terdiri dari angka dan alphabet.</small></p>
              <div class="form-group">
                <select class="form-select" aria-label="Default select example" name="posisi_melamar" id="posisi_melamar">
                  <option selected value="">Pilih Posisi Melamar</option>
                  <option value="7">Staff</option>
                  <option value="8">Guru</option>
                </select>
                <?= form_error('posisi_melamar', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>
              </div>
              <div class="form-group">
                <input type="submit" name="signin" id="signin" class="form-submit" value="Daftar Akun" />
              </div>
              <span>Mohon, setelah melakukan registrasi segera melengkapi Dokumen yang diperlukan.</span>
            </form>
          </div>
          <div class="signup-image">
            <figure>
              <img src="<?= base_url('assets/') ?>rekrutmen/images/signUp.jpg" alt="sing up image" />
            </figure>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/') ?>rekrutmen/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>rekrutmen/js/main.js"></script>
  <script src="https://kit.fontawesome.com/d5210717f1.js" crossorigin="anonymous"></script>
  <script>
    document.getElementById('togglePassword1').addEventListener('click', function(e) {
      const passwordInput = document.getElementById('pass');
      const icon = this.querySelector('i');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });
    document.getElementById('togglePassword2').addEventListener('click', function(e) {
      const passwordInput = document.getElementById('re_pass');
      const icon = this.querySelector('i');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });
  </script>
  <script>
    var InputElement = document.getElementById('hp');

    InputElement.addEventListener("input", function() {
      if (this.value.length > 12) {
        this.value = this.value.slice(0, 12);
      }
    });
  </script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>