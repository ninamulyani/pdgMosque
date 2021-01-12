<?php
	include ('connect.php');

	// $id=$_GET["id"];
	$dataarray=array();

	$sql= mysqli_query($conn,
			"select distinct hotel_type.id, hotel_type.name from hotel_type order by hotel_type.id");

	while($row = mysqli_fetch_array($sql)){
		$id=$row['id'];
		$name=$row['name'];
		$dataarray[]=array('id'=>$id,'name'=>$name);
	}
	echo json_encode ($dataarray);

?>
