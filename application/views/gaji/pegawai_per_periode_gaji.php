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

        <div class="content-body">
            <section id="horizontal">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-cyan bg-darken-4">
                                <h4 class="card-title text-white">Tabel <?= $title; ?></h4>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a href="<?= base_url('gaji'); ?>" type="submit" data-toggle-tooltip="tooltip" data-placement="top" title="Kembali" class="btn btn-warning btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
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
                                                    <th style="width: 35%;">Nama Pegawai</th>
                                                    <th style="width: 20%;">Tambah Gaji</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($PegawaiGaji as $pegawai) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++; ?></td>
                                                        <td class="text-center"><?= $pegawai['nama_lengkap']; ?></td>
                                                        <td class="text-center">
                                                            <a href="<?= base_url('gaji/InputGajiPegawai/' . $periodeGaji . '/' . $pegawai['id_pegawai']); ?>" class="btn btn-sm btn-success" data-toggle-tooltip="tooltip" data-placement="top" title="Input Gaji Pegawai"><i class="fa fa-plus"></i></a>
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