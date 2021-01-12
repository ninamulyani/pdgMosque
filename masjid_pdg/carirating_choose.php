<?php
    session_start();
    include('connect.php');
  
    $city = $_SESSION['id'];
    $id_star=$_GET["stat"];
    $querysearch = "SELECT worship_place.id, worship_place.name, ST_X(ST_Centroid(worship_place.geom)) AS lng, 
    ST_Y(ST_CENTROID(worship_place.geom)) As lat,  count(*) as review, 
    floor(AVG(rating)) AS rata_rating FROM worship_place join review on worship_place.id=review.id_worship, city
    where city.id='$city' AND st_contains(city.geom, worship_place.geom)
    GROUP BY worship_place.id having floor(AVG(rating))=$id_star order by worship_place.name";
	
    $hasil=mysqli_query($conn, $querysearch);
            while($row = mysqli_fetch_array($hasil))    
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