<?php
	//require_once($_SERVER['DOCUMENT_ROOT'].'/t2-eng-mysql/assets/geoPHP/geoPHP.inc');
	$host = "localhost";
	$user = "root";
	$pass = "199801";
	$port = "3306";
	$dbname = "halal_tourism";

	$conn = mysqli_connect("$host","$user","$pass","$dbname");
	// Check connection
	if (mysqli_connect_errno()){
		die("Koneksi database gagal : " . mysqli_connect_error());
	}
?>

