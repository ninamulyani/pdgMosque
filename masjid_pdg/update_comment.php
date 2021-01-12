<?php
include 'connect.php';

    $id_wp = $_GET['id_worship_place'];
	$id_review = $_GET['id_review'];
	$rating = $_GET['rateids'];
    $comment = $_GET['comment'];
	$nama = $_GET['nama'];

	$tanggal = date("Y-m-d");

		$sql = "";
		//echo strpos($id,"RMasd");

		if(strpos($id_wp,"M") !== false)
		{
			$sql = "UPDATE review set comment='$comment',rating='$rating' where id_review='$id_review' and id_worship='$id_wp' ";
		}
		// var_dump($sql); die();
		$query_sql = mysqli_query($conn, $sql);

		if($query_sql){
			echo "<script>alert ('Review Was Updated');</script>";
		}else{
			echo "<script>alert ('Ooops, Failed to Update');</script>";
		}

		echo "<script>
			eval(\"parent.location='gallery_top.php?idgallery=$id_wp'\");
			</script>";



?>
