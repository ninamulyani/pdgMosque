<?php
	session_start();
    include('connect.php');
  
    $city = $_SESSION['id'];
	$lay	= $_GET['lay'];
	$lay 	= explode(",", $lay);
	$c 		= "";
		for($i=0;$i<count($lay);$i++){
			if($i == count($lay)-1){
				$c .= "'".$lay[$i]."'";
			}else{
				$c .= "'".$lay[$i]."',";
			}
		}
	$dataarray=[];
    // $querysearch= "Select distinct worship_place.id as idmes, tourism.id, worship_place.name as worship_place_name, tourism.name as tourism_name,
    // st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat, st_x(st_centroid(tourism.geom)) as lng1, st_y(st_centroid(tourism.geom)) as lat1,
    // round(st_distance_sphere(
    //   ST_GeomFromText(concat
    //     ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //   ST_GeomFromText(concat
    //     ('POINT(
    //             ',ST_Y(ST_CENTROID(tourism.geom)),' 
    //             ',ST_X(ST_Centroid(tourism.geom)),')'), 4326)),2) as jarak 
    //   from worship_place, detail_worship_place, angkot, detail_tourism, tourism, tourism_type, city where
    //   detail_worship_place.id_worship_place=worship_place.id and
    //   angkot.id=detail_worship_place.id_angkot and
    //   detail_tourism.id_angkot=angkot.id and
    //   detail_tourism.id_tourism=tourism.id and
    //   tourism.id_type=tourism_type.id
    //   and city.id='$city' AND st_contains(city.geom, worship_place.geom) AND st_contains(city.geom, tourism.geom)
    //   and tourism_type.id in ($c) order by jarak ASC limit 35" ;
    $querysearch= "Select distinct worship_place.id as idmes, round((
      6371 * acos  (
          cos ( radians(st_y(st_centroid(tourism.geom))) )
          * cos( radians( ST_Y(ST_CENTROID(worship_place.geom)) ) ) * cos( radians( ST_X(ST_CENTROID(worship_place.geom)) ) - radians(st_x(st_centroid(tourism.geom))) ) + sin ( radians(st_y(st_centroid(tourism.geom))) )
          * sin( radians( ST_Y(ST_CENTROID(worship_place.geom)) ) )
      ))*1000,2) AS jarak, 
      tourism.id, worship_place.name as worship_place_name, tourism.name as tourism_name,
      st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat
            from worship_place, detail_worship_place, angkot, detail_tourism, tourism, tourism_type, city where
        detail_worship_place.id_worship_place=worship_place.id and
        angkot.id=detail_worship_place.id_angkot and
        detail_tourism.id_angkot=angkot.id and
        detail_tourism.id_tourism=tourism.id and
        tourism.id_type=tourism_type.id
        and city.id='$city' AND st_contains(city.geom, worship_place.geom) AND st_contains(city.geom, tourism.geom)
        and tourism_type.id in ($c) order by jarak ASC limit 15";
        $hasil=mysqli_query($conn, $querysearch);
        while($row = mysqli_fetch_array($hasil))
          {
			  $idmes=$row['idmes'];
              $worship_name=$row['worship_place_name'];
              $tourism_name=$row['tourism_name'];
              $jarak=$row['jarak'];
              $longitude=$row['lng'];
              $latitude=$row['lat'];
              $dataarray[]=array(
                  'idmes'=>$idmes,
                  'worship_place_name'=>$worship_name,
                  'restaurant_name'=>$tourism_name,
                  'jarak'=>$jarak,
                  'longitude'=>$longitude,
                  'latitude'=>$latitude
              );
	       }
	echo json_encode ($dataarray);
?>
