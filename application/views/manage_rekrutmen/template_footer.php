<footer class="footer">
	<div class="container-fluid">
		<div class="copyright ml-auto">
			<i class="far fa-copyright"></i> <strong> IT - BAYHI <?= date('Y'); ?> </strong>
		</div>
	</div>
</footer>
</div>

<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="<?= base_url('assets/manage/') ?>js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url('assets/manage/') ?>js/core/popper.min.js"></script>
<script src="<?= base_url('assets/manage/') ?>js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="<?= base_url('assets/manage/') ?>js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url('assets/manage/') ?>js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<script src="<?= base_url('assets/manage/') ?>js/moment.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?= base_url('assets/manage/') ?>js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="<?= base_url('assets/manage/') ?>js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?= base_url('assets/manage/') ?>js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?= base_url('assets/manage/') ?>js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url('assets/manage/') ?>js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<!-- <script src="<?= base_url('assets/manage/') ?>js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> -->

<!-- jQuery Vector Maps -->
<script src="<?= base_url('assets/manage/') ?>js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/manage/') ?>js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<!-- <script src="<?= base_url('assets/manage/') ?>js/plugin/sweetalert/sweetalert.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Atlantis JS -->
<script src="<?= base_url('assets/manage/') ?>js/bootstrap-toggle.min.js"></script>
<script src="<?= base_url('assets/manage/') ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/manage/') ?>js/bootstrap-datetimepicker.min.js"></script>
<script src="<?= base_url('assets/manage/') ?>js/select2.full.min.js"></script>
<script src="<?= base_url('assets/manage/') ?>js/dropzone.min.js"></script>
<script src="<?= base_url('assets/manage/') ?>js/atlantis.min.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="<?= base_url('assets/manage/') ?>js/setting-demo.js"></script>
<script src="<?= base_url('assets/manage/') ?>js/demo.js"></script>
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
</script>
<script>
	$(document).ready(function() {
		$('#jenis_kelamin').select2({
			theme: "bootstrap"
		});
		$('#agama').select2({
			theme: "bootstrap"
		});
		$('#status_perkawinan').select2({
			theme: "bootstrap"
		});
		$('#prov_rekrutmen').select2({
			theme: "bootstrap"
		});
		$('#kota_kab_rekrutmen').select2({
			theme: "bootstrap"
		});
		$('#kec_rekrutmen').select2({
			theme: "bootstrap"
		});
		$('#kel_rekrutmen').select2({
			theme: "bootstrap"
		});
		$('#jenjang_pend').select2({
			theme: "bootstrap"
		});
		$('#tingkat_organisasi_id').select2({
			theme: "bootstrap"
		});
		$('#tingkat_proyek_id').select2({
			theme: "bootstrap"
		});
		$('#pilih_unit').select2({
			theme: "bootstrap"
		});
		$('#pilih_mapel').select2({
			theme: "bootstrap"
		});
		$('#tahap_id_hisrek').select2({
			theme: "bootstrap"
		});
		$('#status_hisrek').select2({
			theme: "bootstrap"
		});
		$('#pegawai_id_hisrek').select2({
			theme: "bootstrap"
		});

		$('#prov_rek_domisili').select2({
			theme: "bootstrap"
		});
		$('#kota_kab_rek_domisili').select2({
			theme: "bootstrap"
		});
		$('#kec_rek_domisili').select2({
			theme: "bootstrap"
		});
		$('#kel_rek_domisili').select2({
			theme: "bootstrap"
		});

		// Select2 untuk Menu Kebutuhan Rekrutmen

		$('#kebutuhan_role_id').select2({
			theme: "bootstrap"
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

		$('#cek_domisili').change(function() {
			if ($(this).is(':checked')) {
				$('#FormDomisili').hide();
			} else {
				$('#FormDomisili').show();
			}
		});

		// End Menu Kebutuhan Rekrutmen

		$('#kebutuhan_unit_id').select2({
			theme: "bootstrap",
			width: '100%'
		});
		$('#kebutuhan_mapel_id').select2({
			theme: "bootstrap",
			width: '100%'
		});
		$('#daftar_pegawai').DataTable();
		$('#tableSeleksi').DataTable();
		$('#kebutuhan_rek').DataTable();


		$(document).ready(function() {
			var startYear = 1950; // Start year
			var endYear = new Date().getFullYear(); // Current year
			var $selectYear = $('#tahun_lulus');

			// Generate years dynamically
			for (var year = startYear; year <= endYear; year++) {
				$selectYear.append('<option value="' + year + '">' + year + '</option>');
			}

			// Initialize Select2
			$selectYear.select2({
				theme: "bootstrap"
			});
		});

		$(document).ready(function() {
			var startYear = 2012; // Start year
			var endYear = new Date().getFullYear(); // Current year
			var $selectYear = $('#tahun_rekrutmen');

			// Generate years dynamically
			for (var year = startYear; year <= endYear; year++) {
				$selectYear.append('<option value="' + year + '">' + year + '</option>');
			}

			// Initialize Select2
			$selectYear.select2({
				theme: "bootstrap"
			});
		});


		$('#prov_rekrutmen').change(function() {
			var id_prov = $(this).val();
			if (id_prov !== '') {
				$.ajax({
					url: '<?= base_url('datapelamar/getKota_byProv'); ?>',
					type: 'POST',
					data: {
						id_prov: id_prov
					},
					dataType: 'JSON',
					success: function(response) {
						console.log(response);
						var len = response.length;
						$("#kota_kab_rekrutmen").empty();
						$("#kota_kab_rekrutmen").append('<option selected value="">Pilih Kota/Kabupaten</option>');
						for (var i = 0; i < len; i++) {
							var id = response[i]['id_kota_kab'];
							var name = response[i]['nama_kota_kab'];
							$('#kota_kab_rekrutmen').append('<option value="' + id + '">' + name + '</option>');
						}
					}
				});
			} else {
				$("#kota_kab_rekrutmen").empty();
				$("#kota_kab_rekrutmen").append('<option selected value="">Pilih Kota/Kabupaten</option>');
			}
		});

		$('#kota_kab_rekrutmen').change(function() {
			var id_kota = $(this).val();
			if (id_kota !== '') {
				$.ajax({
					url: '<?= base_url('datapelamar/getKec_byKota'); ?>',
					type: 'POST',
					data: {
						id_kota: id_kota
					},
					dataType: 'JSON',
					success: function(response) {
						console.log(response);
						var len = response.length;
						$("#kec_rekrutmen").empty();
						$("#kec_rekrutmen").append('<option selected value="">Pilih Kecamatan</option>');
						for (var i = 0; i < len; i++) {
							var id = response[i]['id_kec'];
							var name = response[i]['nama_kecamatan'];
							$('#kec_rekrutmen').append('<option value="' + id + '">' + name + '</option>');
						}
					}
				});
			} else {
				$("#kec_rekrutmen").empty();
				$("#kec_rekrutmen").append('<option selected value="">Pilih Kecamatan</option>');
			}
		});

		$('#kec_rekrutmen').change(function() {
			var id_kec = $(this).val();
			if (id_kec !== '') {
				$.ajax({
					url: '<?= base_url('datapelamar/getKel_byKec'); ?>',
					type: 'POST',
					data: {
						id_kec: id_kec
					},
					dataType: 'JSON',
					success: function(response) {
						console.log(response);
						var len = response.length;
						$("#kel_rekrutmen").empty();
						$("#kel_rekrutmen").append('<option selected value="">Pilih Kelurahan</option>');
						for (var i = 0; i < len; i++) {
							var id = response[i]['id_kel'];
							var name = response[i]['nama_kelurahan'];
							$('#kel_rekrutmen').append('<option value="' + id + '">' + name + '</option>');
						}
					}
				});
			} else {
				$("#kel_rekrutmen").empty();
				$("#kel_rekrutmen").append('<option selected value="">Pilih Kelurahan</option>');
			}
		});

		$('#prov_rek_domisili').change(function() {
			var id_prov = $(this).val();
			if (id_prov !== '') {
				$.ajax({
					url: '<?= base_url('datapelamar/getKota_byProv'); ?>',
					type: 'POST',
					data: {
						id_prov: id_prov
					},
					dataType: 'JSON',
					success: function(response) {
						console.log(response);
						var len = response.length;
						$("#kota_kab_rek_domisili").empty();
						$("#kota_kab_rek_domisili").append('<option selected value="">Pilih Kota/Kabupaten</option>');
						for (var i = 0; i < len; i++) {
							var id = response[i]['id_kota_kab'];
							var name = response[i]['nama_kota_kab'];
							$('#kota_kab_rek_domisili').append('<option value="' + id + '">' + name + '</option>');
						}
					}
				});
			} else {
				$("#kota_kab_rek_domisili").empty();
				$("#kota_kab_rek_domisili").append('<option selected value="">Pilih Kota/Kabupaten</option>');
			}
		});

		$('#kota_kab_rek_domisili').change(function() {
			var id_kota = $(this).val();
			if (id_kota !== '') {
				$.ajax({
					url: '<?= base_url('datapelamar/getKec_byKota'); ?>',
					type: 'POST',
					data: {
						id_kota: id_kota
					},
					dataType: 'JSON',
					success: function(response) {
						console.log(response);
						var len = response.length;
						$("#kec_rek_domisili").empty();
						$("#kec_rek_domisili").append('<option selected value="">Pilih Kecamatan</option>');
						for (var i = 0; i < len; i++) {
							var id = response[i]['id_kec'];
							var name = response[i]['nama_kecamatan'];
							$('#kec_rek_domisili').append('<option value="' + id + '">' + name + '</option>');
						}
					}
				});
			} else {
				$("#kec_rek_domisili").empty();
				$("#kec_rek_domisili").append('<option selected value="">Pilih Kecamatan</option>');
			}
		});

		$('#kec_rek_domisili').change(function() {
			var id_kec = $(this).val();
			if (id_kec !== '') {
				$.ajax({
					url: '<?= base_url('datapelamar/getKel_byKec'); ?>',
					type: 'POST',
					data: {
						id_kec: id_kec
					},
					dataType: 'JSON',
					success: function(response) {
						console.log(response);
						var len = response.length;
						$("#kel_rek_domisili").empty();
						$("#kel_rek_domisili").append('<option selected value="">Pilih Kelurahan</option>');
						for (var i = 0; i < len; i++) {
							var id = response[i]['id_kel'];
							var name = response[i]['nama_kelurahan'];
							$('#kel_rek_domisili').append('<option value="' + id + '">' + name + '</option>');
						}
					}
				});
			} else {
				$("#kel_rek_domisili").empty();
				$("#kel_rek_domisili").append('<option selected value="">Pilih Kelurahan</option>');
			}
		});

	});

	var InputElement = document.getElementById('no_wa_telp');
	InputElement.addEventListener("input", function() {
		if (this.value.length > 12) {
			this.value = this.value.slice(0, 12);
		}
	});
</script>
<script>
	// fungsi whatsapp
	function chatadmin() {
		var phoneNumber = '+6281246159441'; // Ganti dengan nomor WhatsApp yang Anda inginkan
		var message = 'Assalamualaikum '; // Ganti dengan pesan yang Anda inginkan

		// Periksa apakah perangkat mendukung WhatsApp
		if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
			var whatsappURL = 'whatsapp://send?phone=' + phoneNumber + '&text=' + encodeURIComponent(message);
			window.location.href = whatsappURL;
		} else {
			// Jika perangkat tidak mendukung WhatsApp, arahkan ke WhatsApp Web
			window.open('https://web.whatsapp.com/send?phone=' + phoneNumber + '&text=' + encodeURIComponent(message), '_blank');
		}
	}
</script>
<script>
	$("#owl-demo2").owlCarousel({
		nav: true, // Show next and prev buttons
		autoplaySpeed: 300,
		navSpeed: 400,
		items: 1
	});

	$('#tanggal_lahir').datetimepicker({
		format: 'MM/DD/YYYY',
	});
	$('#jadwal_tahap').datetimepicker({
		format: 'MM/DD/YYYY',
	});
	$('#waktu_pelaksanaan').datetimepicker({
		format: 'H:mm',
	});
	$('#jadwal_tahap_edit').datetimepicker({
		format: 'MM/DD/YYYY',
	});
	$('#waktu_pelaksanaan_edit').datetimepicker({
		format: 'H:mm',
	});
</script>
<script>
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

		$('.hapus-hisper').click(function() {
			var id_history_pekerjaan = $(this).data('id');
			var pesan_terhapus = 'Data Riwayat Pekerjaan telah Terhapus.'
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
						url: '<?= base_url("datapelamar/hapus_riwayat_pekerjaan") ?>',
						type: 'POST',
						data: {
							id_history_pekerjaan: id_history_pekerjaan
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

		$('.hapus-hisor').click(function() {
			var id_history_organisasi = $(this).data('id');
			var pesan_terhapus = 'Data Riwayat Organisasi telah Terhapus.'
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
						url: '<?= base_url("datapelamar/hapus_riwayat_organisasi") ?>',
						type: 'POST',
						data: {
							id_history_organisasi: id_history_organisasi
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

		$('.hapus-hispro').click(function() {
			var id_history_proyek = $(this).data('id');
			var pesan_terhapus = 'Data Riwayat Proyek telah Terhapus.'
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
						url: '<?= base_url("datapelamar/hapus_riwayat_proyek") ?>',
						type: 'POST',
						data: {
							id_history_proyek: id_history_proyek
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

		$('.tampil-next-tahap').click(function() {
			var id_tahap_rekrutmen = $(this).data('id');
			// console.log(id_tahap_rekrutmen);

			$.ajax({
				url: '<?= base_url('homepelamar/getnext_tahap/'); ?>' + id_tahap_rekrutmen,
				type: 'GET',
				dataType: 'json',
				success: function(data) {
					// console.log(data);
					if (data) {
						$('#next-info-tahap').html('<p class="h4">Tahap ' +
							data.tahap_rekrutmen + ' akan dilaksanakan pada tanggal ' + data.jadwal_tahap + ' - Pukul ' + data.waktu_pelaksanaan + '. ' + data.ket_tahap + '</p>');
						// $('#next-info-tahap').text('Tahap ' +
						// 	data.tahap_rekrutmen + 'akan dilaksanakan pada tanggal ' + data.jadwal_tahap + ' - Pukul ' + data.waktu_pelaksanaan + '. ' + data.ket_tahap);
					} else {
						$('#error-info-tahap').text('Data Tidak Ada.');
					}
				}
			})
		})
	});
</script>
</body>

</html>