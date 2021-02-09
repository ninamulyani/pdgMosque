<?php

	include('connect.php');
    $latit = $_GET['lat'];
    $longi = $_GET['long'];
	$rad=$_GET['rad']/1000;
	$dataarray=[];

    // query sebelum cos sin
	// $querysearch="SELECT id, name, address, land_size, park_area_size, building_size, capacity, est, last_renovation, jamaah, imam, teenager, id_category,
    // ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat, 
    // st_distance_sphere(ST_GeomFromText('POINT($latit $longi)', 4326), 
    // ST_GeomFromText(concat('POINT(',ST_Y(ST_CENTROID(geom)),' ',ST_X(ST_Centroid(geom)),')'), 4326)) as jarak 
    // from worship_place where st_distance_sphere(ST_GeomFromText('POINT($latit $longi)', 4326), 
    // ST_GeomFromText(concat('POINT(',ST_Y(ST_CENTROID(geom)),' ',ST_X(ST_Centroid(geom)),')'), 4326)) <= $rad";

    $querysearch = "SELECT
    id, (
    6371 * acos (
        cos ( radians('$latit') )
        * cos( radians( ST_Y(ST_CENTROID(geom)) ) )
        * cos( radians( ST_X(ST_CENTROID(geom)) ) - radians('$longi') )
        + sin ( radians('$latit') )
        * sin( radians( ST_Y(ST_CENTROID(geom)) ) )
    )
    ) AS jarak, name, address, land_size, park_area_size, building_size, capacity, est, last_renovation, jamaah, imam, teenager, id_category,
    ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat
    FROM worship_place
    HAVING jarak <= $rad";
	$hasil=mysqli_query($conn,$querysearch);

        while($baris = mysqli_fetch_array($hasil))
            {
                $id=$baris['id'];
                $name=$baris['name'];
                $address=$baris['address'];
                $land_size=$baris['land_size'];
                $park_area_size=$baris['park_area_size'];
                $building_size=$baris['building_size'];
                $capacity=$baris['capacity'];
                $est=$baris['est'];
                $last_renovation=$baris['last_renovation'];
                $jamaah=$baris['jamaah'];
                $imam=$baris['imam'];
                $teenager=$baris['teenager'];
                $id_category=$baris['id_category'];
                $latitude=$baris['lat'];
                $longitude=$baris['lng'];
                $dataarray[]=array(
                    'id'=>$id,
                    'name'=>$name,
                    'address'=>$address,
                    'land_size'=>$land_size, 
                    'park_area_size'=>$park_area_size, 
                    'building_size'=>$building_size,
                    'capacity'=>$capacity, 
                    'est'=>$est, 
                    'last_renovation'=>$last_renovation,
                    'jamaah'=>$jamaah, 
                    'imam'=>$imam, 
                    'teenager'=>$teenager,
                    'id_category'=>$id_category,
                    "latitude"=>$latitude,
                    "longitude"=>$longitude);
            }
            echo json_encode ($dataarray);
?>
