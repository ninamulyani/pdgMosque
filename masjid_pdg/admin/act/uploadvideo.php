<?php
	session_start();
	$_FILES["file_video"]['type'];
	$_FILES["file_video"]["size"];
	include ('../inc/connect.php');

	$id = $_POST['id_videos'];
	$querysearch = "SELECT serial_number FROM worship_place_video WHERE id = '$id' ORDER BY serial_number DESC LIMIT 1";

	$hasil = mysqli_query($conn, $querysearch);
	$sn = 1;

	while($baris = mysqli_fetch_array($hasil))
	{
		$angka = $baris['serial_number'] + 1;
		$sn = $angka;
	}

	$jenis_video = $_FILES["file_video"]['type'];

	if(($jenis_video=="video/mp4" || $jenis_video=="video/avi" || $jenis_video=="video/mov" || $jenis_video=="video/mkv") && ($_FILES["file_video"]["size"] <= 500000000))
	{
		$searchvideo = "SELECT video_worship FROM worship_place_video WHERE id = '$id'";
		$cari = mysqli_query($conn, $searchvideo);
		while($file = mysqli_fetch_array($cari))
		{
			$filenya = $file['video_worship'];
			$video_file = '../../video/'.$filenya;
	    unlink($video_file);
		}

		$sql_hapus = mysqli_query($conn, "DELETE FROM worship_place_video where id = '$id'");
		$sourcename = $_FILES["file_video"]["name"];
		$name = $sourcename;
		$name = $id.$sn.".mp4";
		$filepath = "../../video/".$name;
		move_uploaded_file($_FILES["file_video"]["tmp_name"],$filepath);
        $sql = mysqli_query($conn, "INSERT INTO worship_place_video(serial_number, id, video_worship) VALUES('$sn','$id','$name')");
        echo "INSERT INTO worship_place_video(serial_number, id, video_worship) VALUES('$sn','$id','$name')";
		if($sql){
            echo "<script>
                    alert ('Video Uploaded Successfully');
                  </script>";
			echo '<meta http-equiv="REFRESH" content="0.1;url=../index.php?page=detail&id='.$id.'">';
			}
	}
	else {
		echo "<script>
                    alert ('Failed !!!');
                  </script>";
		echo "Go Back To <a href='../index.php?page=detail&id=$id'>Detail info</a>";
	}
?>
