<?php
	include ('connect.php');

	$dataarray=array();

	$sql= mysqli_query($conn,
			"select distinct souvenir_type.id, souvenir_type.name from souvenir_type order by souvenir_type.id");

	while($row = mysqli_fetch_array($sql)){
		$id=$row['id'];
		$name=$row['name'];
		$dataarray[]=array('id'=>$id,'name'=>$name);
	}
	echo json_encode ($dataarray);

?>
