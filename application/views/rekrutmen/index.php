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

    #togglePassword {
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

    <!-- Sing in  Form -->
    <section class="sign-in mt-3">
      <div class="container">
        <div class="signin-content">
          <div class="signin-image">
            <figure>
              <img src="<?= base_url('assets/') ?>rekrutmen/images/signIn.jpg" alt="sing up image" />
            </figure>
          </div>

          <div class="signin-form">
            <?= $this->session->flashdata('message'); ?>
            <?= $this->session->flashdata('message_logout'); ?>
            <h3><strong>LOGIN REKRUTMEN</strong></h3>
            <h3 class="form-title">Bayt Al-hikmah.</h3>
            <form method="POST" class="register-form" id="login-form" action="<?= base_url('rekrutmen') ?>">
              <div class="form-group">
                <label for="username"><i class="fas fa-user"></i></label>
                <input type="text" name="username" id="username" autocomplete="off" placeholder="Nomor WhatssApp yang Terdaftar" value="<?= set_value('username') ?>" />
                <?= form_error('username', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>
              </div>
              <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i></label>
                <input type="password" name="password" id="password" placeholder="Password" />
                <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                  <i class="fas fa-eye"></i>
                </button>
                <?= form_error('password', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', '</div>'); ?>
              </div>
              <div class="form-group form-button">
                <input type="submit" name="signin" id="signin" class="form-submit" value="Masuk!" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- JS -->
  <script src="<?= base_url('assets/') ?>rekrutmen/vendor/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/') ?>rekrutmen/js/main.js"></script>
  <script src="https://kit.fontawesome.com/d5210717f1.js" crossorigin="anonymous"></script>
  <script>
    document.getElementById('togglePassword').addEventListener('click', function(e) {
      const passwordInput = document.getElementById('password');
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
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>