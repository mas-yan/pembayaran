<div class="col-12">
<div class="card card-primary">
  <div class="card-header">
	<h3 class="card-title">Data Tahun Ajaran</h3>
	</div>
	<!-- /.card-header -->
	
	<div class="card-body">
	<button style="margin-bottom: 15px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"> Tambah Data
	</button>
	<table id="example1" class="table table-bordered table-striped">
	  <thead>
	      <tr>
	        <th>No</th>
	        <th>Tahun Ajaran</th>
	         <th>Status</th>
	        <th width="80">Hapus</th>
	        <th width="80">Ubah</th>
	      </tr>
	  </thead>
	  <tbody>
	  <?php 
	  $sql = $koneksi->query("SELECT * FROM tahun");
	  $no = 1;
	  while ($data=$sql->fetch_assoc()) {

	   ?>
	      <tr>
	        <td><?= $no++ ?></td>
	        <td><?= $data['tahun_ajaran'] ?></td>
	        <td>
	        	<?php
	        	$status = $data['status'];
	        	if ($status == 'Aktif') {
	        		?>
	        	 	<button disabled="" name="status" class="btn btn-primary">Aktif</button>
	        	 	<?php
	        	 }else{
	        	 	?>
	        	 	<form method="post">
	        	 		<input type="hidden" class="form-control" name="id_tahun_ajaran"value="<?= $data['id_tahun'] ?>">
	        	 		<button type="submit" name="aktifkan" class="btn btn-primary">aktifkan tahun ajaran</button>
	        	 	</form>

	        	 	<?php } ?>
	        	
	        </td>
		        <td>
		        <form method="post">

			          <input type="hidden" class="form-control" name="id_hapus_tahun" id="id_tahun" value="<?= $data['id_tahun'] ?>">
		        	  <button type="submit" onclick="return confirm('apakah anda yakin ingin menghapus?')" name="hapus" class="btn btn-danger"><i class="fa fa-trash nav-icon"></i> Hapus</button>
			        
				</form>
				</td>
				<td>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?= $data['id_tahun'] ?>"><i class="far fa-edit nav-icon"></i> Ubah</button>
		        </td>
	      </tr>
	      <div class="modal fade" id="modal-default<?= $data['id_tahun'] ?>">
	        <div class="modal-dialog">
	          <div class="modal-content">
	            <div class="modal-header">
	              <h4 class="modal-title">Ubah Data</h4>
	              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>
	            <div class="modal-body">
				  <form method="POST">
				  <?php
				  $id_tahun = $data['id_tahun'];
				  $sql_edit = $koneksi->query("SELECT * FROM tahun WHERE id_tahun = '$id_tahun' ");
				  while ($data_edit=$sql_edit->fetch_assoc()) {
				   ?>
	                <div class="card-body">
	                  <div class="form-group">
	                    <input type="hidden" class="form-control" name="id_tahun" id="id_tahun" value="<?= $data_edit['id_tahun'] ?>">
	                  </div>
	                  <div class="form-group">
	                    <label for="tahun_ajaran">Tahun Ajaran</label>
	                    <input type="text" class="form-control" name="tahun_ajaran" value="<?= $data_edit['tahun_ajaran'] ?>">
	                  </div>

	            </div>
	            <div class="modal-footer justify-content-between">
	              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	              <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
	            </div>
	            <?php } ?>
	            </form>
	            <?php 

	            if (isset($_POST['ubah'])) {
	            	$id_tahun_ubah = $_POST['id_tahun'];
	            	$tahun_ubah = $_POST['tahun_ajaran'];

	            	$sql = $koneksi->query("UPDATE tahun SET tahun_ajaran='$tahun_ubah' WHERE id_tahun = '$id_tahun_ubah' ");

	            	if ($sql) {
	            	?>
	            	<script type="text/javascript">
	            		alert("data berhasil di ubah");
	            		document.location='?pages=tahun';
	            	</script>

	            	<?php
	            	}else{
	            	?>

	            	<script type="text/javascript">
	            		alert("data gagal di ubah");
	            		document.location='?pages=tahun';
	            	</script>
	            	<?php
	            	}
	            }

	             ?>
	          </div>
	          <!-- /.modal-content -->
	        </div>
	        <!-- /.modal-dialog -->
	      </div>
	      <?php } ?>
	  </tbody>
	</table>
   </div>
  </div>
</div>


<div class="modal fade" id="modal-tambah">
	        <div class="modal-dialog">
	          <div class="modal-content">
	            <div class="modal-header">
	              <h4 class="modal-title">Tambah Data</h4>
	              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>
	            <div class="modal-body">
				  <form method="POST">
				  
	                  <div class="form-group">
	                    <label for="nama_kelas">Tahun Ajaran</label>
	                    <input type="text" class="form-control" name="tambah_tahun" >
	                  </div>

	            </div>
	            <div class="modal-footer justify-content-between">
	              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	              <button type="submit" name="tambah" class="btn btn-primary">tambah Data</button>
	            </div>
	            </form>
			<?php 

	            if (isset($_POST['tambah'])) {

	            	$tambah_tahun = $_POST['tambah_tahun'];

	            	$sql = $koneksi->query("INSERT INTO tahun(tahun_ajaran,status) VALUES('$tambah_tahun','Tidak Aktif')");

	            	if ($sql) {
	            	?>
	            	<script type="text/javascript">
	            		alert("data berhasil di tambahkan");
	            		document.location='?pages=tahun';
	            	</script>

	            	<?php
	            	}else{
	            	?>

	            	<script type="text/javascript">
	            		alert("data gagal di tambahkan");
	            		document.location='?pages=tahun';
	            	</script>
	            	<?php
	            	}
	            }

	             if (isset($_POST['hapus'])) {
	             	$id_tahun_hapus = $_POST['id_hapus_tahun'];
	             	$data_hapus = $koneksi->query("SELECT * FROM tahun WHERE id_tahun = '$id_tahun_hapus' ");
	             	$dataaktif = mysqli_fetch_assoc($data_hapus);

	             	if ($dataaktif['status'] == 'Aktif') {

	             		?>
	            	<script type="text/javascript">
	            		alert("tahun ajaran yang sedang aktif tidak bisa di hapus");
	            		document.location='?pages=tahun';
	            	</script>

	            	<?php

	            		
	            	}else{
	            		$sql_hapus = $koneksi->query("DELETE FROM tahun WHERE id_tahun = '$id_tahun_hapus' ");

	            		?>
	            	<script type="text/javascript">
	            		alert("data berhasil di hapus");
	            		document.location='?pages=tahun';
	            	</script>

	            	<?php

	            	
	            	}
	            }

	            if (isset($_POST['aktifkan'])) {

	            	$id_aktifkan = $_POST['id_tahun_ajaran'];

	            	$sql = $koneksi->query("UPDATE tahun SET status = 'Aktif' WHERE id_tahun = '$id_aktifkan' ");

	            	$sql = $koneksi->query("UPDATE tahun SET status = 'Tidak Aktif' WHERE id_tahun != '$id_aktifkan' ");

	            	if ($sql) {
	            	?>
	            	<script type="text/javascript">
	            		alert("tahun ajaran berhasil di aktifkan");
	            		document.location='?pages=tahun';
	            	</script>

	            	<?php
	            	}else{
	            	?>

	            	<script type="text/javascript">
	            		alert("tahun ajaran gagal di aktifkan");
	            		document.location='?pages=kelas';
	            	</script>
	            	<?php
	            	}
	            }

	             ?>

