<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title"><?= $title; ?></h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?= current_url(); ?>"><?= $title; ?></a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?= validation_errors(); ?></strong>
            </div>
        <?php endif; ?>

        <div class="content-body">
            <section id="horizontal">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-cyan bg-darken-4">
                                <!-- <div class="row justify-content-end"> -->
                                <h4 class="card-title text-white">Tabel <?= $title; ?></h4>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <?php if (!$is_tahun_aktif): ?>
                                                <button data-toggle-tooltip="tooltip" data-placement="top" title="Tambah Data" class="btn btn-success btn-sm btn-round" id="tambahPeriode_Gaji" data-tahun="<?= date('Y'); ?>"><i class="fas fa-plus-square"></i></button>
                                            <?php else: ?>
                                                <button class="btn btn-success btn-sm btn-round" disabled data-toggle-tooltip="tooltip" data-placement="top" title="Tahun sudah aktif"><i class="fas fa-plus-square"></i></button>
                                            <?php endif; ?>
                                            <a href="<?= base_url('gaji/settingGajiSetahun'); ?>" data-toggle-tooltip="tooltip" data-placement="top" title="Setting Gaji Setahun" class="btn btn-warning btn-sm btn-round"><i class="fas fa-wrench"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered zero-configuration">
                                            <thead class="text-white text-center" style="background-color: green;">
                                                <tr>
                                                    <th style="width: 10%;">No</th>
                                                    <th style="width: 35%;">Tahun</th>
                                                    <th style="width: 35%;">Bulan</th>
                                                    <th style="width: 20%;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($PeriodeGaji as $periode) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++; ?></td>
                                                        <td class="text-center"><?= $periode['tahun']; ?></td>
                                                        <td class="text-center"><?= $periode['nama_bulan']; ?></td>
                                                        <td class="text-center">
                                                            <a href="<?= base_url('gaji/pegawai_perperiode_gaji/' . $periode['id_periode_gaji']); ?>" class="btn btn-sm btn-success" data-toggle-tooltip="tooltip" data-placement="top" title="Pegawai Per Periode Gaji"><i class="fa fa-plus"></i></a>
                                                            <a href="" class="btn btn-sm btn-danger" data-toggle-tooltip="tooltip" data-placement="top" title="Non Aktif Periode"><i class="fas fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>
<!-- END: Content-->