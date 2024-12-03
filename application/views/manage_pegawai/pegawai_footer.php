<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block"><?= date('Y'); ?> &copy; <span class="text-bold-800 grey darken-2" target="_blank">IT - BAYHI</span></span>
    </div>
</footer>
<!-- JS Baru  -->
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>

<!-- batas  -->
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/js/extensions/dropzone.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/js/extensions/toastr.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/js/ui/prism.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- batas  -->
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/js/core/app.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script>

<!-- batas -->
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/js/scripts/navs/navs.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/js/scripts/pages/dashboard-ecommerce.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/js/scripts/cards/card-advanced.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/js/scripts/tables/datatables/datatable-basic.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/js/scripts/modal/components-modal.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/js/scripts/forms/checkbox-radio.min.js" type="text/javascript"></script>
<script src="https://demos.themeselection.com/chameleon-admin-template/app-assets/js/scripts/coming-soon/coming-soon.js" type="text/javascript"></script>
<!-- <script src="<?= base_url('assets/pegawai/vendors/') ?>jquery-tabledit-master/jquery.tabledit.min.js" type="text/javascript"></script> -->
<script src="https://kit.fontawesome.com/d5210717f1.js" crossorigin="anonymous"></script>
<!-- Akhir JS Baru -->
<script>
    <?php if ($this->session->flashdata('message')) : ?>
        var pesan = "<?= $this->session->flashdata('message'); ?>";

        Swal.fire({
            position: "top",
            icon: "success",
            title: pesan,
            showConfirmButton: false,
            timer: 4000
        });
    <?php endif ?>
    $('#reload_halaman').on('click', function() {
        location.reload();
    });
    // $(document).ready(function() {
    //     <?php if ($this->session->flashdata('pesan')): ?>
    //         toastr.success('<?= $this->session->flashdata('pesan'); ?>');
    //     <?php endif; ?>
    // });
</script>
<script>
    $('.select2').select2();
    $('[data-toggle-tooltip="tooltip"]').tooltip();

    $(document).ready(function() {
        var startYear = 2012; // Start year
        var endYear = new Date().getFullYear(); // Current year
        var $selectYear = $('#tahun_rekrutmen');

        for (var year = startYear; year <= endYear; year++) {
            $selectYear.append('<option value="' + year + '">' + year + '</option>');
        }

    });
    $(document).ready(function() {
        var startYear = new Date().getFullYear();
        var endYear = 2012;
        var $selectYear = $('#tahun_pengabdian_awal');

        for (var year = startYear; year >= endYear; year--) {
            $selectYear.append('<option value="' + year + '">' + year + '</option>');
        }

    });
    $(document).ready(function() {
        $('.hapus-kebrek').on('click', function(e) {
            e.preventDefault();
            var id_kebutuhan_rekrutmen = $(this).data('id');
            var pesan_terhapus = 'Data Kebutuhan Rekrutmen Berhasil Dihapus.'
            Swal.fire({
                title: 'Apakah anda yakin akan menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url("menurekrutmen/hapus_kebutuhan_rekrutmen") ?>',
                        type: 'POST',
                        data: {
                            id_kebutuhan_rekrutmen: id_kebutuhan_rekrutmen
                        },
                        success: function(response) {
                            Swal.fire(
                                'Berhasil!',
                                pesan_terhapus,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        }
                    });
                }
            })
        });

        $('.hapus-seleksi').click(function() {
            var id_tahap_rekrutmen = $(this).data('id');
            var pesan_terhapus = 'Data Tahapan Seleksi berhasil dihapus.'
            Swal.fire({
                title: 'Apakah anda yakin akan menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url("menurekrutmen/hapus_tahap_rekrutmen") ?>',
                        type: 'POST',
                        data: {
                            id_tahap_rekrutmen: id_tahap_rekrutmen
                        },
                        success: function(response) {
                            Swal.fire(
                                'Berhasil!',
                                pesan_terhapus,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        }
                    });
                }
            })
        });

        // $('.hapus-unit').click(function() {
        //     var id_unit = $(this).data('id');
        //     console.log(id_unit);
        //     var pesan_terhapus = 'Data Unit berhasil dihapus.'
        //     Swal.fire({
        //         title: 'Apakah anda yakin akan menghapus data ini?',
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         confirmButtonText: 'Ya, Hapus!',
        //         cancelButtonColor: '#d33',
        //         cancelButtonText: 'Batal',
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             $.ajax({
        //                 url: '<?= base_url("unit/hapus_unit") ?>',
        //                 type: 'POST',
        //                 data: {
        //                     id_unit: id_unit
        //                 },
        //                 success: function(response) {
        //                     Swal.fire(
        //                         'Berhasil!',
        //                         pesan_terhapus,
        //                         'success'
        //                     ).then(() => {
        //                         location.reload();
        //                     });
        //                 },
        //                 error: function(xhr, status, error) {
        //                     Swal.fire(
        //                         'Error!',
        //                         'Something went wrong.',
        //                         'error'
        //                     );
        //                 }
        //             });
        //         }
        //     })
        // });

        $('.hapus-jabpeg').click(function() {
            var id_jabatan = $(this).data('id');
            var pesan_terhapus = 'Data Jabatan Pegawai berhasil dihapus.'
            Swal.fire({
                title: 'Apakah anda yakin akan menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url("jabatan/hapus_jabatan") ?>',
                        type: 'POST',
                        data: {
                            id_jabatan: id_jabatan
                        },
                        success: function(response) {
                            Swal.fire(
                                'Berhasil!',
                                pesan_terhapus,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        }
                    });
                }
            })
        });

        $('.hapus-statpeg').click(function() {
            var id_status_pegawai = $(this).data('id');
            var pesan_terhapus = 'Data Status Pegawai berhasil dihapus.'
            Swal.fire({
                title: 'Apakah anda yakin akan menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url("statuspegawai/hapus_status_pegawai") ?>',
                        type: 'POST',
                        data: {
                            id_status_pegawai: id_status_pegawai
                        },
                        success: function(response) {
                            Swal.fire(
                                'Berhasil!',
                                pesan_terhapus,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        }
                    });
                }
            })
        });

        $('.hapus-angkel').click(function() {
            var id_anggota_keluarga = $(this).data('id');
            var pesan_terhapus = 'Data Anggota Keluarga berhasil dihapus.'
            Swal.fire({
                title: 'Apakah anda yakin akan menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url("datapegawai/hapus_data_keluarga") ?>',
                        type: 'POST',
                        data: {
                            id_anggota_keluarga: id_anggota_keluarga
                        },
                        success: function(response) {
                            Swal.fire(
                                'Berhasil!',
                                pesan_terhapus,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        }
                    });
                }
            })
        });

        $('#unit_rekrutmen').hide();
        $('#mapel_rekrutmen').hide();
        $('#kebutuhan_role_id').change(function() {
            var selectedData = $(this).val();
            if (selectedData == '7') {
                $('#unit_rekrutmen').show();
                $('#mapel_rekrutmen').hide();
            } else if (selectedData == '8') {
                $('#mapel_rekrutmen').show();
                $('#unit_rekrutmen').hide();
            } else if (selectedData == '') {
                $('#unit_rekrutmen').hide();
                $('#mapel_rekrutmen').hide();
            }
        });

        $('.nonaktif-pegawai').click(function() {
            $('#nonAktifPegawai').modal('show');
            var id_pegawai_update = $(this).data('id');

            $('#id_pegawai_update').val(id_pegawai_update);
        });

        $('.unggah-pegawai').click(function() {
            $('#unggahPegawai').modal('show');
        });

        $('.aktivasi-kebrek').click(function() {
            $('#aktivasiKebRek').modal('show');
            var id_kebutuhan_rekrutmen = $(this).data('id');
            var ket_role = $(this).data('posisi');
            var kebutuhan_kuota = $(this).data('kuota');
            var nama_unit_kebrek = $(this).data('namaunitkebrek');
            // console.log(kebutuhan_kuota);

            $('#id_kebrek_aktif').val(id_kebutuhan_rekrutmen);
            $('#ket_role_kebrek').text(ket_role);
            $('#kebutuhan_kuota_kebrek').text(kebutuhan_kuota);
            $('#nama_unit_kebrek').text(nama_unit_kebrek);
        });

        $('.nonaktivasi-kebrek').click(function() {
            $('#NonAktivasiKebRek').modal('show');
            var id_kebutuhan_rekrutmen = $(this).data('id');
            var ket_role = $(this).data('posisi2');
            var kebutuhan_kuota = $(this).data('kuota2');
            var nama_unit_kebrek = $(this).data('namaunitkebrek2');
            // console.log(kebutuhan_kuota);

            $('#id_kebrek_nonaktif').val(id_kebutuhan_rekrutmen);
            $('#ket_role_kebrek2').text(ket_role);
            $('#kebutuhan_kuota_kebrek2').text(kebutuhan_kuota);
            $('#nama_unit_kebrek2').text(nama_unit_kebrek);
        });

        // $('#edit-pegawai').click(function() {
        //     var pesan_info = 'Menu edit hanya dilakukan di masing-masing akun. Terimakasih!';
        //     Swal.fire({
        //         icon: "error",
        //         title: "Informasi",
        //         text: pesan_info,
        //     });
        // });

        $('.valid-pelamar').click(function() {
            $('#validasiPelamar').modal('show');
            var pelamar_id_validasi = $(this).data('id');
            var nama_pelamar = $(this).data('nama');

            $('#pelamar_id_validasi').val(pelamar_id_validasi);
            $('#nama_pelamar_valid').text(nama_pelamar);
        });

        $('.hapus-jabatan').click(function() {
            $('#hapusJabatan').modal('show');
            var id_pegawai_jabatan = $(this).data('id');
            var nama_pegawai_jabatan = $(this).data('nama');
            var urutanjabatan = $(this).data('urutanjabatan');
            var idhiskar = $(this).data('idhiskar');

            $('#id_pegawai_jabatan').val(id_pegawai_jabatan);
            $('#urutanjabatan').val(urutanjabatan);
            $('#idhiskar').val(idhiskar);
            $('#nama_pegawai_jabatan').text(nama_pegawai_jabatan);
        });

        $('#cek_domisili').change(function() {
            if ($(this).is(':checked')) {
                $('#FormDomisili').hide();
            } else {
                $('#FormDomisili').show();
            }
        });
        $('#check_domisili_edit').change(function() {
            if ($(this).is(':checked')) {
                $('#FormEditDomisili').hide();
            } else {
                $('#FormEditDomisili').show();
            }
        });

        $('#prov_pegawai').change(function() {
            var id_prov = $(this).val();
            if (id_prov !== '') {
                $.ajax({
                    url: '<?= base_url('datapegawai/getKota_byProv'); ?>',
                    type: 'POST',
                    data: {
                        id_prov: id_prov
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        var len = response.length;
                        $("#kota_kab_pegawai").empty();
                        $("#kota_kab_pegawai").append('<option selected value="">Pilih Kota/Kabupaten</option>');
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id_kota_kab'];
                            var name = response[i]['nama_kota_kab'];
                            $('#kota_kab_pegawai').append('<option value="' + id + '">' + name + '</option>');
                        }
                    }
                });
            } else {
                $("#kota_kab_pegawai").empty();
                $("#kota_kab_pegawai").append('<option selected value="">Pilih Kota/Kabupaten</option>');
            }
        });

        $('#kota_kab_pegawai').change(function() {
            var id_kota = $(this).val();
            if (id_kota !== '') {
                $.ajax({
                    url: '<?= base_url('datapegawai/getKec_byKota'); ?>',
                    type: 'POST',
                    data: {
                        id_kota: id_kota
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        var len = response.length;
                        $("#kec_pegawai").empty();
                        $("#kec_pegawai").append('<option selected value="">Pilih Kecamatan</option>');
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id_kec'];
                            var name = response[i]['nama_kecamatan'];
                            $('#kec_pegawai').append('<option value="' + id + '">' + name + '</option>');
                        }
                    }
                });
            } else {
                $("#kec_pegawai").empty();
                $("#kec_pegawai").append('<option selected value="">Pilih Kecamatan</option>');
            }
        });

        $('#kec_pegawai').change(function() {
            var id_kec = $(this).val();
            if (id_kec !== '') {
                $.ajax({
                    url: '<?= base_url('datapegawai/getKel_byKec'); ?>',
                    type: 'POST',
                    data: {
                        id_kec: id_kec
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        var len = response.length;
                        $("#kel_pegawai").empty();
                        $("#kel_pegawai").append('<option selected value="">Pilih Kelurahan</option>');
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id_kel'];
                            var name = response[i]['nama_kelurahan'];
                            $('#kel_pegawai').append('<option value="' + id + '">' + name + '</option>');
                        }
                    }
                });
            } else {
                $("#kel_pegawai").empty();
                $("#kel_pegawai").append('<option selected value="">Pilih Kelurahan</option>');
            }
        });

        $('#prov_pegawai_edit').change(function() {
            var id_prov = $(this).val();
            if (id_prov !== '') {
                $.ajax({
                    url: '<?= base_url('datapegawai/getKota_byProv'); ?>',
                    type: 'POST',
                    data: {
                        id_prov: id_prov
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        var len = response.length;
                        $("#kotakab_pegawai_edit").empty();
                        $("#kotakab_pegawai_edit").append('<option selected value="">Pilih Kota/Kabupaten</option>');
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id_kota_kab'];
                            var name = response[i]['nama_kota_kab'];
                            $('#kotakab_pegawai_edit').append('<option value="' + id + '">' + name + '</option>');
                        }
                    }
                });
            } else {
                $("#kotakab_pegawai_edit").empty();
                $("#kotakab_pegawai_edit").append('<option selected value="">Pilih Kota/Kabupaten</option>');
            }
        });

        $('#kotakab_pegawai_edit').change(function() {
            var id_kota = $(this).val();
            if (id_kota !== '') {
                $.ajax({
                    url: '<?= base_url('datapegawai/getKec_byKota'); ?>',
                    type: 'POST',
                    data: {
                        id_kota: id_kota
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        var len = response.length;
                        $("#kec_pegawai_edit").empty();
                        $("#kec_pegawai_edit").append('<option selected value="">Pilih Kecamatan</option>');
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id_kec'];
                            var name = response[i]['nama_kecamatan'];
                            $('#kec_pegawai_edit').append('<option value="' + id + '">' + name + '</option>');
                        }
                    }
                });
            } else {
                $("#kec_pegawai_edit").empty();
                $("#kec_pegawai_edit").append('<option selected value="">Pilih Kecamatan</option>');
            }
        });

        $('#kec_pegawai_edit').change(function() {
            var id_kec = $(this).val();
            if (id_kec !== '') {
                $.ajax({
                    url: '<?= base_url('datapegawai/getKel_byKec'); ?>',
                    type: 'POST',
                    data: {
                        id_kec: id_kec
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        var len = response.length;
                        $("#kel_pegawai_edit").empty();
                        $("#kel_pegawai_edit").append('<option selected value="">Pilih Kelurahan</option>');
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id_kel'];
                            var name = response[i]['nama_kelurahan'];
                            $('#kel_pegawai_edit').append('<option value="' + id + '">' + name + '</option>');
                        }
                    }
                });
            } else {
                $("#kel_pegawai_edit").empty();
                $("#kel_pegawai_edit").append('<option selected value="">Pilih Kelurahan</option>');
            }
        });

        $('#prov_pegawai_dom').change(function() {
            var id_prov = $(this).val();
            if (id_prov !== '') {
                $.ajax({
                    url: '<?= base_url('datapegawai/getKota_byProv'); ?>',
                    type: 'POST',
                    data: {
                        id_prov: id_prov
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        var len = response.length;
                        $("#kotakab_pegawai_dom").empty();
                        $("#kotakab_pegawai_dom").append('<option selected value="">Pilih Kota/Kabupaten</option>');
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id_kota_kab'];
                            var name = response[i]['nama_kota_kab'];
                            $('#kotakab_pegawai_dom').append('<option value="' + id + '">' + name + '</option>');
                        }
                    }
                });
            } else {
                $("#kotakab_pegawai_dom").empty();
                $("#kotakab_pegawai_dom").append('<option selected value="">Pilih Kota/Kabupaten</option>');
            }
        });

        $('#kotakab_pegawai_dom').change(function() {
            var id_kota = $(this).val();
            if (id_kota !== '') {
                $.ajax({
                    url: '<?= base_url('datapegawai/getKec_byKota'); ?>',
                    type: 'POST',
                    data: {
                        id_kota: id_kota
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        var len = response.length;
                        $("#kec_pegawai_dom").empty();
                        $("#kec_pegawai_dom").append('<option selected value="">Pilih Kecamatan</option>');
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id_kec'];
                            var name = response[i]['nama_kecamatan'];
                            $('#kec_pegawai_dom').append('<option value="' + id + '">' + name + '</option>');
                        }
                    }
                });
            } else {
                $("#kec_pegawai_dom").empty();
                $("#kec_pegawai_dom").append('<option selected value="">Pilih Kecamatan</option>');
            }
        });

        $('#kec_pegawai_dom').change(function() {
            var id_kec = $(this).val();
            if (id_kec !== '') {
                $.ajax({
                    url: '<?= base_url('datapegawai/getKel_byKec'); ?>',
                    type: 'POST',
                    data: {
                        id_kec: id_kec
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        var len = response.length;
                        $("#kel_pegawai_dom").empty();
                        $("#kel_pegawai_dom").append('<option selected value="">Pilih Kelurahan</option>');
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id_kel'];
                            var name = response[i]['nama_kelurahan'];
                            $('#kel_pegawai_dom').append('<option value="' + id + '">' + name + '</option>');
                        }
                    }
                });
            } else {
                $("#kel_pegawai_dom").empty();
                $("#kel_pegawai_dom").append('<option selected value="">Pilih Kelurahan</option>');
            }
        });

        $('#prov_pegawai_domedit').change(function() {
            var id_prov = $(this).val();
            if (id_prov !== '') {
                $.ajax({
                    url: '<?= base_url('datapegawai/getKota_byProv'); ?>',
                    type: 'POST',
                    data: {
                        id_prov: id_prov
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        var len = response.length;
                        $("#kotakab_pegawai_domedit").empty();
                        $("#kotakab_pegawai_domedit").append('<option selected value="">Pilih Kota/Kabupaten</option>');
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id_kota_kab'];
                            var name = response[i]['nama_kota_kab'];
                            $('#kotakab_pegawai_domedit').append('<option value="' + id + '">' + name + '</option>');
                        }
                    }
                });
            } else {
                $("#kotakab_pegawai_domedit").empty();
                $("#kotakab_pegawai_domedit").append('<option selected value="">Pilih Kota/Kabupaten</option>');
            }
        });

        $('#kotakab_pegawai_domedit').change(function() {
            var id_kota = $(this).val();
            if (id_kota !== '') {
                $.ajax({
                    url: '<?= base_url('datapegawai/getKec_byKota'); ?>',
                    type: 'POST',
                    data: {
                        id_kota: id_kota
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        var len = response.length;
                        $("#kec_pegawai_domedit").empty();
                        $("#kec_pegawai_domedit").append('<option selected value="">Pilih Kecamatan</option>');
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id_kec'];
                            var name = response[i]['nama_kecamatan'];
                            $('#kec_pegawai_domedit').append('<option value="' + id + '">' + name + '</option>');
                        }
                    }
                });
            } else {
                $("#kec_pegawai_domedit").empty();
                $("#kec_pegawai_domedit").append('<option selected value="">Pilih Kecamatan</option>');
            }
        });

        $('#kec_pegawai_domedit').change(function() {
            var id_kec = $(this).val();
            if (id_kec !== '') {
                $.ajax({
                    url: '<?= base_url('datapegawai/getKel_byKec'); ?>',
                    type: 'POST',
                    data: {
                        id_kec: id_kec
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log(response);
                        var len = response.length;
                        $("#kel_pegawai_domedit").empty();
                        $("#kel_pegawai_domedit").append('<option selected value="">Pilih Kelurahan</option>');
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id_kel'];
                            var name = response[i]['nama_kelurahan'];
                            $('#kel_pegawai_domedit').append('<option value="' + id + '">' + name + '</option>');
                        }
                    }
                });
            } else {
                $("#kel_pegawai_domedit").empty();
                $("#kel_pegawai_domedit").append('<option selected value="">Pilih Kelurahan</option>');
            }
        });

        $('#tambahRincian_Gaji').on('click', function() {
            $('#CardAddRincianGaji').slideDown();
        });

        $('#BatalTambahRincian_Gaji').on('click', function() {
            $('#CardAddRincianGaji').slideUp();
        });

        $('.hapus-rincian-gaji').click(function() {
            var id_rincian_gaji = $(this).data('id');
            var pesan_terhapus = 'Data Rincian Gaji berhasil dihapus.'

            Swal.fire({
                title: 'Apakah anda yakin akan menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url("gaji/hapus_rincianGaji") ?>',
                        type: 'POST',
                        data: {
                            id_rincian_gaji: id_rincian_gaji
                        },
                        success: function(response) {
                            Swal.fire(
                                'Berhasil!',
                                pesan_terhapus,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        }
                    });
                }
            })
        });

        $('#tambahPeriode_Gaji').click(function() {
            var tahun_periode = $(this).data('tahun');
            var pesan_berhasil = 'Data Periode Tahun ' + tahun_periode + ' Berhasil Ditambah.'

            Swal.fire({
                title: 'Apakah anda yakin akan menambah data periode?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Tambah!',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url("gaji/tambahPeriode") ?>',
                        type: 'POST',
                        data: {
                            tahun_periode: tahun_periode
                        },
                        success: function(response) {
                            Swal.fire(
                                'Berhasil!',
                                pesan_berhasil,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        }
                    });
                }
            })
        });

    });
</script>

<script>
    $(document).ready(function() {

        function formatRupiah(angka) {
            var number_string = angka.replace(/[^,\d]/g, '').toString();
            var split = number_string.split(',');
            var remainder = split[0].length % 3;
            var rupiah = split[0].substr(0, remainder);
            var thousands = split[0].substr(remainder).match(/\d{3}/g);

            if (thousands) {
                var separator = remainder ? '.' : '';
                rupiah += separator + thousands.join('.');
            }

            rupiah = split[1] ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        }

        $(document).on('input', '.nominal-rincian', function() {
            let value = $(this).val();
            $(this).val(formatRupiah(value));
        });

        $(document).on('input', '.nominal-rincian-gaji', function() {
            let value = $(this).val();
            $(this).val(formatRupiah(value));
        });

        $(document).on('input', '#angka_nominal_rincian', function() {
            let value = $(this).val();
            $(this).val(formatRupiah(value));
        });

        $('form').on('submit', function(e) {
            $('#angka_nominal_rincian').each(function() {
                let rawValue = $(this).val().replace(/\./g, '');
                $(this).val(rawValue);
            });
        });

        $(document).on('change', '.jumlah-rincian, .nominal-rincian', function() {
            let $input = $(this);
            let idGaji = $input.data('id');
            let jumlahRincian = $input.closest('tr').find('.jumlah-rincian').val();
            let nominalRincian = $input.closest('tr').find('.nominal-rincian').val().replace(/\./g, '');

            if (!jumlahRincian || !nominalRincian) {
                toastr.error('Kolom tidak boleh kosong.');
                return;
            }

            $.ajax({
                url: "<?= base_url('gaji/update_settingGaji'); ?>",
                method: "POST",
                data: {
                    id_gaji: idGaji,
                    jumlah_rincian_gaji: jumlahRincian,
                    nominal_rincian_gaji: nominalRincian
                },
                success: function(response) {
                    if (response.status === true) {
                        toastr.success(response.pesan);
                    } else {
                        toastr.error(response.pesan);
                    }
                },
                error: function() {
                    toastr.error('Terjadi kesalahan saat mengirim data.');
                }
            });
        });

        $(document).on('change', '.jumlah-rincian-gaji, .nominal-rincian-gaji', function() {
            let $input = $(this);
            let idGaji = $input.data('id');
            let jumlahRincian = $input.closest('tr').find('.jumlah-rincian-gaji').val();
            let nominalRincian = $input.closest('tr').find('.nominal-rincian-gaji').val().replace(/\./g, '');

            if (!jumlahRincian || !nominalRincian) {
                toastr.error('Kolom tidak boleh kosong.');
                return;
            }

            $.ajax({
                url: "<?= base_url('gaji/update_gajiPegawai'); ?>",
                method: "POST",
                data: {
                    id_gaji_input: idGaji,
                    jumlah_rincian_gaji_input: jumlahRincian,
                    nominal_rincian_gaji_input: nominalRincian
                },
                success: function(response) {
                    if (response.status === true) {
                        toastr.success(response.pesan);
                    } else {
                        toastr.error(response.pesan);
                    }
                },
                error: function() {
                    toastr.error('Terjadi kesalahan saat mengirim data.');
                }
            });
        });

    });

    $(document).ready(function() {
        toggleFormState();

        $('#ceklist_setahun').change(function() {
            toggleFormState();
        });

        function toggleFormState() {
            if ($('#ceklist_setahun').is(':checked')) {
                $('#bulan_aktif').prop('disabled', true);
            } else {
                $('#bulan_aktif').prop('disabled', false);
            }
        }
    });
</script>

</body>

</html>