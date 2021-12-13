<?php 

$page = @$_GET['pages'];

if ($page == 'pengguna') {
	include 'page/pengguna/pengguna.php';
}

if ($page == 'kelas') {
	include 'page/kelas/kelas.php';
}

if ($page == 'tahun') {
	include 'page/tahun/tahun.php';
}

if ($page == 'siswa') {
	include 'page/siswa/siswa.php';
}

if ($page == 'kenaikan') {
	include 'page/kenaikan/kenaikan.php';
}



 ?>