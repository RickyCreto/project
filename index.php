<?php

session_start();

if( !isset ($_SESSION ["login"]) ){
	header("Location: login.php");
	exit;
}

require 'functions.php';

$datamahasiswa = query("SELECT * FROM mahasiswa ORDER BY idMahasiswa DESC");
$datapegawai = query("SELECT * FROM pegawai ORDER BY idPegawai DESC");
$datapetugas = query("SELECT * FROM petugas ORDER BY idPetugas DESC");


// tombol cari ditekan
if( isset ($_POST ["btncari"]) ) {
	$datamahasiswa = btncari($_POST ["keyword"]);

}

?>


<br>
<!DOCTYPE html>
<html>
<head>



    <title>Halaman Admin</title>
</head>
<body>
<a href="logout.php"> Logout</a>

	<h1>Daftar Mahasiswa</h1>
	<a href="tambah.php">Tambah Mahasiswa</a>
	<br>
	<br>

	<form action="" method="post"  enctype="multipart/form-data">
		
		<input type="text" name="keyword" autofocus placeholder="search" autocomplete="off" required>
		<button type="submit" name="btncari"> Cari</button>

	</form>

<table border="1" cellpadding="10" cellspacing="0">

	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Jurusan</th>
		<th>no Telepon</th>
		<th>Email</th>
	</tr>

	<?php $i =1; ?> 
	<?php foreach ($datamahasiswa as $datamhs) : ?> 

	<tr>
		<td><?= $i;  ?></td>
		<td>
			<a href="ubah.php?id=<?= $datamhs["idMahasiswa"];?>"> Ubah </a> |
			<a href="hapus.php?id=<?= $datamhs["idMahasiswa"];?>" onclick="return confirm( 'yakin?');"> Hapus </a>
		</td>
		<td><?= $datamhs["NIM"];  ?></td>
		<td><?= $datamhs["namaMahasiswa"];  ?></td>
		<td><?= $datamhs["jurusanMahasiswa"];  ?></td>
		<td><?= $datamhs["noTeleponMahasiswa"];  ?></td>
		<td><?= $datamhs["emailMahasiswa"];  ?></td>
	</tr>

	<?php $i++; ?>
	<?php endforeach; ?>

</table>

<br>

<table border="1" cellpadding="10" cellspacing="0">

	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>NIP</th>
		<th>Nama</th>
		<th>no Telepon</th>
		<th>Email</th>
	</tr>

	<?php $i =1; ?> 
	<?php foreach ($datapegawai as $datapgw) : ?> 

	<tr>
		<td><?= $i;  ?></td>
		<td>
			<a href="ubah.php?id=<?= $datapgw["idPegawai"];?>"> Ubah </a> |
			<a href="hapus.php?id=<?= $datapgw["idPegawai"];?>" onclick="return confirm( 'yakin?');"> Hapus </a>
		</td>
		<td><?= $datapgw["NIK"];  ?></td>
		<td><?= $datapgw["namaPegawai"];  ?></td>
		<td><?= $datapgw["noTeleponPegawai"];  ?></td>
		<td><?= $datapgw["emailPegawai"];  ?></td>
	</tr>

	<?php $i++; ?>
	<?php endforeach; ?>

</table>

<br>

<table border="1" cellpadding="10" cellspacing="0">

	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>NIP</th>
		<th>Nama</th>
		<th>Unit Kerja</th>
		<th>no Telepon</th>
		<th>Email</th>
	</tr>

	<?php $i =1; ?> 

	<?php foreach ($datapetugas as $dataptgs) : ?> 
	<tr>
		<td><?= $i;  ?></td>
		<td>
			<a href="ubah.php?id=<?= $dataptgs["idPetugas"];?>"> Ubah </a> |
			<a href="hapus.php?id=<?= $dataptgs["idPetugas"];?>" onclick="return confirm( 'yakin?');"> Hapus </a>
		</td>
		<td><?= $dataptgs["NIP"];  ?></td>
		<td><?= $dataptgs["namaPetugas"];  ?></td>
		<td><?= $dataptgs["unitKerja"];  ?></td>
		<td><?= $dataptgs["noTeleponPetugas"];  ?></td>
		<td><?= $dataptgs["emailPetugas"];  ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>

</table>

</body>
</html>