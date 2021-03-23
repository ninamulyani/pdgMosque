<?php
	require 'connect.php';
	
	$id_Worship = $_GET["id_worship"];
	$id_Ustad = $_GET['id_ustad'];
	$dataarray=[];
	$querysearch ="SELECT detail_event.id_worship_place, worship_place.name as worship_place_name, event.name as event_name, ustad.name as ustad_name, 
    detail_event.date, detail_event.time, detail_event.description, worship_place.image,
    ST_X(ST_Centroid(worship_place.geom)) AS lng, ST_Y(ST_CENTROID(worship_place.geom)) As lat FROM detail_event 
            join event on detail_event.id_event=event.id 
            join worship_place on detail_event.id_worship_place=worship_place.id 
            join ustad on detail_event.id_ustad=ustad.id 
    where detail_event.id_worship_place='$id_Worship' and detail_event.id_event in (3, 8, 16) and detail_event.id_ustad = $id_Ustad order by detail_event.date desc";
	$hasil=mysqli_query($conn, $querysearch);
	while($row = mysqli_fetch_array($hasil))
		{
			$id_worship_place=$row['id_worship_place'];
            $worship_place_name=$row['worship_place_name'];
			$event_name=$row['event_name'];
			$ustad_name=$row['ustad_name'];
			$date=$row['date'];
			$time=$row['time'];
			$description=$row['description'];
            $image=$row['image'];
			$longitude=$row['lng'];
			$latitude=$row['lat'];
			$dataarray[]=array(
				'id_worship_place'=>$id_worship_place,
				'worship_place_name'=>$worship_place_name,
				'event_name'=>$event_name, 
				'date'=>$date, 
				'ustad_name'=>$ustad_name,
				'description'=>$description,
                'image'=>$image,
				'time'=>$time,
				'lat'=>$latitude, 
				'lng'=>$longitude);
		}
	echo json_encode ($dataarray);
?>
