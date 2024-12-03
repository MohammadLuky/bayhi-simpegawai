<!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>IT - BAYHI</span></strong>.
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- <script src="<?= base_url('assets/manage/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="<?= base_url('assets/manage/')?>vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= base_url('assets/manage/')?>vendor/chart.js/chart.umd.js"></script>
  <script src="<?= base_url('assets/manage/')?>vendor/echarts/echarts.min.js"></script>
  <script src="<?= base_url('assets/manage/')?>vendor/quill/quill.min.js"></script>
  <script src="<?= base_url('assets/manage/')?>vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= base_url('assets/manage/')?>vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= base_url('assets/manage/')?>vendor/php-email-form/validate.js"></script>
  
  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/manage/')?>js/main.js"></script>
  
  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Select2 JS -->
  <script src="https://kit.fontawesome.com/d5210717f1.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      <?php if($this->session->flashdata('message')):?>
        var toastEl = document.getElementById('successToast');
        var toast = new bootstrap.Toast(toastEl);

        // document.getElementById('checkToastr').addEventListener('click', function() {
        document.getElementById('toastmessage').textContent = "<?= $this->session->flashdata('message')?>";
        toast.show();
      <?php endif?>
    });
  </script>
  <script>
    $(document).ready(function(){

      $('#prov_rekrutmen').change(function(){
        var id_prov = $(this).val();
        if(id_prov !== ''){
          $.ajax({
            url : '<?= base_url('data_pelamar/getKota_byProv');?>',
            type : 'POST',
            data : {id_prov: id_prov},
            dataType : 'JSON',
            success :function(response) {
              console.log(response);
              var len = response.length;
              $("#kota_kab_rekrutmen").empty();
              $("#kota_kab_rekrutmen").append('<option selected value="">Pilih Kota/Kabupaten</option>');
              for (var i = 0; i<len; i++){
                var id =response[i]['id_kota_kab'];
                var name =response[i]['nama_kota_kab'];
                $('#kota_kab_rekrutmen').append('<option value="'+id+'">'+name+'</option>');
              }
            }
          });
        }else{
          $("#kota_kab_rekrutmen").empty();
          $("#kota_kab_rekrutmen").append('<option selected value="">Pilih Kota/Kabupaten</option>');
        }
      });

      $('#kota_kab_rekrutmen').change(function(){
        var id_kota = $(this).val();
        if(id_kota !== ''){
          $.ajax({
            url : '<?= base_url('data_pelamar/getKec_byKota');?>',
            type : 'POST',
            data : {id_kota: id_kota},
            dataType : 'JSON',
            success :function(response) {
              console.log(response);
              var len = response.length;
              $("#kec_rekrutmen").empty();
              $("#kec_rekrutmen").append('<option selected value="">Pilih Kecamatan</option>');
              for (var i = 0; i<len; i++){
                var id =response[i]['id_kec'];
                var name =response[i]['nama_kecamatan'];
                $('#kec_rekrutmen').append('<option value="'+id+'">'+name+'</option>');
              }
            }
          });
        }else{
          $("#kec_rekrutmen").empty();
          $("#kec_rekrutmen").append('<option selected value="">Pilih Kecamatan</option>');
        }
      });

      $('#kec_rekrutmen').change(function(){
        var id_kec = $(this).val();
        if(id_kec !== ''){
          $.ajax({
            url : '<?= base_url('data_pelamar/getKel_byKec');?>',
            type : 'POST',
            data : {id_kec: id_kec},
            dataType : 'JSON',
            success :function(response) {
              console.log(response);
              var len = response.length;
              $("#kel_rekrutmen").empty();
              $("#kel_rekrutmen").append('<option selected value="">Pilih Kelurahan</option>');
              for (var i = 0; i<len; i++){
                var id =response[i]['id_kel'];
                var name =response[i]['nama_kelurahan'];
                $('#kel_rekrutmen').append('<option value="'+id+'">'+name+'</option>');
              }
            }
          });
        }else{
          $("#kel_rekrutmen").empty();
          $("#kel_rekrutmen").append('<option selected value="">Pilih Kelurahan</option>');
        }
      });

    });

    var InputElement = document.getElementById('no_wa_telp');
      InputElement.addEventListener("input", function(){
        if(this.value.length > 12){
          this.value = this.value.slice(0,12);
        }
      });
  </script>


</body>

</html>