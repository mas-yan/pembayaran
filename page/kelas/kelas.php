<div class="col-12">
<div class="card card-primary">
  <div class="card-header">
	<h3 class="card-title">Data Kelas</h3>
	</div>
	<!-- /.card-header -->
	
	<div class="card-body">
	<button style="margin-bottom: 15px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"> Tambah Data
	</button>
	<table id="example1" class="table table-bordered table-striped">
	  <thead>
	      <tr>
	        <th>No</th>
	        <th>Nama Kelas</th>
	        <th width="68">Hapus</th>
	        <th width="68">Ubah</th>
	      </tr>
	  </thead>
	  <tbody>
	  <?php 
	  $sql = $koneksi->query("SELECT * FROM kelas");
	  $no = 1;
	  while ($data=$sql->fetch_assoc()) {

	   ?>
	      <tr>
	        <td><?= $no++ ?></td>
	        <td><?= $data['nama_kelas'] ?></td>
		        <td>
		        <form style="display: inline-block;" method="post">

			          <input type="hidden" class="form-control" name="id_siswa" id="id_siswa" value="<?= $data['id_siswa'] ?>">
		        	  <button type="submit" onclick="return confirm('apakah anda yakin ingin menghapus?')" name="hapus" class="btn btn-danger"><i class="fa fa-trash nav-icon"></i> Hapus</button>
			        
				</form>
				</td>
				<td>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?= $data['id_siswa'] ?>"><i class="far fa-edit nav-icon"></i> Ubah</button>
		        </td>
	      </tr>

	      
	      <div class="modal fade" id="modal-default<?= $data['id_kelas'] ?>">
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
				  $id_kelas = $data['id_kelas'];
				  $sql_edit = $koneksi->query("SELECT * FROM kelas WHERE id_kelas = '$id_kelas' ");
				  while ($data_edit=$sql_edit->fetch_assoc()) {
				   ?>
	                <div class="card-body">
	                  <div class="form-group">
	                    <input type="hidden" class="form-control" name="id_kelas" id="id_kelas" value="<?= $data_edit['id_kelas'] ?>">
	                  </div>
	                  <div class="form-group">
	                    <label for="nama_kelas">Nama Kelas</label>
	                    <input type="text" class="form-control" name="nama_kelas" value="<?= $data_edit['nama_kelas'] ?>">
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
	            	$id_kelas_ubah = $_POST['id_kelas'];
	            	$nama_kelas_ubah = $_POST['nama_kelas'];

	            	$sql = $koneksi->query("UPDATE kelas SET nama_kelas='$nama_kelas_ubah' WHERE id_kelas = '$id_kelas_ubah' ");

	            	if ($sql) {
	            	?>
	            	<script type="text/javascript">
	            		alert("data berhasil di ubah");
	            		document.location='?pages=kelas';
	            	</script>

	            	<?php
	            	}else{
	            	?>

	            	<script type="text/javascript">
	            		alert("data gagal di ubah");
	            		document.location='?pages=kelas';
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
	                    <label for="nama_kelas">Nama Kelas</label>
	                    <input type="text" class="form-control" name="nama_kelas" >
	                  </div>

	            </div>
	            <div class="modal-footer justify-content-between">
	              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	              <button type="submit" name="tambah" class="btn btn-primary">tambah Data</button>
	            </div>
	            </form>
			<?php 

	            if (isset($_POST['tambah'])) {

	            	$nama_kelas = $_POST['nama_kelas'];

	            	$sql = $koneksi->query("INSERT INTO kelas(nama_kelas) VALUES('$nama_kelas')");

	            	if ($sql) {
	            	?>
	            	<script type="text/javascript">
	            		alert("data berhasil di tambahkan");
	            		document.location='?pages=kelas';
	            	</script>

	            	<?php
	            	}else{
	            	?>

	            	<script type="text/javascript">
	            		alert("data gagal di tambahkan");
	            		document.location='?pages=kelas';
	            	</script>
	            	<?php
	            	}
	            }

	             if (isset($_POST['hapus'])) {

	            	$id_kelas_hapus = $_POST['id_kelas'];

	            	$sql = $koneksi->query("DELETE FROM kelas WHERE id_kelas = '$id_kelas_hapus' ");

	            	if ($sql) {
	            	?>
	            	<script type="text/javascript">
	            		alert("data berhasil di hapus");
	            		document.location='?pages=kelas';
	            	</script>

	            	<?php
	            	}else{
	            	?>

	            	<script type="text/javascript">
	            		alert("data gagal di hapus");
	            		document.location='?pages=kelas';
	            	</script>
	            	<?php
	            	}
	            }

	             ?>