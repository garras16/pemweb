<?php
	include "connection.php";

	$id = $_GET['id'];

	$sql = "DELETE FROM skill WHERE id='$id'";

	$query = mysqli_query($dbconnect,$sql);

	if($query) {
		echo '<script language="javascript">alert("Data Berhasil Dihapus"); document.location="../../1.php";</script>';
	}else{
		echo '<script language="javascript">alert("Data Gagal Dihapus"); document.location="../../1.php";</script>';
	}
?>