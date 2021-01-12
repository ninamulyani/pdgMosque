<?php
    session_start();
    include('connect.php');
  
    $city = $_SESSION['id'];
    $opsi     = $_GET['opsi'];
    $dataarray=[];
    if ($opsi=='today') {
        $querysearch =
        "SELECT distinct event.name as event_name, detail_event.id_event, detail_event.id_worship_place, worship_place.name as worship_place_name, detail_event.date, ustad.name as ustad_name, detail_event.description, detail_event.time, worship_place.image, ST_X(ST_Centroid(worship_place.geom)) AS lng, ST_Y(ST_CENTROID(worship_place.geom)) As lat FROM detail_event 
            left join event on detail_event.id_event=event.id
            left join worship_place on detail_event.id_worship_place=worship_place.id 
            left join ustad on detail_event.id_ustad=ustad.id, city
        where city.id='$city' AND st_contains(city.geom, worship_place.geom) and detail_event.status='1' and date=date(now())";
    } else if($opsi=='weekly'){
        $querysearch =
        "SELECT distinct event.name as event_name, detail_event.id_event, detail_event.id_worship_place, worship_place.name as worship_place_name, detail_event.date, ustad.name as ustad_name, detail_event.description, detail_event.time, worship_place.image, ST_X(ST_Centroid(worship_place.geom)) AS lng, ST_Y(ST_CENTROID(worship_place.geom)) As lat FROM detail_event 
            left join event on detail_event.id_event=event.id
            left join worship_place on detail_event.id_worship_place=worship_place.id 
            left join ustad on detail_event.id_ustad=ustad.id, city
        where city.id='$city' AND st_contains(city.geom, worship_place.geom) and detail_event.status='1' and yearweek(date)=yearweek(now())";
    } else if($opsi=='monthly'){
        $querysearch =
        "SELECT distinct event.name as event_name, detail_event.id_event, detail_event.id_worship_place, worship_place.name as worship_place_name, detail_event.date, ustad.name as ustad_name, detail_event.description, detail_event.time, worship_place.image, ST_X(ST_Centroid(worship_place.geom)) AS lng, ST_Y(ST_CENTROID(worship_place.geom)) As lat FROM detail_event 
            left join event on detail_event.id_event=event.id
            left join worship_place on detail_event.id_worship_place=worship_place.id 
            left join ustad on detail_event.id_ustad=ustad.id, city
        where city.id='$city' AND st_contains(city.geom, worship_place.geom) and detail_event.status='1' and month(date)=month(now())";
    } else if($opsi=='annually'){
        $querysearch =
        "SELECT distinct event.name as event_name, detail_event.id_event, detail_event.id_worship_place, worship_place.name as worship_place_name, detail_event.date, ustad.name as ustad_name, detail_event.description, detail_event.time, worship_place.image, ST_X(ST_Centroid(worship_place.geom)) AS lng, ST_Y(ST_CENTROID(worship_place.geom)) As lat FROM detail_event 
            left join event on detail_event.id_event=event.id
            left join worship_place on detail_event.id_worship_place=worship_place.id 
            left join ustad on detail_event.id_ustad=ustad.id, city
        where city.id='$city' AND st_contains(city.geom, worship_place.geom) and detail_event.status='1' and year(date)=year(now())";
    }
    
    $hasil= mysqli_query($conn, $querysearch);
    while($row = mysqli_fetch_assoc($hasil)){
        $id_worship_place=$row['id_worship_place'];
        $worsip_name=$row['worship_place_name'];
        $id_event=$row['id_event'];
        $event_name=$row['event_name']; 
        $ustad_name=$row['ustad_name'];
        $description=$row['description'];
        $date=$row['date'];
        $time=$row['time'];
        $image=$row['image'];
        $longitude=$row['lng'];
		$latitude=$row['lat'];
        $dataarray[]=array(
            'id_worship_place'=>$id_worship_place,
            'worship_place_name'=>$worsip_name,

            'ustad_name'=>$ustad_name,
            'description'=>$description,
            'event_name'=>$event_name,
            'id_event'=>$id_event,
            'date'=>$date, 
            'time'=>$time,
            'image'=>$image,
            'lat'=>$latitude, 
			'lng'=>$longitude);
    }
    echo json_encode($dataarray);
?>