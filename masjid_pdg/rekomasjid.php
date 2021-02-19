<?php
  session_start();
  include('connect.php');

  $city = $_SESSION['id'];
  $opsi     = $_GET['opsi'];
  $dataarray  = [];
    
        if ($opsi=='culinary_place') {
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
          // from worship_place,detail_worship_place, angkot, detail_culinary_place, culinary_place, city where 
          // worship_place.id = detail_worship_place.id_worship_place and
          // detail_worship_place.id_angkot = angkot.id and
          // angkot.id = detail_culinary_place.id_angkot and
          // detail_culinary_place.id_culinary_place = culinary_place.id 
          // and city.id='$city' AND st_contains(city.geom, worship_place.geom) and st_contains(city.geom, culinary_place.geom) order by jarak ASC limit 40";
          $querysearch= "Select distinct worship_place.id as idmes, round((
            6371 * acos  (
                cos ( radians(st_y(st_centroid(culinary_place.geom))) )
                * cos( radians( ST_Y(ST_CENTROID(worship_place.geom)) ) ) * cos( radians( ST_X(ST_CENTROID(worship_place.geom)) ) - radians(st_x(st_centroid(culinary_place.geom))) ) + sin ( radians(st_y(st_centroid(culinary_place.geom))) )
                * sin( radians( ST_Y(ST_CENTROID(worship_place.geom)) ) )
            ))*1000,2) AS jarak, 
            culinary_place.id as idcul, worship_place.name as worship_place_name, culinary_place.name as culinary_place_name, 
                  st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat
                  from worship_place,detail_worship_place, angkot, detail_culinary_place, culinary_place, city where 
                  worship_place.id = detail_worship_place.id_worship_place and
                  detail_worship_place.id_angkot = angkot.id and
                  angkot.id = detail_culinary_place.id_angkot and
                  detail_culinary_place.id_culinary_place = culinary_place.id 
                  and city.id='$city' AND st_contains(city.geom, worship_place.geom) and st_contains(city.geom, culinary_place.geom) order by jarak ASC limit 20"; 
                      
          $hasil=mysqli_query($conn, $querysearch);
          while($row = mysqli_fetch_assoc($hasil))
            {
              $idmes=$row['idmes'];
              $idres=$row['idcul'];
              $worship_name=$row['worship_place_name'];
              $rest_name=$row['culinary_place_name'];
              $jarak=$row['jarak'];
              $longitude=$row['lng'];
              $latitude=$row['lat'];
              // $longitude1=$row['lng1'];
              // $latitude1=$row['lat1'];
              $dataarray[]=array(
                  'idmes'=>$idmes,
                  'idres'=>$idres,
                  'worship_place_name'=>$worship_name,
                  'restaurant_name'=>$rest_name,
                  'jarak'=>$jarak,
                  // 'longitude1'=>$longitude1,
                  // 'latitude1'=>$latitude1,
                  'longitude'=>$longitude,
                  'latitude'=>$latitude
                  
              );
            }
        } else if($opsi=='tourism'){
          // $querysearch = "Select distinct worship_place.id as idmes, tourism.id as idtour, worship_place.name as worship_place_name, tourism.name as tourism_name,
          // st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat, st_x(st_centroid(tourism.geom)) as lng1, st_y(st_centroid(tourism.geom)) as lat1,
          // round(st_distance_sphere(
          //   ST_GeomFromText(concat
          //     ('POINT(
          //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
          //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
          //   ST_GeomFromText(concat
          //     ('POINT(
          //             ',ST_Y(ST_CENTROID(tourism.geom)),' 
          //             ',ST_X(ST_Centroid(tourism.geom)),')'), 4326)),2) as jarak 
          //   from worship_place, detail_worship_place, angkot, detail_tourism, tourism, city where
          //   detail_worship_place.id_worship_place=worship_place.id and
          //   angkot.id=detail_worship_place.id_angkot and
          //   detail_tourism.id_angkot=angkot.id and
          //   detail_tourism.id_tourism=tourism.id 
          //   and city.id='$city' AND st_contains(city.geom, worship_place.geom) and st_contains(city.geom, tourism.geom) order by jarak ASC limit 35";                  
          $querysearch = "Select distinct worship_place.id as idmes, round((
            6371 * acos  (
                cos ( radians(st_y(st_centroid(tourism.geom))) )
                * cos( radians( ST_Y(ST_CENTROID(worship_place.geom)) ) ) * cos( radians( ST_X(ST_CENTROID(worship_place.geom)) ) - radians(st_x(st_centroid(tourism.geom))) ) + sin ( radians(st_y(st_centroid(tourism.geom))) )
                * sin( radians( ST_Y(ST_CENTROID(worship_place.geom)) ) )
            ))*1000,2) AS jarak, 
            tourism.id as idtour, worship_place.name as worship_place_name, tourism.name as tourism_name,
                  st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat
                  from worship_place, detail_worship_place, angkot, detail_tourism, tourism, city where
                    detail_worship_place.id_worship_place=worship_place.id and
                    angkot.id=detail_worship_place.id_angkot and
                    detail_tourism.id_angkot=angkot.id and
                    detail_tourism.id_tourism=tourism.id 
                    and city.id='$city' AND st_contains(city.geom, worship_place.geom) and st_contains(city.geom, tourism.geom) order by jarak ASC limit 20";
            $hasil=mysqli_query($conn, $querysearch);
            while($row = mysqli_fetch_assoc($hasil))
              {
                $idmes=$row['idmes'];
                $idtour=$row['idtour'];
                $worship_name=$row['worship_place_name'];
                $tourism_name=$row['tourism_name'];
                $jarak=$row['jarak'];
                $longitude=$row['lng'];
                $latitude=$row['lat'];
                // $longitude1=$row['lng1'];
                // $latitude1=$row['lat1'];
                $dataarray[]=array(
                    'idmes'=>$idmes,
                    'idres'=>$idtour,
                    'worship_place_name'=>$worship_name,
                    'restaurant_name'=>$tourism_name,
                    'jarak'=>$jarak,
                    // 'longitude1'=>$longitude1,
                    // 'latitude1'=>$latitude1,
                    'longitude'=>$longitude,
                    'latitude'=>$latitude
                    
                );
              }
        } else if($opsi=='souvenir'){
          // $querysearch = "Select distinct worship_place.id as idmes, souvenir.id as idso, worship_place.name as worship_place_name, souvenir.name as souvenir_name, 
          // st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat, st_x(st_centroid(souvenir.geom)) as lng1, st_y(st_centroid(souvenir.geom)) as lat1,
          // round(st_distance_sphere(
          //   ST_GeomFromText(concat
          //     ('POINT(
          //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
          //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
          //   ST_GeomFromText(concat
          //     ('POINT(
          //             ',ST_Y(ST_CENTROID(souvenir.geom)),' 
          //             ',ST_X(ST_Centroid(souvenir.geom)),')'), 4326)),2) as jarak 
          //   from worship_place, detail_worship_place, angkot, detail_souvenir, souvenir, city where
          //   detail_worship_place.id_worship_place=worship_place.id and
          //   angkot.id=detail_worship_place.id_angkot and
          //   detail_souvenir.id_angkot=angkot.id and
          //   detail_souvenir.id_souvenir=souvenir.id 
          //   and city.id='$city' AND st_contains(city.geom, worship_place.geom) and st_contains(city.geom, souvenir.geom) order by jarak ASC limit 30"; 
          $querysearch = "Select distinct worship_place.id as idmes, round((
            6371 * acos  (
                cos ( radians(st_y(st_centroid(souvenir.geom))) )
                * cos( radians( ST_Y(ST_CENTROID(worship_place.geom)) ) ) * cos( radians( ST_X(ST_CENTROID(worship_place.geom)) ) - radians(st_x(st_centroid(souvenir.geom))) ) + sin ( radians(st_y(st_centroid(souvenir.geom))) )
                * sin( radians( ST_Y(ST_CENTROID(worship_place.geom)) ) )
            ))*1000,2) AS jarak, 
            souvenir.id as idso, worship_place.name as worship_place_name, souvenir.name as souvenir_name, 
                  st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat
                  from worship_place, detail_worship_place, angkot, detail_souvenir, souvenir, city where
                    detail_worship_place.id_worship_place=worship_place.id and
                    angkot.id=detail_worship_place.id_angkot and
                    detail_souvenir.id_angkot=angkot.id and
                    detail_souvenir.id_souvenir=souvenir.id 
                    and city.id='$city' AND st_contains(city.geom, worship_place.geom) and st_contains(city.geom, souvenir.geom) order by jarak ASC limit 20";
            $hasil=mysqli_query($conn, $querysearch);
            while($row = mysqli_fetch_assoc($hasil))
            {
              $idmes=$row['idmes'];
              $idso=$row['idso'];
              $worship_name=$row['worship_place_name'];
              $souvenir_name=$row['souvenir_name'];
              $jarak=$row['jarak'];
              $longitude=$row['lng'];
              $latitude=$row['lat'];
              // $longitude1=$row['lng1'];
              // $latitude1=$row['lat1'];
              $dataarray[]=array(
                    'idmes'=>$idmes,
                    'idres'=>$idso,
                    'worship_place_name'=>$worship_name,
                    'restaurant_name'=>$souvenir_name,
                    'jarak'=>$jarak,
                    // 'longitude1'=>$longitude1,
                    // 'latitude1'=>$latitude1,
                    'longitude'=>$longitude,
                    'latitude'=>$latitude
              );
            }
        } else if($opsi=='hotel'){
          // $querysearch = "Select distinct worship_place.id as idmes, hotel.id as idhot, worship_place.name as worship_place_name, hotel.name as hotel_name, 
          // st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat, st_x(st_centroid(hotel.geom)) as lng1, st_y(st_centroid(hotel.geom)) as lat1,
          // round(st_distance_sphere(
          //   ST_GeomFromText(concat
          //     ('POINT(
          //       ',ST_Y(ST_CENTROID(worship_place.geom)),' 
          //       ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
          //   ST_GeomFromText(concat
          //     ('POINT(
          //       ',ST_Y(ST_CENTROID(hotel.geom)),' 
          //       ',ST_X(ST_Centroid(hotel.geom)),')'), 4326)),2) as jarak 
          //   from worship_place, detail_worship_place, angkot, detail_hotel, hotel, city where
          //   detail_worship_place.id_worship_place=worship_place.id and
          //   angkot.id=detail_worship_place.id_angkot and
          //   detail_hotel.id_angkot=angkot.id and
          //   detail_hotel.id_hotel=hotel.id 
          //   and city.id='$city' AND st_contains(city.geom, worship_place.geom) and st_contains(city.geom, hotel.geom) order by jarak ASC limit 30";
          $querysearch = "Select distinct worship_place.id as idmes, round((
            6371 * acos  (
                cos ( radians(st_y(st_centroid(hotel.geom))) )
                * cos( radians( ST_Y(ST_CENTROID(worship_place.geom)) ) ) * cos( radians( ST_X(ST_CENTROID(worship_place.geom)) ) - radians(st_x(st_centroid(hotel.geom))) ) + sin ( radians(st_y(st_centroid(hotel.geom))) )
                * sin( radians( ST_Y(ST_CENTROID(worship_place.geom)) ) )
            ))*1000,2) AS jarak, 
            hotel.id as idhot, worship_place.name as worship_place_name, hotel.name as hotel_name, 
                  st_x(st_centroid(worship_place.geom)) as lng, st_y(st_centroid(worship_place.geom)) as lat
                  from worship_place, detail_worship_place, angkot, detail_hotel, hotel, city where
                    detail_worship_place.id_worship_place=worship_place.id and
                    angkot.id=detail_worship_place.id_angkot and
                    detail_hotel.id_angkot=angkot.id and
                    detail_hotel.id_hotel=hotel.id 
                    and city.id='$city' AND st_contains(city.geom, worship_place.geom) and st_contains(city.geom, hotel.geom) order by jarak ASC limit 20";
            $hasil=mysqli_query($conn, $querysearch);
            while($row = mysqli_fetch_assoc($hasil))
              {
                $idmes=$row['idmes'];
                $idhot=$row['idhot'];
                $worship_name=$row['worship_place_name'];
                $hotel_name=$row['hotel_name'];
                $jarak=$row['jarak'];
                $longitude=$row['lng'];
                $latitude=$row['lat'];
                // $longitude1=$row['lng1'];
                // $latitude1=$row['lat1'];
                $dataarray[]=array(
                    'idmes'=>$idmes,
                    'idres'=>$idhot,
                    'worship_place_name'=>$worship_name,
                    'restaurant_name'=>$hotel_name,
                    'jarak'=>$jarak,
                    // 'longitude1'=>$longitude1,
                    // 'latitude1'=>$latitude1,
                    'longitude'=>$longitude,
                    'latitude'=>$latitude
                    );
              }
          }
        echo json_encode ($dataarray);
?>