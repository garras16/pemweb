<?php
	include "connection.php";
	session_start();

	if($_SESSION['status'] != "login") {
		header("location:../../login.php");
	}

	$end = $_POST['akhir'];
	$id = $_POST['id'];
	$pemilik = $_POST['pemilik'];

	$sql = "UPDATE experience SET akhir='$end' WHERE pemilik='$pemilik' AND id='$id'";
	$query = mysqli_query($dbconnect,$sql);

	if($query) {
		echo '<script language="javascript">alert("Perubahan Experience Berhasil"); document.location="../../'.$pemilik.'";</script>';
	}
	else {
		echo '<script language="javascript">alert("Perubahan Experience Gagal"); document.location="../../'.$pemilik.'";</script>';
	}

?>
