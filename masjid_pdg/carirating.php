<?php
    session_start();
    include('connect.php');
  
    $city = $_SESSION['id'];
    $cari_rate = $_GET["rate"];
    $querysearch = "";

    if($cari_rate==1){
        $querysearch="SELECT worship_place.id, worship_place.name, ST_X(ST_Centroid(worship_place.geom)) AS lng, 
        ST_Y(ST_CENTROID(worship_place.geom)) As lat,  count(*) as review, 
        floor(AVG(rating)) AS rata_rating FROM worship_place join review on worship_place.id=review.id_worship, city where city.id='$city' AND st_contains(city.geom, worship_place.geom)
        GROUP BY worship_place.id order by rata_rating desc";
    }
    else if($cari_rate==2){
        $querysearch="SELECT worship_place.id, worship_place.name, ST_X(ST_Centroid(worship_place.geom)) AS lng, 
        ST_Y(ST_CENTROID(worship_place.geom)) As lat,  count(*) as review, 
        floor(AVG(rating)) AS rata_rating FROM worship_place join review on worship_place.id=review.id_worship, city where city.id='$city' AND st_contains(city.geom, worship_place.geom)
        GROUP BY worship_place.id order by rata_rating asc";
    }	
    $hasil=mysqli_query($conn, $querysearch);
            while($row = mysqli_fetch_assoc($hasil))    
        {
            $id=$row['id'];
            $name=$row['name'];
            $review=$row['review'];
            $rating=$row['rata_rating'];
            $longitude=$row['lng'];
            $latitude=$row['lat'];
            $dataarray[]=array('id'=>$id,'name'=>$name, 'review'=>$review, 'rating'=>$rating,'longitude'=>$longitude,'latitude'=>$latitude);
        }
    echo json_encode ($dataarray);
?>