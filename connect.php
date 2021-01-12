<?php
	$host = "localhost"; 
	$user = "root";
	$pass = "199801";
	// $db   = "pdg_tourism_5_modul";
	$db = "halal_tourism";

	$conn = mysqli_connect($host, $user, $pass) or die ("GAGAL");
	mysqli_select_db($conn, $db); 
?>