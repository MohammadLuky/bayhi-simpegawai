<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title><?= $title; ?> | e-Pegawai</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/') ?>bayhi.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">

    <!-- CSS Baru -->
    <!-- CSS Vendor -->
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/plugins/forms/switch.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/core/colors/palette-switch.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/css/timeline/vertical-timeline.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/css/forms/selects/select2.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css">

    <!-- CSS Tema -->
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/components.min.css">

    <!-- CSS Pages -->
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/pages/timeline.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/plugins/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/pages/chat-application.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/pages/advanced-cards.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/pages/users.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/plugins/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/plugins/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/plugins/forms/checkboxes-radios.min.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/pages/coming-soon.css">
    <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/chameleon-admin-template/app-assets/css/pages/under-maintenance.min.css">



    <!-- Akhir CSS Baru -->

</head>

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-blue-cyan" data-col="2-columns">

    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="collapse navbar-collapse show" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fas fa-bars text-white"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fas fa-bars text-white"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"> <span class="avatar avatar-online"><img src="<?= base_url('assets/file_foto/'); ?><?= $pegawai['foto']; ?>" alt="avatar"></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="<?= base_url('assets/file_foto/'); ?><?= $pegawai['foto']; ?>" alt="avatar"><span class="user-name text-bold-700 ml-1"><?= strtoupper(perpendekNama($pegawai['nama_lengkap'])); ?></span></span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('datapegawai/data_diri'); ?>"><i class="fas fa-user-edit"></i> Edit Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->