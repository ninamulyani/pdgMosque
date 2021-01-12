<?php
include ('../inc/connect.php');

$id = $_POST['nama'];
$type = $_POST['type'];
$status = $_POST['status'];

$sql = mysqli_query($conn,"insert into detail_worship_type (id, id_type, status) values ('$id', '$type', '$status')");
// echo "insert into detail_worship_type (id, id_type, status) values ('$id', '$type', '$status')";

if ($sql){
	echo "<script>
		alert (' Data Successfully Added');
		eval(\"parent.location='../index.php?page=recommendation '\");
		</script>";
}else{
	echo 'error';
}

?>
