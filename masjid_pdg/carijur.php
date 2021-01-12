<?php
	session_start();
	require 'connect.php';
	$city = $_SESSION['id'];
	
	$jur = $_GET["jur"];
	$dataarray=[];
	$querysearch	=" SELECT angkot.id, angkot.destination, ST_X(ST_Centroid(angkot.geom)) AS lng, ST_Y(ST_CENTROID(angkot.geom)) As lat from angkot, city 
	where angkot.id='$jur' and city.id='$city' AND st_contains(city.geom, angkot.geom) ";

	$hasil=mysqli_query($conn,$querysearch);
	while($row = mysqli_fetch_array($hasil))
		{
			$id=$row['id'];
			$destination=$row['destination'];
			$lng=$row['lng'];
			$lat=$row['lat'];
			$dataarray[]=array('id'=>$id,'destination'=>$destination,'lng'=>$lng,'lat'=>$lat);
		}
	echo json_encode ($dataarray);
?>
