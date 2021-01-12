<?php
	require 'connect.php';
	session_start();
	$pilihan = $_POST['pilihan'];
	$city 	 = $_POST['city'];

	$sql = mysqli_query($conn, "SELECT * FROM city WHERE id = '$city'");

	$row  = mysqli_fetch_array($sql);
	$_SESSION['id']   = $row['id'];
	$_SESSION['name'] = $row['name'];
	

	if ($pilihan == 0 || $pilihan == "" || $pilihan == null) {
		echo '<script language="javascript">';
		echo 'alert("Choose city and object !")';
		echo '</script>';
		echo "<script>eval(\"parent.location='../pdg_mosque '\");	</script>";
	}
	else if($pilihan == 1){		
		echo "<script>eval(\"parent.location='angkot_pdg/ '\");	</script>";
	} 
	else if($pilihan == 2){		
		echo "<script>eval(\"parent.location='hotel_pdg/ '\"); </script>";
	} 
	else if($pilihan == 3){		
		echo "<script>eval(\"parent.location='ik_pdg/ '\");	</script>";
	} 
	else if($pilihan == 4){		
		echo "<script>eval(\"parent.location='kuliner_pdg/ '\"); </script>";
	} 
	else if($pilihan == 5){		
		echo "<script>eval(\"parent.location='masjid_pdg/ '\");	</script>";
	} 
	else if($pilihan == 6){		
		echo "<script>eval(\"parent.location='souvenir_pdg/ '\"); </script>";
	} 
	else if($pilihan == 7){		
		echo "<script>eval(\"parent.location='tourism_pdg/ '\"); </script>";
	}
?>