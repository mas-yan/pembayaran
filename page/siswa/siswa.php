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
	        <th>Nis</th>
	        <th>Nama Siswa</th>
	        <th>Kelas</th>
	        <th>Jenis Kelamin</th>
	        <th>Agama</th>
	        <th>Status</th>
	        <th>Nama Ortu</th>
	        <th>Alamat</th>
	        <th>No.telp Ortu</th>
	        <th width="80">Hapus</th>
	        <th width="80">Ubah</th>
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
	        <td><?= $data['jenis_kelamin'] ?></td>
	        <td><?= $data['agama'] ?></td>
	        <td><?= $data['status'] ?></td>
	        <td><?= $data['nama_ortu'] ?></td>
	        <td><?= $data['alamat'] ?></td>
	        <td><?= $data['no_telp_ortu'] ?></td>
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
	      <div class="modal fade" id="modal-default<?= $data['id_siswa'] ?>">
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
				  $id_siswa = $data['id_siswa'];
				  $sql_edit = $koneksi->query("SELECT * FROM siswa WHERE id_siswa = '$id_siswa' ");
				  while ($data_edit=$sql_edit->fetch_assoc()) {
				   ?>
	                <div class="card-body">
	                  <div class="form-group">
	                    <input type="hidden" class="form-control" name="id_siswa" id="id_siswa" value="<?= $data_edit['id_siswa'] ?>">
	                  </div>
	                  <div class="form-group">
	                    <label for="nis">Nis</label>
	                    <input type="text" class="form-control" name="nis" value="<?= $data_edit['nis'] ?>">
	                  </div>
	                  <div class="form-group">
	                    <label for="nama_siswa">Nama siswa</label>
	                    <input type="text" class="form-control" name="nama_siswa" value="<?= $data_edit['nama_siswa'] ?>">
	                  </div>
	                  <div class="form-group">
                        <label>Kelas</label>
                        <select name="kelas_ubah" class="form-control">
                          <?php
                          $kelas = $koneksi->query("SELECT * FROM kelas");
                          while ($tampil=$kelas->fetch_assoc()) {
                          	$pilih = ($tampil['id_kelas']==$data_edit['kelas']?"selected":"");
                           	echo "<option value='$tampil[id_kelas]'$pilih>$tampil[nama_kelas]</option>";
                           } 
                           ?>
                        </select>

                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                          <option value="laki-laki">Laki-laki</option>
                          <option value="perempuan">Perempuan</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Agama</label>
                        <select name="agama" class="form-control">
                          <option value="islam" <?php if ($data_edit['agama'] == 'islam') {
                          	echo "selected";
                          } ?>>islam</option>
                          <option value="katolik" <?php if ($data_edit['agama'] == 'katolik') {
                          	echo "selected";
                          } ?>>katolik</option>
                           <option value="kristen" <?php if ($data_edit['agama'] == 'kristen') {
                          	echo "selected";
                          } ?>>kristen</option>
                          <option value="hindu" <?php if ($data_edit['agama'] == 'hindu') {
                          	echo "selected";
                          } ?>>hindu</option>
                          <option value="budha" <?php if ($data_edit['agama'] == 'budha') {
                          	echo "selected";
                          } ?>>budha</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                          <option value="Aktif" <?php if ($data_edit['status'] == 'Aktif') {
                          	echo "selected";
                          } ?>>Aktif</option>
                          <option value="Tidak Aktif" <?php if ($data_edit['status'] == 'Tidak Aktif') {
                          	echo "selected";
                          } ?>>Tidak Aktif</option>
                        </select>
                      </div>

                      <div class="form-group">
	                    <label for="nama_siswa">Nama Orang Tua</label>
	                    <input type="text" class="form-control" name="nama_ortu" value="<?= $data_edit['nama_ortu'] ?>">
	                  </div>

	                  <div class="form-group">
	                    <label for="alamat">alamat</label>
	                    <input type="text" class="form-control" name="alamat" value="<?= $data_edit['alamat'] ?>">
	                  </div>

	                  <div class="form-group">
	                    <label for="no_telp-ortu">No.Telp Ortu</label>
	                    <input type="text" class="form-control" name="no_telp_ortu" value="<?= $data_edit['no_telp_ortu'] ?>">
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
	            	$nis = $_POST['nis'];
	            	$id_siswa_ubah = $_POST['id_siswa'];
	            	$nama_siswa_ubah = $_POST['nama_siswa'];
	            	$kelas_ubah = $_POST['kelas_ubah'];
	            	$jenis_kelamin = $_POST['jenis_kelamin'];
	            	$agama = $_POST['agama'];
	            	$status = $_POST['status']; 
	            	$ortu = $_POST['nama_ortu'];
	            	$alamat = $_POST['alamat'];
	            	$no_telp_ortu = $_POST['no_telp_ortu'];

	            	$sql = $koneksi->query("UPDATE siswa SET nis = '$nis' nama_siswa='$nama_siswa_ubah',kelas = '$kelas_ubah',jenis_kelamin = '$jenis_kelamin',agama = '$agama',status = '$status',nama_ortu = '$ortu',alamat = '$alamat',no_telp_ortu = '$no_telp_ortu' WHERE id_siswa = '$id_siswa_ubah' ");

	            	if ($sql) {
	            	?>
	            	<script type="text/javascript">
	            		alert("data berhasil di ubah");
	            		document.location='?pages=siswa';
	            	</script>

	            	<?php
	            	}else{
	            	?>

	            	<script type="text/javascript">
	            		alert("data gagal di ubah");
	            		document.location='?pages=siswa';
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
	                    <label for="nis">Nis</label>
	                    <input type="text" class="form-control" name="nis">
	                  </div>
	                  <div class="form-group">
	                    <label for="nama_siswa">Nama siswa</label>
	                    <input type="text" class="form-control" name="nama_siswa">
	                  </div>
	                  <div class="form-group">
                        <label>Kelas</label>
                        <select name="kelas_ubah" class="form-control">
                          <?php
                          $kelas = $koneksi->query("SELECT * FROM kelas");
                          while ($tampil=$kelas->fetch_assoc()) {
                           	echo "<option value='$tampil[id_kelas]'>$tampil[nama_kelas]</option>";
                           } 
                           ?>
                        </select>

                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                          <option value="laki-laki">Laki-laki</option>
                          <option value="perempuan">Perempuan</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Agama</label>
                        <select name="agama" class="form-control">
                          <option value="islam">islam</option>
                          <option value="katolik">katolik</option>
                           <option value="kristen">kristen</option>
                          <option value="hindu">hindu</option>
                          <option value="budha">budha</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                          <option value="Aktif">Aktif</option>
                          <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                      </div>

                      <div class="form-group">
	                    <label for="nama_siswa">Nama Orang Tua</label>
	                    <input type="text" class="form-control" name="nama_ortu">
	                  </div>

	                  <div class="form-group">
	                    <label for="alamat">Alamat</label>
	                    <input type="text" class="form-control" name="alamat">
	                  </div>

	                  <div class="form-group">
	                    <label for="no_telp-ortu">No.Telp Ortu</label>
	                    <input type="text" class="form-control" name="no_telp_ortu">
	                  </div>

	            </div>
	            <div class="modal-footer justify-content-between">
	              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	              <button type="submit" name="tambah" class="btn btn-primary">tambah Data</button>
	            </div>
	            </form>
			<?php 

	            if (isset($_POST['tambah'])) {

	            	$nis = $_POST['nis'];
	            	$nama_siswa_ubah = $_POST['nama_siswa'];
	            	$kelas_ubah = $_POST['kelas_ubah'];
	            	$jenis_kelamin = $_POST['jenis_kelamin'];
	            	$agama = $_POST['agama'];
	            	$status = $_POST['status']; 
	            	$ortu = $_POST['nama_ortu'];
	            	$alamat = $_POST['alamat'];
	            	$no_telp_ortu = $_POST['no_telp_ortu'];

	            	$sql = $koneksi->query("INSERT INTO siswa(nis,nama_siswa,kelas,jenis_kelamin,agama,status,nama_ortu,alamat,								no_telp_ortu) VALUES('$nis','$nama_siswa_ubah','$kelas_ubah','$jenis_kelamin','$agama','$status','$ortu','$alamat','$no_telp_ortu')");

	            	if ($sql) {
	            	?>
	            	<script type="text/javascript">
	            		alert("data berhasil di tambahkan");
	            		document.location='?pages=siswa';
	            	</script>

	            	<?php
	            	}else{
	            	?>

	            	<script type="text/javascript">
	            		alert("data gagal di tambahkan");
	            		document.location='?pages=siswa';
	            	</script>
	            	<?php
	            	}
	            }

	             if (isset($_POST['hapus'])) {

	            	$id_siswa_hapus = $_POST['id_siswa'];

	            	$sql = $koneksi->query("DELETE FROM siswa WHERE id_siswa = '$id_siswa_hapus' ");

	            	if ($sql) {
	            	?>
	            	<script type="text/javascript">
	            		alert("data berhasil di hapus");
	            		document.location='?pages=siswa';
	            	</script>

	            	<?php
	            	}else{
	            	?>

	            	<script type="text/javascript">
	            		alert("data gagal di hapus");
	            		document.location='?pages=siswa';
	            	</script>
	            	<?php
	            	}
	            }

	             ?>