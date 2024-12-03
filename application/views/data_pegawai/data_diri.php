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
                            <li class="breadcrumb-item"><a href="<?= base_url('datapegawai'); ?>">Data Pegawai</a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?= base_url('datapegawai/tambah_pegawai'); ?>"><?= $title; ?></a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <section id="horizontal">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <form action="<?= base_url('datapegawai/data_diri') ?>" method="post">
                                    <div class="card-header bg-secondary">
                                        <div class="row justify-content-end">
                                            <label class="h4 col-md-10 text-white">Form <?= $title; ?></label>
                                            <div class="col-md-2">
                                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Simpan Data" class="btn btn-success btn-sm btn-round"><i class="fas fa-save"></i></button>
                                                <a href="<?= base_url('datapegawai/unit_kerja') ?>" data-toggle="tooltip" data-placement="top" title="Unit Kerja" class="btn btn-warning btn-sm btn-round"><i class="fas fa-briefcase"></i></a>
                                                <a href="<?= base_url('datapegawai/akun_pegawai') ?>" data-toggle="tooltip" data-placement="top" title="Akun Pegawai" class="btn btn-danger btn-sm btn-round"><i class="fas fa-user-cog"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body card-dashboard">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">NIY Pegawai</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="NIY Pegawai Belum Ada." value="<?= $pegawai['niy_pegawai']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">NIK Pegawai <span class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <input type="number" class="form-control <?= (form_error('nik_peg_edit') != '') ? 'is-invalid' : ''; ?>" id="nik_peg_edit" name="nik_peg_edit" autocomplete="off" placeholder="NIK Pegawai." value="<?= $pegawai['nik_pegawai']; ?>">
                                                </div>
                                                <div class="invalid-feedback"><?= form_error('nik_peg_edit'); ?></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">Nama Lengkap Pegawai <span class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control <?= (form_error('nama_pegedit') != '') ? 'is-invalid' : ''; ?>" id="nama_pegedit" name="nama_pegedit" autocomplete="off" placeholder="Tulis Nama beserta gelar bila ada." value="<?= $pegawai['nama_lengkap']; ?>">
                                                </div>
                                                <div class="invalid-feedback"><?= form_error('nama_pegedit'); ?></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">Jenis Kelamin <span class="text-danger">*</span></label>
                                                <div class="row skin skin-square">
                                                    <?php foreach ($jenis_kelamin as $index => $jk) : ?>
                                                        <div class="col-md-6 col-sm-12">
                                                            <fieldset>
                                                                <?php
                                                                $radio_id = 'jk_peg_edit_' . $index;
                                                                ?>
                                                                <input type="radio" name="jk_peg_edit" id="<?= $radio_id; ?>" value="<?= $jk; ?>" <?= set_radio('jk_peg_edit', $jk, $pegawai['jenis_kelamin'] == $jk); ?>>
                                                                <label for="<?= $radio_id; ?>"><?= $jk; ?></label>
                                                            </fieldset>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <!-- Penempatan form_error di luar loop -->
                                                <?= form_error('jk_peg_edit', '<div class="alert alert-danger alert-dismissible mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput1">Tempat Lahir <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control <?= (form_error('tempat_lahir_pegedit') != '') ? 'is-invalid' : ''; ?>" id="tempat_lahir_pegedit" name="tempat_lahir_pegedit" autocomplete="off" placeholder="Tempat Lahir." value="<?= $pegawai['tempat_lahir']; ?>">
                                                </div>
                                                <div class="invalid-feedback"><?= form_error('tempat_lahir_pegedit'); ?></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput3">Tanggal Lahir <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control <?= (form_error('tanggal_lahir_pegedit') != '') ? 'is-invalid' : ''; ?>" id="tanggal_lahir_pegedit" name="tanggal_lahir_pegedit" value="<?= date('Y-m-d', strtotime($pegawai['tanggal_lahir'])); ?>">
                                                </div>
                                                <div class="invalid-feedback"><?= form_error('tanggal_lahir_pegedit'); ?></div>
                                            </div>
                                            <?php if ($pegawai['alamat'] == '') : ?>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="timesheetinput3">Alamat KTP <span class="text-danger">*</span></label>
                                                        <textarea name="alamat_pegedit" id="alamat_pegedit" class="form-control <?= (form_error('alamat_pegedit') != '') ? 'is-invalid' : ''; ?>" placeholder="Alamat KTP."><?= $pegawai['alamat']; ?></textarea>
                                                        <div class="invalid-feedback"><?= form_error('alamat_pegedit'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('prov_pegawai') != '') ? 'is-invalid' : ''; ?>" id="prov_pegawai" name="prov_pegawai">
                                                            <option selected value="">Pilih Provinsi</option>
                                                            <?php foreach ($provinsi as $prov) : ?>
                                                                <option value="<?= $prov['id_provinsi']; ?>"><?= $prov['nama_provinsi']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('prov_pegawai'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('kota_kab_pegawai') != '') ? 'is-invalid' : ''; ?>" id="kota_kab_pegawai" name="kota_kab_pegawai">
                                                            <option selected value="">Pilih Kota/Kabupaten</option>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('kota_kab_pegawai'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('kec_pegawai') != '') ? 'is-invalid' : ''; ?>" id="kec_pegawai" name="kec_pegawai">
                                                            <option selected value="">Pilih Kecamatan</option>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('kec_pegawai'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('kel_pegawai') != '') ? 'is-invalid' : ''; ?>" id="kel_pegawai" name="kel_pegawai">
                                                            <option selected value="">Pilih Kelurahan</option>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('kel_pegawai'); ?></div>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="timesheetinput3">Alamat Lengkap <a href="<?= base_url('datapegawai/edit_alamat'); ?>" class="btn btn-warning btn-sm btn-round" data-toggle="tooltip" data-placement="top" title="Edit Alamat dan Domisili"><i class="fas fa-edit"></i></a></label>
                                                        <textarea name="" id="" class="form-control" readonly><?= $pegawai['alamat']; ?>, Kelurahan <?= ucwords(strtolower($pegawai['nama_kelurahan_pegawai'])); ?>, Kecataman <?= ucwords(strtolower($pegawai['nama_kecamatan_pegawai'])); ?>, <?= ucwords(strtolower($pegawai['nama_kotakab_pegawai'])); ?></textarea>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($pegawai['alamat_domisili'] == '') : ?>
                                                <div class="form-group col-md-12 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1" id="cek_domisili" name="cek_domisili">
                                                        <label class="form-check-label" for="cek_domisili">
                                                            Klik Centang Bila Alamat Domisili sama dengan Alamat KTP Anda.
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <div class="col-md-12">
                                                <?php if ($pegawai['alamat_domisili'] != '') : ?>
                                                    <!-- <div class="col-md-12"> -->
                                                    <div class="form-group">
                                                        <label for="timesheetinput3">Alamat Domisili</label>
                                                        <textarea name="" id="" class="form-control" readonly><?= $pegawai['alamat_domisili']; ?>, Kelurahan <?= ucwords(strtolower($pegawai['nama_kelurahan_domisili'])); ?>, Kecataman <?= ucwords(strtolower($pegawai['nama_kecamatan_domisili'])); ?>, <?= ucwords(strtolower($pegawai['nama_kotakab_domisili'])); ?></textarea>
                                                    </div>
                                                    <!-- </div> -->
                                                <?php else : ?>
                                                    <div class="row" id="FormDomisili">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="timesheetinput3">Alamat Domisili <span class="text-danger">*</span></label>
                                                                <textarea name="alamat_domisili_pegedit" id="alamat_domisili_pegedit" class="form-control <?= (form_error('alamat_domisili_pegedit') != '') ? 'is-invalid' : ''; ?>" placeholder="Alamat Domisili."><?= $pegawai['alamat_domisili']; ?></textarea>
                                                                <div class="invalid-feedback"><?= form_error('alamat_domisili_pegedit'); ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <select class="select2 form-control <?= (form_error('prov_pegawai_dom') != '') ? 'is-invalid' : ''; ?>" id="prov_pegawai_dom" name="prov_pegawai_dom">
                                                                    <option selected value="">Pilih Provinsi</option>
                                                                    <?php foreach ($provinsi as $prov) : ?>
                                                                        <option value="<?= $prov['id_provinsi']; ?>"><?= $prov['nama_provinsi']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <div class="invalid-feedback"><?= form_error('prov_pegawai_dom'); ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <select class="select2 form-control <?= (form_error('kotakab_pegawai_dom') != '') ? 'is-invalid' : ''; ?>" id="kotakab_pegawai_dom" name="kotakab_pegawai_dom">
                                                                    <option selected value="">Pilih Kota/Kabupaten</option>
                                                                </select>
                                                                <div class="invalid-feedback"><?= form_error('kotakab_pegawai_dom'); ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <select class="select2 form-control <?= (form_error('kec_pegawai_dom') != '') ? 'is-invalid' : ''; ?>" id="kec_pegawai_dom" name="kec_pegawai_dom">
                                                                    <option selected value="">Pilih Kecamatan</option>
                                                                </select>
                                                                <div class="invalid-feedback"><?= form_error('kec_pegawai_dom'); ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <select class="select2 form-control <?= (form_error('kel_pegawai_dom') != '') ? 'is-invalid' : ''; ?>" id="kel_pegawai_dom" name="kel_pegawai_dom">
                                                                    <option selected value="">Pilih Kelurahan</option>
                                                                </select>
                                                                <div class="invalid-feedback"><?= form_error('kel_pegawai_dom'); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="row col-md-12">
                                                <div class="col-md-6">
                                                    <label for="timesheetinput1">Agama <span class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('agama_pegedit') != '') ? 'is-invalid' : ''; ?>" id="agama_pegedit" name="agama_pegedit">
                                                            <?php foreach ($agama as $religion) : ?>
                                                                <?php if ($pegawai['agama_id'] == $religion['id_agama']) : ?>
                                                                    <option value="<?= $religion['id_agama']; ?>" selected><?= $religion['nama_agama']; ?></option>
                                                                <?php else : ?>
                                                                    <option value="<?= $religion['id_agama']; ?>"><?= $religion['nama_agama']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('agama_pegedit'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="timesheetinput1">Status Perkawinan <span class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('status_kawin_pegedit') != '') ? 'is-invalid' : ''; ?>" id="status_kawin_pegedit" name="status_kawin_pegedit">
                                                            <option value="">Pilih Status Perkawinan</option>
                                                            <?php foreach ($status_perkawinan as $sp) : ?>
                                                                <?php if ($pegawai['status_perkawinan'] == $sp) : ?>
                                                                    <option value="<?= $sp; ?>" selected><?= $sp; ?></option>
                                                                <?php else : ?>
                                                                    <option value="<?= $sp; ?>"><?= $sp; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('status_kawin_pegedit'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="timesheetinput1">Nomor Telp / WhatsApp <span class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <input type="number" class="form-control <?= (form_error('no_telp_pegedit') != '') ? 'is-invalid' : ''; ?>" id="no_telp_pegedit" name="no_telp_pegedit" autocomplete="off" placeholder="Nomor WA/Telp." value="<?= $pegawai['no_wa_telp']; ?>">
                                                    </div>
                                                    <div class="invalid-feedback"><?= form_error('no_telp_pegedit'); ?></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="timesheetinput1">Email Pegawai</label>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" id="email_pegedit" name="email_pegedit" autocomplete="off" placeholder="Email Pegawai." value="<?= $pegawai['email_pegawai']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->