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

        $sql = "INSERT into review(id_review,name,comment,tanggal,id_restaurant,rating) values('$id_review','$nama','$comment',CURRENT_TIMESTAMP,'$id','$rating')";
        $query_sql = mysqli_query($conn,$sql);
        if($query_sql){
            echo "<script>alert ('Comment Successfully Added');</script>";
        }else{
            echo "<script>alert ('Error');</script>";
        }
    }

		echo "<script>
			eval(\"parent.location='gallery_res.php?idgallery=$id'\");	
            </script>";
?>

