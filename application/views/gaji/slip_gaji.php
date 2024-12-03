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
                <div class="row justify-content-md-center">
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header bg-purple bg-lighten-2">
                                <h4 class="card-title text-white">Slip Gaji</h4>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a href="<?= base_url('gaji'); ?>" target="_blank" data-toggle-tooltip="tooltip" data-placement="top" title="Kembali" class="btn btn-teal btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="col-lg-8">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>: <?= $GetPegawai['nama_lengkap']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Unit Kerja</td>
                                                    <td>: <?= $GetPegawai['nama_unit']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Total Diterima</td>
                                                    <td>: <?= number_format($Totalditerima, 0, ',', '.'); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <th>Keterangan Gaji</th>
                                                        <th>Jumlah Nominal</th>
                                                    </tr>
                                                    <?php foreach ($PenerimaanGaji as $penerimaan): ?>
                                                        <tr class="bg-success white">
                                                            <td><?= $penerimaan['rincian_gaji']; ?></td>
                                                            <td><?= number_format($penerimaan['total_rincian_gaji'], 0, ',', '.'); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    <?php foreach ($PenerimaanJabatanGaji as $jabatan): ?>
                                                        <tr class="bg-success white">
                                                            <td><?= $jabatan['nama_jabatan']; ?></td>
                                                            <td><?= number_format($jabatan['total_rincian_gaji'], 0, ',', '.'); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    <tr>
                                                        <td>Total Penerimaan</td>
                                                        <td><strong><?= number_format($TotalAllPenerimaanGaji, 0, ',', '.');; ?></strong></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <th>Keterangan Gaji</th>
                                                        <th>Jumlah Nominal</th>
                                                    </tr>
                                                    <?php foreach ($PotonganGaji as $potongan): ?>
                                                        <tr class="bg-danger white">
                                                            <td><?= $potongan['rincian_gaji']; ?></td>
                                                            <td><?= number_format($potongan['total_rincian_gaji'], 0, ',', '.'); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    <tr>
                                                        <td>Total Potongan</td>
                                                        <td><strong><?= number_format($TotalAllPotongan, 0, ',', '.'); ?></strong></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
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