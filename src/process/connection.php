<?php
	$db = "resume";
	$user = "root";
	$pw = "";
	$host = "localhost";

	$dbconnect = mysqli_connect("$host","$user","$pw","$db");

	if(mysqli_connect_errno())
		echo "Koneksi gagal ".mysqli_connect_error(); 
?>
