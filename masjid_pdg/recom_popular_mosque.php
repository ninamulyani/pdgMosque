<?php
  session_start();
  include('connect.php');

  $city       = $_SESSION['id'];
  $type       = $_GET['type'];
  $dataarray  = [];
    
        if ($type=='Historical Mosque') {
          $querysearch= "SELECT distinct worship_place.id, worship_place.name, detail_worship_type.id_type, detail_worship_type.status, worship_place_type.name as name_type, worship_place_gallery.gallery_worship_place, st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat 
          from worship_place_type join detail_worship_type on worship_place_type.id_type=detail_worship_type.id_type
          join worship_place on detail_worship_type.id=worship_place.id
          join worship_place_gallery on worship_place.id=worship_place_gallery.id, city
          where city.id='$city' AND st_contains(city.geom, worship_place.geom) and worship_place_type.name ='Historical Mosque' group by worship_place.name order by status ASC";

          $hasil=mysqli_query($conn, $querysearch);
          while($row = mysqli_fetch_array($hasil))
            {
              $id=$row['id'];
              $worship_name=$row['name'];
              $id_type=$row['id_type'];
              $worship_type=$row['name_type'];
              $worship_gallery=$row['gallery_worship_place'];
              $status=$row['status'];
              $longitude=$row['lng'];
              $latitude=$row['lat'];
              $dataarray[]=array(
                  'id'=>$id,
                  'name'=>$worship_name,
                  'id_type'=>$id_type,
                  'worship_type'=>$worship_type,
                  'worship_gallery'=>$worship_gallery,
                  'status'=>$status,
                  'longitude'=>$longitude,
                  'latitude'=>$latitude
              );
            }
        } else if($type=='Mosques Around Tours'){
          $querysearch = "SELECT distinct worship_place.id, worship_place.name, detail_worship_type.id_type, detail_worship_type.status, worship_place_type.name as name_type, worship_place_gallery.gallery_worship_place, st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat 
          from worship_place_type join detail_worship_type on worship_place_type.id_type=detail_worship_type.id_type
          join worship_place on detail_worship_type.id=worship_place.id
          join worship_place_gallery on worship_place.id=worship_place_gallery.id, city
          where city.id='$city' AND st_contains(city.geom, worship_place.geom) and worship_place_type.name ='Mosques Around Tours' group by worship_place.name order by status ASC"; 

            $hasil=mysqli_query($conn, $querysearch);
            while($row = mysqli_fetch_array($hasil))
              {
              $id=$row['id'];
              $worship_name=$row['name'];
              $id_type=$row['id_type'];
              $worship_type=$row['name_type'];
              $worship_gallery=$row['gallery_worship_place'];
              $status=$row['status'];
              $longitude=$row['lng'];
              $latitude=$row['lat'];
              $dataarray[]=array(
                  'id'=>$id,
                  'name'=>$worship_name,
                  'id_type'=>$id_type,
                  'worship_type'=>$worship_type,
                  'worship_gallery'=>$worship_gallery,
                  'status'=>$status,
                  'longitude'=>$longitude,
                  'latitude'=>$latitude
                );
              }
        } else if($type=='Tourist Mosque'){
          $querysearch = "SELECT distinct worship_place.id,worship_place.name, detail_worship_type.id_type, detail_worship_type.status,worship_place_type.name as name_type, worship_place_gallery.gallery_worship_place, st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat
          from worship_place_type join detail_worship_type on worship_place_type.id_type=detail_worship_type.id_type
          join worship_place on detail_worship_type.id=worship_place.id
          join worship_place_gallery on worship_place.id=worship_place_gallery.id, city
          where city.id='$city' AND st_contains(city.geom, worship_place.geom) and worship_place_type.name ='Tourist Mosque' group by worship_place.name order by status ASC"; 

            $hasil=mysqli_query($conn, $querysearch);
            while($row = mysqli_fetch_array($hasil))
            {
                $id=$row['id'];
                $worship_name=$row['name'];
                $id_type=$row['id_type'];
                $worship_type=$row['name_type'];
                $worship_gallery=$row['gallery_worship_place'];
                $status=$row['status'];
                $longitude=$row['lng'];
                $latitude=$row['lat'];
                $dataarray[]=array(
                    'id'=>$id,
                    'name'=>$worship_name,
                    'id_type'=>$id_type,
                    'worship_type'=>$worship_type,
                    'worship_gallery'=>$worship_gallery,
                    'status'=>$status,
                    'longitude'=>$longitude,
                    'latitude'=>$latitude
              );
            }
        } else if($type=='Great Mosque'){
          $querysearch = "SELECT distinct worship_place.id, worship_place.name, detail_worship_type.id_type, detail_worship_type.status,worship_place_type.name as name_type, worship_place_gallery.gallery_worship_place, st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat
          from worship_place_type join detail_worship_type on worship_place_type.id_type=detail_worship_type.id_type
          join worship_place on detail_worship_type.id=worship_place.id
          join worship_place_gallery on worship_place.id=worship_place_gallery.id, city
          where city.id='$city' AND st_contains(city.geom, worship_place.geom) and worship_place_type.name ='Great Mosque' group by worship_place.name order by status ASC";

            $hasil=mysqli_query($conn, $querysearch);
            while($row = mysqli_fetch_array($hasil))
              {
              $id=$row['id'];
              $worship_name=$row['name'];
              $id_type=$row['id_type'];
              $worship_type=$row['name_type'];
              $worship_gallery=$row['gallery_worship_place'];
              $status=$row['status'];
              $longitude=$row['lng'];
              $latitude=$row['lat'];
              $dataarray[]=array(
                  'id'=>$id,
                  'name'=>$worship_name,
                  'id_type'=>$id_type,
                  'worship_type'=>$worship_type,
                  'worship_gallery'=>$worship_gallery,
                  'status'=>$status,
                  'longitude'=>$longitude,
                  'latitude'=>$latitude
                    );
              }
        }
        echo json_encode ($dataarray);
?>