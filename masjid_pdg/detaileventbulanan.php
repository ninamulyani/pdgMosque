<?php
	require 'connect.php';
	$cari = $_GET["cari"];
	$opsi = $_GET['opsi'];
	$id_event = $_GET['id_event'];
	// $date2 = $_GET['weekly'];
	// $date3 = $_GET['monthly'];
	// $date4 = $_GET['annually'];
	$dataarray=[];
	if ($opsi=='today') {
        $querysearch =
        "SELECT distinct event.name as event_name, detail_event.id_worship_place, detail_event.id_event, worship_place.name as worship_place_name, detail_event.date, ustad.name as ustad_name, detail_event.description, detail_event.time, worship_place.image, ST_X(ST_Centroid(worship_place.geom)) AS lng, ST_Y(ST_CENTROID(worship_place.geom)) As lat FROM detail_event 
            left join event on detail_event.id_event=event.id
            left join worship_place on detail_event.id_worship_place=worship_place.id 
            left join ustad on detail_event.id_ustad=ustad.id
        where detail_event.status='1' and date=date(now()) and detail_event.id_worship_place='$cari' and detail_event.id_event='$id_event' ";
    } else if($opsi=='weekly'){
        $querysearch =
        "SELECT distinct event.name as event_name, detail_event.id_worship_place, detail_event.id_event, worship_place.name as worship_place_name, detail_event.date, ustad.name as ustad_name, detail_event.description, detail_event.time, worship_place.image, ST_X(ST_Centroid(worship_place.geom)) AS lng, ST_Y(ST_CENTROID(worship_place.geom)) As lat FROM detail_event 
            left join event on detail_event.id_event=event.id
            left join worship_place on detail_event.id_worship_place=worship_place.id 
            left join ustad on detail_event.id_ustad=ustad.id
        where detail_event.status='1' and yearweek(date)=yearweek(now()) and detail_event.id_worship_place='$cari' and detail_event.id_event='$id_event'";
    } else if($opsi=='monthly'){
        $querysearch =
        "SELECT distinct event.name as event_name, detail_event.id_worship_place, detail_event.id_event, worship_place.name as worship_place_name, detail_event.date, ustad.name as ustad_name, detail_event.description, detail_event.time, worship_place.image, ST_X(ST_Centroid(worship_place.geom)) AS lng, ST_Y(ST_CENTROID(worship_place.geom)) As lat FROM detail_event 
            left join event on detail_event.id_event=event.id
            left join worship_place on detail_event.id_worship_place=worship_place.id 
            left join ustad on detail_event.id_ustad=ustad.id
        where detail_event.status='1' and month(date)=month(now()) and detail_event.id_worship_place='$cari' and detail_event.id_event='$id_event' ";
    } else if($opsi=='annually'){
        $querysearch =
        "SELECT distinct event.name as event_name, detail_event.id_worship_place, detail_event.id_event, worship_place.name as worship_place_name, detail_event.date, ustad.name as ustad_name, detail_event.description, detail_event.time, worship_place.image, ST_X(ST_Centroid(worship_place.geom)) AS lng, ST_Y(ST_CENTROID(worship_place.geom)) As lat FROM detail_event 
            left join event on detail_event.id_event=event.id
            left join worship_place on detail_event.id_worship_place=worship_place.id 
            left join ustad on detail_event.id_ustad=ustad.id
        where detail_event.status='1' and year(date)=year(now()) and detail_event.id_worship_place='$cari' and detail_event.id_event='$id_event' ";
    }

	// $querysearch ="SELECT detail_event.id_worship_place, event.name as event_name, worship_place.name as worship_place_name, worship_place.image, detail_event.date, ustad.name as ustad_name, detail_event.description, detail_event.time, ST_X(ST_Centroid(worship_place.geom)) AS lng, ST_Y(ST_CENTROID(worship_place.geom)) As lat FROM detail_event 
	// 	join event on detail_event.id_event=event.id 
	// 	join worship_place on detail_event.id_worship_place=worship_place.id 
	// 	join ustad on detail_event.id_ustad=ustad.id 
	// where detail_event.status='1' and detail_event.id_worship_place='$cari' ";
	$hasil=mysqli_query($conn, $querysearch);
	while($row = mysqli_fetch_assoc($hasil))
		{
			$id_worship_place=$row['id_worship_place'];
			$idevent=$row['id_event'];
			$event_name=$row['event_name'];
			$worship_place_name=$row['worship_place_name'];
			$image=$row['image'];
			$date=$row['date'];
			$ustad_name=$row['ustad_name'];
			$description=$row['description'];
			$time=$row['time'];
			$longitude=$row['lng'];
			$latitude=$row['lat'];
			$dataarray[]=array(
				'id_worship_place'=>$id_worship_place,
				'worship_place_name'=>$worship_place_name,
				'id_event'=>$idevent,
				'event_name'=>$event_name, 
				'date'=>$date, 
				'ustad_name'=>$ustad_name,
				'description'=>$description,
				'time'=>$time, 
				'image'=>$image,
				'lat'=>$latitude, 
				'lng'=>$longitude);
		}
	echo json_encode ($dataarray);
?>
