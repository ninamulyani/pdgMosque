<?php
    include('connect.php');
    $latit=$_GET["lat"];
    $longi=$_GET["lng"];
    $rad=$_GET['rad']/100;

    $querysearch = "SELECT id,name,ST_Y(ST_CENTROID(geom)) as lat,
    ST_X(ST_CENTROID(geom)) as lng FROM worship_place WHERE
    st_intersects(st_centroid(worship_place.geom),
    ST_buffer(ST_GeomFromText(concat('POINT($longi $latit)')),
    0.0009*$rad))=1";

    $hasil=mysqli_query($conn,$querysearch);
    while($row = mysqli_fetch_array($hasil))
      {
          $id=$row['id'];
          $name=$row['name'];
          $longitude=$row['lng'];
          $latitude=$row['lat'];
          $dataarray[]=array('id'=>$id,'name'=>$name,'longitude'=>$longitude,'latitude'=>$latitude);
      }
    echo json_encode ($dataarray);


    // $latit  =$_GET["lat"];
    // $longi  =$_GET["lng"];
    // $rad    =$_GET["rad"];

    // $lt     = array();
    // $lati   = array();
    // $long   = array();
    // $ln     = array();

    // $id     = array();
    // $name    = array();

    // $querysearch="SELECT id, name, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat FROM worship_place";
    // $hasil=mysqli_query($conn, $querysearch);
    // while($row = mysqli_fetch_array($hasil))
    //   {
    //     $id[]   = $row['id'];
    //     $name[] = $row['name'];
    //     $lt[]   = $row['lat'];
    //     $ln[]   = $row['lng'];
    //   }

    // $i=0;
    // foreach($lt as $lats)
    //   {
    //     $longs = $ln[$i];
    //     $q = "SELECT st_distance_sphere(ST_GeomFromText('POINT($latit $longi)', 4326), ST_GeomFromText('POINT($lats $longs)', 4326)) as jarak FROM worship_place";
    //     $hasil=mysqli_query($conn, $q);
    //     $data = mysqli_fetch_assoc($hasil);
    //     $jarak[] = $data['jarak'];
    //     $i++;
    //   }

    // $i=0;
    // foreach($ln as $longs)
    // {
    //     $id1     = $id[$i];
    //     $name1   = $name[$i];
    //     $jarak1  = $jarak[$i];
    //     $lat1    = $lt[$i];
    //     $lng1    = $ln[$i];
    //     if($jarak1 <= $rad){
    //         $dataarray[]=array('id'=>$id1,'name'=>$name1,'longitude'=>$lng1,'latitude'=>$lat1);
    //     }
    //     $i++;
    // }
    // echo json_encode ($dataarray);
?>
