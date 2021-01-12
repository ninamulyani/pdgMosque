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
    // $querysearch= "Select distinct worship_place.id as idmes, souvenir.id as idso, worship_place.name as worship_place_name, souvenir.name as souvenir_name, 
    // st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat, 
    // round(st_distance_sphere(
    //   ST_GeomFromText(concat
    //     ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //   ST_GeomFromText(concat
    //     ('POINT(
    //             ',ST_Y(ST_CENTROID(souvenir.geom)),' 
    //             ',ST_X(ST_Centroid(souvenir.geom)),')'), 4326)),2) as jarak 
    //   from worship_place join detail_worship_place on detail_worship_place.id_worship_place=worship_place.id
    //   join angkot on angkot.id=detail_worship_place.id_angkot
    //   join detail_souvenir on detail_souvenir.id_angkot=angkot.id
    //   join souvenir on detail_souvenir.id_souvenir=souvenir.id
    //   join souvenir_type on souvenir.id_souvenir_type=souvenir_type.id where
    //   souvenir_type.id in ($c) group by worship_place_name, souvenir_name, jarak order by jarak ASC";

    $querysearch= "Select distinct worship_place.id as idmes, souvenir.id as idso, worship_place.name as worship_place_name, souvenir.name as souvenir_name, 
    st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat, st_x(st_centroid(souvenir.geom)) as lng1, st_y(st_centroid(souvenir.geom)) as lat1,
    round(st_distance_sphere(
      ST_GeomFromText(concat
        ('POINT(
                ',ST_Y(ST_CENTROID(worship_place.geom)),' 
                ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
      ST_GeomFromText(concat
        ('POINT(
                ',ST_Y(ST_CENTROID(souvenir.geom)),' 
                ',ST_X(ST_Centroid(souvenir.geom)),')'), 4326)),2) as jarak 
      from worship_place, detail_worship_place, angkot, detail_souvenir, souvenir, souvenir_type, city where
      detail_worship_place.id_worship_place=worship_place.id and
      angkot.id=detail_worship_place.id_angkot and
      detail_souvenir.id_angkot=angkot.id and
      detail_souvenir.id_souvenir=souvenir.id and
      souvenir.id_souvenir_type=souvenir_type.id
      and city.id='$city' AND st_contains(city.geom, worship_place.geom) AND st_contains(city.geom, souvenir.geom)
      and souvenir_type.id in ($c) order by jarak ASC limit 50";
        $hasil=mysqli_query($conn, $querysearch);
        while($row = mysqli_fetch_array($hasil))
          {
            $idmes=$row['idmes'];
            $idso=$row['idso'];
            $worship_name=$row['worship_place_name'];
            $souvenir_name=$row['souvenir_name'];
            $jarak=$row['jarak'];
            $longitude=$row['lng'];
            $latitude=$row['lat'];
            $dataarray[]=array(
                  'idmes'=>$idmes,
                  'idres'=>$idso,
                  'worship_place_name'=>$worship_name,
                  'restaurant_name'=>$souvenir_name,
                  'jarak'=>$jarak,
                  'longitude'=>$longitude,
                  'latitude'=>$latitude
              );
	      	}
	echo json_encode ($dataarray);
?>
