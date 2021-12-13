<script type="text/javascript">
 function checkAll(ele) {
      var checkboxes = document.getElementsByName('pilih[]');
      if (ele.checked) {
          for (var i = 0; i < checkboxes.length; i++) {
              if (checkboxes[i].type == 'checkbox' ) {
                  checkboxes[i].checked = true;
              }
          }
      } else {
          for (var i = 0; i < checkboxes.length; i++) {
              if (checkboxes[i].type == 'checkbox') {
                  checkboxes[i].checked = false;
              }
          }
      }
  }
</script>
</script>
<div class="col-12">
<div class="card card-primary">
  <div class="card-header">
	<h3 class="card-title">Proses Kenaikan Kelas</h3>
	</div>
	<!-- /.card-header -->
	
	<div class="card-body">
	<button style="margin-bottom: 15px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"> Tambah Data
	</button>
	<table id="example1" class="table table-bordered table-striped">
	  <thead>
	      <tr>
	        <th>No</th>
	        <th>Nis</th>
	        <th>Nama Siswa</th>
	        <th>Kelas</th>
	        <th>
	        	<div class="custom-control custom-checkbox">
	        		<input class="form-check-input" type="checkbox" onchange="checkAll(this)">
	        		<labelclass="form-check-input">Pilih Semua</label>
                </div>
	        </th>
	      </tr>
	  </thead>
	  <tbody>
	  <?php 
	  $sql = $koneksi->query("SELECT * FROM siswa,kelas WHERE siswa.kelas = kelas.id_kelas");
	  $no = 1;
	  while ($data=$sql->fetch_assoc()) {

	   ?>
	      <tr>
	        <td><?= $no++ ?></td>
	        <td><?= $data['nis'] ?></td>
	        <td><?= $data['nama_siswa'] ?></td>
	        <td><?= $data['nama_kelas'] ?></td>
	        <td>
	        	<div class="custom-control custom-checkbox">
                  <input name="pilih[]" class="form-check-input" type="checkbox" value="<?= $data['id_kelas'] ?>">
                </div>
            </td>
		
	      </tr>
	      
	      <?php } ?>
	  </tbody>
	</table>
   </div>
  </div>
</div>