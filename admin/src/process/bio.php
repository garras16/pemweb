<?php
	include "connection.php";
	session_start();

	if($_SESSION['status'] != "login") {
		header("location:../../login.php");
	}

	if(isset($_POST['save'])) {
		$nama = $_POST['nama'];
		$tmpt = $_POST['tmpt'];
		$tgl = $_POST['tgl'];
		$alamat = $_POST['alamat'];
		$hobi = $_POST['hobi'];
		$id = $_POST['id'];

		$sql = "UPDATE biodata SET nama='$nama', tmpt_lahir='$tmpt', tgl_lahir='$tgl', alamat='$alamat', hobi='$hobi' WHERE id='$id'";
		$query = mysqli_query($dbconnect,$sql);

		if($query) {
			echo '<script language="javascript">alert("Perubahan Biodata Berhasil"); document.location="../../'.$id.'.php";</script>';
		}
		else {
			echo '<script language="javascript">alert("Perubahan Biodata Gagal"); document.location="../../'.$id.'.php";</script>';
		}
	}
?>
