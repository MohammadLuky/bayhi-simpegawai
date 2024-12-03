  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?= current_url() != base_url('home_pelamar') ? "collapsed" : '' ?>" href="<?= base_url('home_pelamar') ?>">
          <i class="fas fa-home"></i>
          <span>Home</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= current_url() != base_url('data_pelamar') ? "collapsed" : '' ?>" href="<?= base_url('data_pelamar') ?>">
          <i class="fas fa-tasks"></i>
          <span>Data Pelamar</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= current_url() != base_url('riwayat_hidup') ? "collapsed" : '' ?>" href="<?= base_url('riwayat_hidup') ?>">
          <i class="fas fa-id-card"></i>
          <span>Curriculum Vitae</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-heading">Pages</li>

    </ul>

  </aside><!-- End Sidebar-->