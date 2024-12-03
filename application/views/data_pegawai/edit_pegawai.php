<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12">
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
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-header bg-secondary">
                                    <div class="row justify-content-end">
                                        <label class="h4 col-md-12 text-white">Akun Pegawai </label>
                                    </div>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="timesheetinput1">Username</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?= $GetPegawai['username']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="timesheetinput1">Password</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?= $GetPegawai['pass_tampil']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <label class="h4 text-white">Foto</label>
                            </div>
                            <div class="card-body">
                                <div class="profile-image text-center">
                                    <img src="<?= base_url('assets/file_foto/'); ?><?= $GetPegawai['foto']; ?>" class="rounded-circle img-border height-100" alt="Card image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="horizontal">
                <div class="row justify-content-md-center">
                    <div class="col-lg-12">
                        <form action="<?= base_url('datapegawai/edit_pegawai/' . $GetPegawai['id_pegawai']) ?>" method="post">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-header bg-danger">
                                        <div class="row justify-content-end">
                                            <label class="h4 col-md-10 text-white">Form <?= $title; ?></label>
                                            <div class="col-md-2">
                                                <a href="<?= base_url('datapegawai'); ?>" data-toggle="tooltip" data-placement="top" title="Data Pegawai" class="btn btn-warning btn-sm btn-round"><i class="fas fa-arrow-circle-left"></i></a>
                                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Simpan Data" class="btn btn-success btn-sm btn-round"><i class="fas fa-save"></i></button>
                                                <a href="<?= base_url('datapegawai/berkas_pegawai/' . $GetPegawai['id_pegawai']); ?>" data-toggle="tooltip" data-placement="top" title="Upload Berkas" class="btn btn-info btn-sm btn-round"><i class="fas fa-folder-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body card-dashboard">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">NIK Pegawai</label>
                                                <div class="form-group">
                                                    <input type="number" class="form-control <?= (form_error('nik_pegawai_edit') != '') ? 'is-invalid' : ''; ?>" id="nik_pegawai_edit" name="nik_pegawai_edit" autocomplete="off" placeholder="NIK Pegawai." value="<?= $GetPegawai['nik_pegawai']; ?>">
                                                </div>
                                                <div class="invalid-feedback"><?= form_error('nik_pegawai_edit'); ?></div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">NIY Pegawai</label>
                                                    <input class="form-control <?= (form_error('niy_pegawai_edit') != '') ? 'is-invalid' : ''; ?>" type="text" id="niy_pegawai_edit" name="niy_pegawai_edit" autocomplete="off" placeholder="NIY Pegawai." value="<?= $GetPegawai['niy_pegawai'] ?>">
                                                    <div class="invalid-feedback"><?= form_error('niy_pegawai_edit'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Nama Lengkap Pegawai</label>
                                                    <input class="form-control <?= (form_error('nama_lengkap_edit') != '') ? 'is-invalid' : ''; ?>" type="text" id="nama_lengkap_edit" name="nama_lengkap_edit" autocomplete="off" placeholder="Tulis Nama beserta gelar bila ada." value="<?= $GetPegawai['nama_lengkap'] ?>">
                                                    <div class="invalid-feedback"><?= form_error('nama_lengkap_edit'); ?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Jenis Kelamin</label>
                                                <div class="row skin skin-square">
                                                    <?php foreach ($jenis_kelamin as $index => $jk) : ?>
                                                        <div class="col-md-6 col-sm-12">
                                                            <fieldset>
                                                                <?php
                                                                $radio_id = 'jk_pegawai_edit_' . $index;
                                                                ?>
                                                                <input type="radio" name="jk_pegawai_edit" id="<?= $radio_id; ?>" value="<?= $jk; ?>" <?= set_radio('jk_pegawai_edit', $jk, $GetPegawai['jenis_kelamin'] == $jk); ?>>
                                                                <label for="<?= $radio_id; ?>"><?= $jk; ?></label>
                                                            </fieldset>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <!-- Penempatan form_error di luar loop -->
                                                <?= form_error('jk_pegawai_edit', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Tempat Lahir</label>
                                                    <input class="form-control <?= (form_error('tempat_lahir_edit') != '') ? 'is-invalid' : ''; ?>" type="text" id="tempat_lahir_edit" name="tempat_lahir_edit" autocomplete="off" placeholder="Tempat Lahir." value="<?= $GetPegawai['tempat_lahir'] ?>">
                                                    <div class="invalid-feedback"><?= form_error('tempat_lahir_edit'); ?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timesheetinput3">Tanggal Lahir</label>
                                                    <input type="date" class="form-control <?= (form_error('tanggal_lahir_edit') != '') ? 'is-invalid' : ''; ?>" id="tanggal_lahir_edit" name="tanggal_lahir_edit" value="<?= date('Y-m-d', strtotime($GetPegawai['tanggal_lahir'])); ?>">
                                                </div>
                                                <div class="invalid-feedback"><?= form_error('tanggal_lahir_edit'); ?></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php if ($GetPegawai['alamat'] == '') : ?>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="timesheetinput3">Alamat KTP </label>
                                                        <textarea name="alamat_pegawai_edit" id="alamat_pegawai_edit" class="form-control <?= (form_error('alamat_pegawai_edit') != '') ? 'is-invalid' : ''; ?>" placeholder="Alamat KTP."><?= $GetPegawai['alamat']; ?></textarea>
                                                        <div class="invalid-feedback"><?= form_error('alamat_pegawai_edit'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('prov_pegawai_edit') != '') ? 'is-invalid' : ''; ?>" id="prov_pegawai_edit" name="prov_pegawai_edit">
                                                            <option selected value="">Pilih Provinsi</option>
                                                            <?php foreach ($provinsi as $prov) : ?>
                                                                <option value="<?= $prov['id_provinsi']; ?>"><?= $prov['nama_provinsi']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('prov_pegawai_edit'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('kotakab_pegawai_edit') != '') ? 'is-invalid' : ''; ?>" id="kotakab_pegawai_edit" name="kotakab_pegawai_edit">
                                                            <option selected value="">Pilih Kota/Kabupaten</option>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('kotakab_pegawai_edit'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('kec_pegawai_edit') != '') ? 'is-invalid' : ''; ?>" id="kec_pegawai_edit" name="kec_pegawai_edit">
                                                            <option selected value="">Pilih Kecamatan</option>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('kec_pegawai_edit'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('kel_pegawai_edit') != '') ? 'is-invalid' : ''; ?>" id="kel_pegawai_edit" name="kel_pegawai_edit">
                                                            <option selected value="">Pilih Kelurahan</option>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('kel_pegawai_edit'); ?></div>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="timesheetinput3">Alamat Lengkap <a href="<?= base_url('datapegawai/edit_alamat_pegawai/' . $GetPegawai['id_pegawai']); ?>" class="btn btn-warning btn-sm btn-round" data-toggle="tooltip" data-placement="top" title="Edit Alamat dan Domisili"><i class="fas fa-edit"></i></a></label>
                                                        <textarea name="" id="" class="form-control" readonly><?= $GetPegawai['alamat']; ?>, Kelurahan <?= ucwords(strtolower($GetPegawai['nama_kelurahan_pegawai'])); ?>, Kecataman <?= ucwords(strtolower($GetPegawai['nama_kecamatan_pegawai'])); ?>, <?= ucwords(strtolower($GetPegawai['nama_kotakab_pegawai'])); ?></textarea>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($GetPegawai['alamat_domisili'] == '') : ?>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1" id="check_domisili_edit" name="check_domisili_edit">
                                                        <label class="form-check-label" for="check_domisili_edit">
                                                            Klik Centang Bila Alamat Domisili sama dengan Alamat KTP Anda.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php if ($GetPegawai['alamat_domisili'] != '') : ?>
                                                    <div class="form-group">
                                                        <label for="timesheetinput3">Alamat Domisili</label>
                                                        <textarea name="" id="" class="form-control" readonly><?= $GetPegawai['alamat_domisili']; ?>, Kelurahan <?= ucwords(strtolower($GetPegawai['nama_kelurahan_domisili'])); ?>, Kecataman <?= ucwords(strtolower($GetPegawai['nama_kecamatan_domisili'])); ?>, <?= ucwords(strtolower($GetPegawai['nama_kotakab_domisili'])); ?></textarea>
                                                    </div>
                                                <?php else : ?>
                                                    <div id="FormEditDomisili">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="timesheetinput3">Alamat Domisili </label>
                                                                    <textarea name="alamatdom_pegawaiedit" id="alamatdom_pegawaiedit" class="form-control <?= (form_error('alamatdom_pegawaiedit') != '') ? 'is-invalid' : ''; ?>" placeholder="Alamat Domisili."><?= $GetPegawai['alamat_domisili']; ?></textarea>
                                                                    <div class="invalid-feedback"><?= form_error('alamatdom_pegawaiedit'); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <select class="select2 form-control <?= (form_error('prov_pegawai_domedit') != '') ? 'is-invalid' : ''; ?>" id="prov_pegawai_domedit" name="prov_pegawai_domedit">
                                                                        <option selected value="">Pilih Provinsi</option>
                                                                        <?php foreach ($provinsi as $prov) : ?>
                                                                            <option value="<?= $prov['id_provinsi']; ?>"><?= $prov['nama_provinsi']; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <div class="invalid-feedback"><?= form_error('prov_pegawai_domedit'); ?></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <select class="select2 form-control <?= (form_error('kotakab_pegawai_domedit') != '') ? 'is-invalid' : ''; ?>" id="kotakab_pegawai_domedit" name="kotakab_pegawai_domedit">
                                                                        <option selected value="">Pilih Kota/Kabupaten</option>
                                                                    </select>
                                                                    <div class="invalid-feedback"><?= form_error('kotakab_pegawai_domedit'); ?></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <select class="select2 form-control <?= (form_error('kec_pegawai_domedit') != '') ? 'is-invalid' : ''; ?>" id="kec_pegawai_domedit" name="kec_pegawai_domedit">
                                                                        <option selected value="">Pilih Kecamatan</option>
                                                                    </select>
                                                                    <div class="invalid-feedback"><?= form_error('kec_pegawai_domedit'); ?></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <select class="select2 form-control <?= (form_error('kel_pegawai_domedit') != '') ? 'is-invalid' : ''; ?>" id="kel_pegawai_domedit" name="kel_pegawai_domedit">
                                                                        <option selected value="">Pilih Kelurahan</option>
                                                                    </select>
                                                                    <div class="invalid-feedback"><?= form_error('kel_pegawai_domedit'); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="timesheetinput1">
                                                    Pilih Jenis Pegawai
                                                </label>
                                                <div class="form-group">
                                                    <select class="select2 form-control <?= (form_error('role_pegawai_edit') != '') ? 'is-invalid' : ''; ?>" id="role_pegawai_edit" name="role_pegawai_edit">
                                                        <option value="">Pilih Status</option>
                                                        <?php foreach ($roles as $role) : ?>
                                                            <?php if ($role['id_role'] >= 7) : ?>
                                                                <?php if ($role['id_role'] == $GetPegawai['role_id']): ?>
                                                                    <option value="<?= $role['id_role']; ?>" selected><?= $role['ket_role']; ?></option>
                                                                <?php else: ?>
                                                                    <option value="<?= $role['id_role']; ?>"><?= $role['ket_role']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback"><?= form_error('role_pegawai_edit'); ?></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="timesheetinput1">
                                                    Pilih Unit
                                                </label>
                                                <div class="form-group">
                                                    <select class="select2 form-control <?= (form_error('unit_pegawai_edit') != '') ? 'is-invalid' : ''; ?>" id="unit_pegawai_edit" name="unit_pegawai_edit">
                                                        <?php foreach ($units as $unit) : ?>
                                                            <?php if ($unit['id_unit'] == $GetPegawai['unit_kerja_id']) : ?>
                                                                <option value="<?= $unit['id_unit']; ?>" selected><?= $unit['nama_unit']; ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $unit['id_unit']; ?>"><?= $unit['nama_unit']; ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback"><?= form_error('unit_pegawai_edit'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php if ($GetPegawai['ket_guru_id'] != 0): ?>
                                                <div class="col-lg-6">
                                                    <label for="timesheetinput1">
                                                        Pilih Mata Pelajaran
                                                    </label>
                                                    <div class="form-group">
                                                        <select class="select2 form-control <?= (form_error('mapel_guru_edit') != '') ? 'is-invalid' : ''; ?>" id="mapel_guru_edit" name="mapel_guru_edit">
                                                            <option value="">Pilih Mata Pelajaran</option>
                                                            <?php foreach ($mapels as $mapel) : ?>
                                                                <?php if ($mapel['id_mapel_guru'] == $GetPegawai['ket_guru_id']): ?>
                                                                    <option value="<?= $mapel['id_mapel_guru']; ?>" selected><?= $mapel['mata_pelajaran']; ?></option>
                                                                <?php else: ?>
                                                                    <option value="<?= $mapel['id_mapel_guru']; ?>"><?= $mapel['mata_pelajaran']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('mapel_guru_edit'); ?></div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="<?= $GetPegawai['ket_guru_id'] != 0 ? 'col-lg-6' : 'col-lg-12' ?>">
                                                <label for="timesheetinput1">
                                                    Pilih Status Pegawai
                                                </label>
                                                <div class="form-group">
                                                    <select class="select2 form-control <?= (form_error('status_pegawai_edit') != '') ? 'is-invalid' : ''; ?>" id="status_pegawai_edit" name="status_pegawai_edit">
                                                        <option value="">Pilih Status Pegawai</option>
                                                        <?php foreach ($status as $st) : ?>
                                                            <?php if ($st['id_status_pegawai'] != 4) : ?>
                                                                <?php if ($st['id_status_pegawai'] == $GetPegawai['status_pegawai_id']): ?>
                                                                    <option value="<?= $st['id_status_pegawai']; ?>" selected><?= $st['ket_status_pegawai']; ?></option>
                                                                <?php else: ?>
                                                                    <option value="<?= $st['id_status_pegawai']; ?>"><?= $st['ket_status_pegawai']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback"><?= form_error('status_pegawai_edit'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">Agama </label>
                                                <div class="form-group">
                                                    <select class="select2 form-control <?= (form_error('agama_pegawai_edit') != '') ? 'is-invalid' : ''; ?>" id="agama_pegawai_edit" name="agama_pegawai_edit">
                                                        <?php foreach ($agama as $religion) : ?>
                                                            <?php if ($GetPegawai['agama_id'] == $religion['id_agama']) : ?>
                                                                <option value="<?= $religion['id_agama']; ?>" selected><?= $religion['nama_agama']; ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $religion['id_agama']; ?>"><?= $religion['nama_agama']; ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback"><?= form_error('agama_pegawai_edit'); ?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">Status Perkawinan </label>
                                                <div class="form-group">
                                                    <select class="select2 form-control <?= (form_error('statuskawin_pegawai_edit') != '') ? 'is-invalid' : ''; ?>" id="statuskawin_pegawai_edit" name="statuskawin_pegawai_edit">
                                                        <option value="">Pilih Status Perkawinan</option>
                                                        <?php foreach ($status_perkawinan as $sp) : ?>
                                                            <?php if ($GetPegawai['status_perkawinan'] == $sp) : ?>
                                                                <option value="<?= $sp; ?>" selected><?= $sp; ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $sp; ?>"><?= $sp; ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback"><?= form_error('statuskawin_pegawai_edit'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">Nomor Telp / WhatsApp </label>
                                                <div class="form-group">
                                                    <input type="number" class="form-control <?= (form_error('notelp_pegawai_edit') != '') ? 'is-invalid' : ''; ?>" id="notelp_pegawai_edit" name="notelp_pegawai_edit" autocomplete="off" placeholder="Nomor WA/Telp." value="<?= $GetPegawai['no_wa_telp']; ?>">
                                                </div>
                                                <div class="invalid-feedback"><?= form_error('notelp_pegawai_edit'); ?></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="timesheetinput1">Email Pegawai</label>
                                                <div class="form-group">
                                                    <input type="email" class="form-control <?= (form_error('email_pegawai_edit') != '') ? 'is-invalid' : ''; ?>" id="email_pegawai_edit" name="email_pegawai_edit" autocomplete="off" placeholder="Email Pegawai." value="<?= $GetPegawai['email_pegawai']; ?>">
                                                </div>
                                                <div class="invalid-feedback"><?= form_error('email_pegawai_edit'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->