<?php
include 'connection.php';

$tipe = $_POST['tipe'];
$nama = $_POST['nama'];
$value = $_POST['value'];
$id = $_POST['pemilik'];

$limit = 100;
$sql = "SELECT value FROM skill where tipe='$tipe' AND id_orang='$id'";
$query = mysqli_query($dbconnect, $sql);

while($data = mysqli_fetch_array($query)) { 
	$limit = $limit - $data['value'];
}

if(($limit-$value) < 0) {
	echo '<script language="javascript">alert("Jumlah value Yang anda masukkan melebihi 100"); document.location="../../1";</script>';
}else{
	$sql = "INSERT INTO skill VALUES ('','$nama','$value','$id','$tipe')";
	$query = mysqli_query($dbconnect, $sql);

	if($query)
		echo '<script language="javascript">alert("Data Berhasil Dimasukkan"); document.location="../../'.$id.'";</script>';
	else
		echo '<script language="javascript">alert("Data Gagal Dimasukkan"); document.location="../../'.$id.'";</script>';
}



?>