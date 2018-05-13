<?php
include "connection.php";

$pemilik = $_POST['pemilik'];
$jabatan = $_POST['name'];
$org 	 = $_POST['org'];
$start 	 = $_POST['start'];
$end 	 = $_POST['end'];

$sql = "INSERT INTO experience VALUES ('','$jabatan','$org','$start','$end','$pemilik')";
$query = mysqli_query($dbconnect, $sql);

if($query) {
	if($query)
		echo '<script language="javascript">alert("Data Berhasil Dimasukkan"); document.location="../../'.$pemilik.'";</script>';
	else
		echo '<script language="javascript">alert("Data Gagal Dimasukkan"); document.location="../../'.$pemilik.'";</script>';
}
?>