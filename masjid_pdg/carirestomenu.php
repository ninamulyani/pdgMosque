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
    // $querysearch= "Select distinct worship_place.id as idmes, worship_place.name as worship_place_name, restaurant.name as restaurant_name, st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat, 
    // round(st_distance_sphere(
    //   ST_GeomFromText(concat
    //     ('POINT(
    //       ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //       ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //   ST_GeomFromText(concat
    //     ('POINT(
    //       ',ST_Y(ST_CENTROID(restaurant.geom)),' 
    //       ',ST_X(ST_Centroid(restaurant.geom)),')'), 4326)),2) as jarak 
    // from worship_place join detail_worship_place on worship_place.id = detail_worship_place.id_worship_place
    // join angkot on detail_worship_place.id_angkot = angkot.id
    // join detail_restaurant on angkot.id = detail_restaurant.id_angkot
    // join restaurant on detail_restaurant.id_restaurant = restaurant.id
    // join restaurant_category on restaurant.id_category = restaurant_category.id
    // where restaurant_category.id in ($c) group by worship_place_name, restaurant_name, jarak order by jarak ASC";

    // query sebelum cos sin
    // $querysearch= "Select distinct worship_place.id as idmes, culinary_place.id as idcul, worship_place.name as worship_place_name, culinary_place.name as culinary_place_name, 
    // st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat, st_x(st_centroid(culinary_place.geom)) as lng1, 
    // st_y(st_centroid(culinary_place.geom)) as lat1,
    //           round(st_distance_sphere(
    //             ST_GeomFromText(concat
    //               ('POINT(
    //                 ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //                 ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //             ST_GeomFromText(concat
    //               ('POINT(
    //                 ',ST_Y(ST_CENTROID(culinary_place.geom)),' 
    //                 ',ST_X(ST_Centroid(culinary_place.geom)),')'), 4326)),2) as jarak 
    // from worship_place,detail_worship_place, angkot, detail_culinary_place, culinary_place, culinary_category, city where 
    // worship_place.id = detail_worship_place.id_worship_place and
    // detail_worship_place.id_angkot = angkot.id and
    // angkot.id = detail_culinary_place.id_angkot and
    // detail_culinary_place.id_culinary_place = culinary_place.id and
    // culinary_place.id_category=culinary_category.id and 
    // city.id='$city' and st_contains(city.geom, worship_place.geom) and st_contains(city.geom, culinary_place.geom) and culinary_category.id in ($c) order by jarak ASC limit 25";
    $querysearch= "Select distinct worship_place.id as idmes, round((
      6371 * acos  (
          cos ( radians(st_y(st_centroid(culinary_place.geom))) )
          * cos( radians( ST_Y(ST_CENTROID(worship_place.geom)) ) ) * cos( radians( ST_X(ST_CENTROID(worship_place.geom)) ) - radians(st_x(st_centroid(culinary_place.geom))) ) + sin ( radians(st_y(st_centroid(culinary_place.geom))) )
          * sin( radians( ST_Y(ST_CENTROID(worship_place.geom)) ) )
      ))*1000,2) AS jarak, 
      culinary_place.id as idcul, worship_place.name as worship_place_name, culinary_place.name as culinary_place_name, 
      st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat
             from worship_place,detail_worship_place, angkot, detail_culinary_place, culinary_place, culinary_category, city where 
      worship_place.id = detail_worship_place.id_worship_place and
      detail_worship_place.id_angkot = angkot.id and
      angkot.id = detail_culinary_place.id_angkot and
      detail_culinary_place.id_culinary_place = culinary_place.id and
      culinary_place.id_category=culinary_category.id and 
      city.id='$city' and st_contains(city.geom, worship_place.geom) and st_contains(city.geom, culinary_place.geom) 
      and culinary_category.id in ($c) order by jarak ASC limit 15";
        //echo '<script>'console.log($querysearch)'</script>';
        $hasil=mysqli_query($conn, $querysearch);
        while($row = mysqli_fetch_array($hasil))
          {
              $idmes=$row['idmes'];
              $worship_name=$row['worship_place_name'];
              $rest_name=$row['culinary_place_name'];
              $jarak=$row['jarak'];
              $longitude=$row['lng'];
              $latitude=$row['lat'];
              $dataarray[]=array(
                  'idmes'=>$idmes,
                  'worship_place_name'=>$worship_name,
                  'restaurant_name'=>$rest_name,
                  'jarak'=>$jarak,
                  'longitude'=>$longitude,
                  'latitude'=>$latitude
              );
	        }
	echo json_encode ($dataarray);
?>
