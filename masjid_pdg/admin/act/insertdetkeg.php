<?php
	include ('../inc/connect.php');
	session_start();
	
	$keg = $_POST['keg'];
	$jam = $_POST['jam'];
	$jam = date("H:i", strtotime("$jam"));
	$tgl = DateTime::createFromFormat('m-d-Y', $_POST['tgl'])->format('Y-m-d');
	$id = $_SESSION['id'];
	$ustad = $_POST['ustad'];
	$penyelenggara = $_POST['penyelenggara'];
	$scale = $_POST['scale'];
	$sql = mysqli_query($conn,"insert into detail_event values ('$tgl','$jam', '$ustad','$keg','$id', '$penyelenggara', '$scale')");
	// echo "insert into detail_event values ('$tgl','$jam', '$ustad','$keg','$id', '$penyelenggara')";
	if ($sql){
		echo "<script>
			alert ('Data Successfully Added');
			eval(\"parent.location='../index1.php?page=listevent '\");
			</script>";
	}else{
		echo 'error';
	}
?>
