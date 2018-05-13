<?php
	include "connection.php";

	$id = $_GET['id'];
	$sql = "DELETE FROM skill WHERE id='$id'";
	$query = mysqli_query($dbconnect,$sql);
	$orang = $_GET['orang'];

	if($query) {
		echo '<script language="javascript">alert("Data Berhasil Dihapus"); document.location="../../'.$orang.'";</script>';
	}else{
		echo '<script language="javascript">alert("Data Gagal Dihapus"); document.location="../../'.$orang.'";</script>';
	}
?>