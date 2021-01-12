<?php
    include("connect.php");
    $id_mesjid = $_GET['id'];
    //echo '<script>console.log($id_mesjid)</script>';
    $dataarray=[];
    $result=  mysqli_query($conn,"SELECT detail_worship_place.id_worship_place, angkot.destination, detail_worship_place.distance, angkot.route_color, detail_worship_place.id_angkot, worship_place.name, detail_worship_place.lat, detail_worship_place.lng, ST_X(ST_Centroid(worship_place.geom)) AS longitude, ST_Y(ST_CENTROID(worship_place.geom)) As latitude FROM detail_worship_place left join angkot on detail_worship_place.id_angkot=angkot.id left join worship_place on detail_worship_place.id_worship_place=worship_place.id where detail_worship_place.id_worship_place='$id_mesjid' ");
    
        while($baris = mysqli_fetch_array($result))
            {
                $id_angkot=$baris['id_angkot'];
                $id_worship_place=$baris['id_worship_place'];
                $destination=$baris['destination'];
                $name=$baris['name'];
                $distance=$baris['distance'];
                $route_color=$baris['route_color'];
                $latitude=$baris['latitude'];
                $longitude=$baris['longitude'];
				$lat=$baris['lat'];
                $lng=$baris['lng'];
                $dataarray[]=array('id_angkot'=>$id_angkot,'id_worship_place'=>$id_worship_place,'destination'=>$destination,'name'=>$name, 'route_color'=>$route_color,'distance'=>$distance, "latitude"=>$latitude,"longitude"=>$longitude, "lat"=>$lat,"lng"=>$lng);
            }
            echo json_encode ($dataarray);
?>
