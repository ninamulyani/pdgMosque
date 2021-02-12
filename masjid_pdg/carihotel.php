<?php

	include('connect.php');
    $latit = $_GET['lat'];
    $longi = $_GET['lng'];
		$rad   = $_GET['rad']/100;

		$lt   = array();
    $lati = array();
    $long = array();
    $ln   = array();

    $id   = array();
    $name = array();
    $jarak= array();

    $dataarray=[];
    // $querysearch="SELECT id, name, address, cp, ktp, marriage_book, mushalla, star, id_type, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat, 
    // st_distance_sphere(ST_GeomFromText('POINT($latit $longi)', 4326), 
    // ST_GeomFromText(concat('POINT(',ST_Y(ST_CENTROID(geom)),' ',ST_X(ST_Centroid(geom)),')'), 4326)) as jarak 
    // from hotel where st_distance_sphere(ST_GeomFromText('POINT($latit $longi)', 4326), 
    // ST_GeomFromText(concat('POINT(',ST_Y(ST_CENTROID(geom)),' ',ST_X(ST_Centroid(geom)),')'), 4326)) <=$rad";

    // query sebelum cos sin
    // $querysearch="SELECT id, name, address, cp, ktp, marriage_book, mushalla, id_type, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat, 
    // st_distance_sphere(ST_GeomFromText('POINT($latit $longi)', 4326), 
    // ST_GeomFromText(concat('POINT(',ST_Y(ST_CENTROID(geom)),' ',ST_X(ST_Centroid(geom)),')'), 4326)) as jarak 
    // from hotel where st_distance_sphere(ST_GeomFromText('POINT($latit $longi)', 4326), 
    // ST_GeomFromText(concat('POINT(',ST_Y(ST_CENTROID(geom)),' ',ST_X(ST_Centroid(geom)),')'), 4326)) <=$rad";
    
    // $querysearch = "SELECT
    // id, (
    // 6371 * acos (
    //     cos ( radians('$latit') )
    //     * cos( radians( ST_Y(ST_CENTROID(geom)) ) )
    //     * cos( radians( ST_X(ST_CENTROID(geom)) ) - radians('$longi') )
    //     + sin ( radians('$latit') )
    //     * sin( radians( ST_Y(ST_CENTROID(geom)) ) )
    // )
    // ) AS jarak, name, address, cp, ktp, marriage_book, mushalla, id_type, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat
    // FROM hotel
    // HAVING jarak <= $rad";

    $querysearch = "SELECT id, name, address, cp, ktp, marriage_book, mushalla, id_type, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat FROM hotel WHERE
    ST_Intersects(ST_Centroid(hotel.geom),ST_buffer(ST_GeomFromText(concat('POINT($longi $latit)')), 0.0009*$rad))=1";

    $hasil=mysqli_query($conn, $querysearch);
    while($row = mysqli_fetch_array($hasil))
        {
          $id=$row['id'];
          $name=$row['name'];
          $address=$row['address'];
          $cp=$row['cp'];
          $ktp=$row['ktp'];
          $marriage_book=$row['marriage_book'];
          $mushalla=$row['mushalla'];
          //$star=$row['star'];
          $id_type=$row['id_type'];
          $latitude=$row['lat'];
          $longitude=$row['lng'];
          $dataarray[]=array(
            'id'=>$id,
            'name'=>$name,
            'address'=>$address,
            'cp'=>$cp, 'ktp'=>$ktp, 
            'marriage_book'=>$marriage_book, 
            'mushalla'=>$mushalla, 
            //'star'=>$star, 
            'id_type'=>$id_type, 
            'latitude'=>$latitude,
            'longitude'=>$longitude);
        }
    echo json_encode ($dataarray);

?>
