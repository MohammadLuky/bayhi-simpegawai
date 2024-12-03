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
                            <li class="breadcrumb-item"><a href="<?= base_url('unit'); ?>"><?= $title; ?></a>
                            </li>
                            <!-- <li class="breadcrumb-item active">Basic DataTables
                            </li> -->
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

        <?php if ($this->session->userdata('role_id') != 1): ?>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-danger">
                        <strong class="h4 text-white">Note.</strong><br>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger mb-2 h5" role="alert">
                            <p>Mohon Jika mengubah Data Unit konfirmasi ke Admin terlebih dahulu.</p>
                            <p>Terimakasih</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="content-body">
            <section id="horizontal">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-cyan bg-darken-4">
                                <h4 class="card-title text-white"><?= $title; ?></h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table display nowrap table-striped table-bordered zero-configuration">
                                            <thead class="text-white text-center" style="background-color: green;">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jabatan</th>
                                                    <th>Unit</th>
                                                    <th>Tahun Periode</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($riwayat_karir as $karir) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $karir['nama_jabatan']; ?></td>
                                                        <td><?= $karir['nama_unit']; ?></td>
                                                        <td class="text-center"><?= $karir['tahun_pengabdian_awal']; ?> - <?= $karir['tahun_pengabdian_akhir']; ?></td>
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