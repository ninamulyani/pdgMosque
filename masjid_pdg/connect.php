<?php
	require_once('assets/geoPHP/geoPHP.inc');
	$host = "localhost";
	$user = "root";
	$pass = "199801";
	$port = "3306";
	 $dbname = "halal_tourism";
	//$dbname = "halaltourism_v1";

	$conn = mysqli_connect("$host","$user","$pass","$dbname");
	// Check connection
	if (mysqli_connect_errno()){
		die("Koneksi database gagal : " . mysqli_connect_error());
	}
?>
