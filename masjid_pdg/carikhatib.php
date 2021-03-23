<?php
//Fungsi cari  khatib 
	session_start();
	include("connect.php");
	$city 	    = $_SESSION['id'];
	$id_ustad 	= $_GET["id_khatib"];
	$dataarray	=[];
	$querysearch =
    "select worship_place.id as worship_id, worship_place.name as worship_name, event.id as event_id, event.name as event_name, ustad.id as id_ustad,
	st_x(st_centroid(worship_place.geom)) as lat, 
		st_y(st_centroid(worship_place.geom)) as lng from worship_place 
		join detail_event on worship_place.id = detail_event.id_worship_place
		join event on detail_event.id_event = event.id
		join ustad on detail_event.id_ustad=ustad.id, city 
		where city.id = '$city' AND st_contains(city.geom, worship_place.geom) 
		and detail_event.id_event in (3, 8, 16) and detail_event.id_ustad = $id_ustad group by worship_place.name";

	$hasil=mysqli_query($conn, $querysearch);
	while($row = mysqli_fetch_array($hasil))
		{
			$worship_id     = $row['worship_id'];
			$worship_name   = $row['worship_name'];
			$event_id       = $row['event_id'];
            $event_name     = $row['event_name'];
			$ustad_id		= $row['id_ustad'];
			$longitude      = $row['lat'];
			$latitude       = $row['lng'];
			$dataarray[]    = array(
                'worship_id'=>$worship_id,
                'worship_name'=>$worship_name,
                'event_id'=>$event_id,
                'event_name'=>$event_name,
				'ustad_id'=>$ustad_id,
                'lon'=>$longitude,
                'latit'=>$latitude);
		}
	echo json_encode ($dataarray);
?>
