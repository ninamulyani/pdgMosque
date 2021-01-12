<?php
	include ('connect.php');

	$dataarray=array();

	$sql= mysqli_query($conn,
			"select distinct tourism_type.id, tourism_type.name from tourism_type order by tourism_type.id");

	while($row = mysqli_fetch_array($sql)){
		$id=$row['id'];
		$name=$row['name'];
		$dataarray[]=array('id'=>$id,'name'=>$name);
	}
	echo json_encode ($dataarray);

?>
