<?php
session_start();

include 'connection.php';

$username = $_POST['username'];
$password = md5($_POST['password']);


$data	= mysqli_query($dbconnect, "SELECT * FROM user WHERE username='$username' AND password='$password'");

$cek = mysqli_num_rows($data);

if($cek != 0) {
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:../../1.php");
}else{
	echo '<script language="javascript">alert("Username dan Password salah"); document.location="../../login.php";</script>';
}

?>