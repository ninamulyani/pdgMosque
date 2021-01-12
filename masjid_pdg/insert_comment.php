<?php 

    include 'connect.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $rating=$_POST['rateid'];
    $comment = $_POST['comment'];

    $cariMax = "SELECT max(id_review) as max from review";
    $queryMax = mysqli_query($conn,$cariMax	);
    $dataMax = mysqli_fetch_array($queryMax);

    $id_review = 0;
    if($dataMax['max'] == null){
        $id_review = 1;
    } else {
        $id_review = $dataMax['max'] + 1;
    }

    $tanggal = date("Y-m-d");
    if($_POST['submit']){

        $sql = "INSERT into review(id_review,name,comment,tanggal,id_worship,rating) values('$id_review','$nama','$comment',CURRENT_TIMESTAMP,'$id','$rating')";
		$query_sql = mysqli_query($conn,$sql);
		//echo "$sql";
        if($query_sql){
            echo "<script>alert ('Comment Successfully Added');</script>";
        }else{
            echo "<script>alert ('Error');</script>";
        }
    }

    // $tanggal = date("Y-m-d");
    // $sql = "";
    
	// 	//echo strpos($id,"RMasd");
    //     if(strpos($id,"M") !== false)
	// 	{
	// 		$sql = "INSERT INTO review(name,id_worship,comment,tanggal,id_review, rating) VALUES('$nama','$id','$comment','$tanggal','$id_review', '$rating')";
	// 	}
    //     if(strpos($id,"H") !== false)
	// 	{
	// 		$sql = "INSERT INTO review(name,id_hotel,comment,tanggal,id_review, rating) VALUES('$nama','$id','$comment','$tanggal','$id_review', '$rating')";
	// 	} 
	// 	else if(strpos($id,"SO") !== false)
	// 	{
	// 		$sql = "INSERT INTO review(name,id_souvenir,comment,tanggal,id_review, rating) VALUES('$nama','$id','$comment','$tanggal','$id_review', '$rating')";
	// 	} 
	// 	else if(strpos($id,"IK") !== false)
	// 	{
	// 		$sql = "INSERT INTO review(name,id_ik,comment,tanggal,id_review, rating) VALUES('$nama','$id','$comment','$tanggal','$id_review', '$rating')";
	// 	} 
	// 	else if(strpos($id,"RM") !== false)
	// 	{
	// 		$sql = "INSERT INTO review(name,id_kuliner,comment,tanggal,id_review, rating) VALUES('$nama','$id','$comment','$tanggal','$id_review', '$rating')";
	// 	} 
	// 	else if(strpos($id,"TM") !== false)
	// 	{
	// 		$sql = "INSERT INTO review(name,id_ow,comment,tanggal,id_review, rating) VALUES('$nama','$id','$comment','$tanggal','$id_review', '$rating')";
	// 	}

		// var_dump($sql); die();
		// $query_sql = mysqli_query($conn, $sql);

		// if($query_sql){
		// 	echo "<script>alert ('Review Was Added');</script>";
		// }else{
		// 	echo "<script>alert ('Ooops, Fields Must be Filled !');</script>";
		// }

		echo "<script>
			eval(\"parent.location='gallery_top.php?idgallery=$id'\");	
            </script>";
?>

