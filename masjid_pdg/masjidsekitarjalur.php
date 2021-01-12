<?php
    include("connect.php");
    $id_angkot = $_GET['id_angkot'];

    $result=  mysqli_query($conn,"SELECT detail_worship_place.id_worship_place, worship_place.name, detail_worship_place.description, detail_worship_place.distance,
    st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat, 
    detail_worship_place.lat as lat_angkot, detail_worship_place.lng as lng_angkot FROM detail_worship_place 
    left join worship_place on worship_place.id = detail_worship_place.id_worship_place WHERE id_angkot= '$id_angkot' and distance <=500 order by distance ASC");

    // query mencari jarak masjid ke titik turun / distance
    // $querysearch = "SELECT FLOOR(111045 * DEGREES(acos(
    //     cos( radians(st_y(st_centroid(tourism.geom))) )
    // * cos( radians( detail_tourism.lat ) )
    // * cos( radians( detail_tourism.lng ) - radians(st_x(st_centroid(tourism.geom))) )
    // + sin( radians(st_y(st_centroid(tourism.geom))) )
    // * sin( radians( detail_tourism.lat) ))) ) as distance, 
    //     detail_tourism.id_angkot, tourism.id as id, tourism.name, angkot.destination,
    //     angkot.route_color, st_x(st_centroid(angkot.geom)) AS lng3, st_y(st_centroid(angkot.geom)) AS lat3,
    //     st_x(st_centroid(tourism.geom)) AS lng2, st_y(st_centroid(tourism.geom)) AS lat2, detail_tourism.lat as lat1,
    //     detail_tourism.lng as lng1, detail_tourism.description
    //     FROM detail_tourism
    //     LEFT JOIN tourism ON tourism.id = detail_tourism.id_tourism
    //     LEFT JOIN angkot ON angkot.id = detail_tourism.id_angkot
    //     WHERE angkot.id = '$id_a' ORDER BY distance ASC";


        while($baris = mysqli_fetch_array($result))
            {
                $id=$baris['id_worship_place'];
                $name=$baris['name'];
                $description=$baris['description'];
                $distance=$baris['distance'];
                $lat=$baris['lat'];
                $lng=$baris['lng'];
                $lat2=$baris['lat_angkot'];
                $lng2=$baris['lng_angkot'];
                $dataarray[]=array(
                    'id'=>$id,
                    'name'=>$name,
                    'description'=>$description,
                    'distance'=>$distance,
                    'lat'=>$lat,
                    'lng'=>$lng,
                    'lat2'=>$lat2,
                    'lng2'=>$lng2
                );
            }
            echo json_encode ($dataarray);
?>