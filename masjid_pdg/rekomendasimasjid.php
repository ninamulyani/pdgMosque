<?php
	include('Connect.php');
	// $latit=$_GET["lat"];
	// $longi=$_GET["lng"];
	// $rad=$_GET["rad"];

	// $querysearch="SELECT ow_id, ow_nama,ow_tiket, st_x(st_centroid(the_geom)) as lon,st_y(st_centroid(the_geom)) as lat,
	// 	st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), objek_wisata.the_geom) as jarak
	// 	FROM objek_wisata where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1),
	// 	objek_wisata.the_geom) <= ".$rad."
    //             ";

    //query versi 1
    $querysearch="Select distinct worship_place.name as worship_place_name, restaurant.name as restaurant_name, tourism.name as tourism_name, souvenir.name as souvenir_name, hotel.name as hotel_name from worship_place, ";

        if(check_r=1 and check_t=0 and check_s=0 and check_h=0){   
            $querysearch .="detail_worship_place, angkot,
            detail_restaurant, restaurant where 
            worship_place.id = detail_worship_place.id_worship_place and
            detail_worship_place.id_angkot = angkot.id and
            angkot.id = detail_restaurant.id_angkot and
            detail_restaurant.id_restaurant = restaurant.id";
        } elseif(check_r=0 and check_t=1 and check_s=0 and check_h=0){ 
            $querysearch .="detail_worship_place, angkot, detail_tourism, tourism where
            detail_worship_place.id_worship_place=worship_place.id and
            angkot.id=detail_worship_place.id_angkot and
            detail_tourism.id_angkot=angkot.id and
            detail_tourism.id_tourism=tourism.id";
        } elseif(check_r=0 and check_t=0 and check_s=1 and check_h=0){
            $querysearch .="detail_worship_place, angkot, detail_souvenir, souvenir where
            detail_worship_place.id_worship_place=worship_place.id and
            angkot.id=detail_worship_place.id_angkot and
            detail_souvenir.id_angkot=angkot.id and
            detail_souvenir.id_souvenir=souvenir.id";
        } elseif(check_r=0 and check_t=0 and check_s=0 and check_h=1){
            $querysearch .="detail_worship_place, angkot, detail_hotel, hotel where
            detail_worship_place.id_worship_place=worship_place.id and
            angkot.id=detail_worship_place.id_angkot and
            detail_hotel.id_angkot=angkot.id and
            detail_hotel.id_hotel=hotel.id";
        } elseif(check_r=1 and check_t=1 and check_s=0 and check_h=0){
            $querysearch .="detail_worship_place, angkot, detail_restaurant, restaurant, detail_tourism, tourism where
            worship_place.id = detail_worship_place.id_worship_place and
            detail_worship_place.id_angkot = angkot.id and
            angkot.id = detail_restaurant.id_angkot = detail_tourism.id_angkot and
            detail_restaurant.id_restaurant = restaurant.id and
            detail_tourism.id_tourism=tourism.id";
        } elseif(check_r=1 and check_t=0 and check_s=1 and check_h=0){
            $querysearch .="detail_worship_place, angkot, detail_restaurant, restaurant, detail_souvenir, souvenir where
            worship_place.id = detail_worship_place.id_worship_place and
            detail_worship_place.id_angkot = angkot.id and
            angkot.id = detail_restaurant.id_angkot = detail_souvenir.id_angkot and
            detail_restaurant.id_restaurant = restaurant.id and
            detail_souvenir.id_souvenir=souvenir.id";
        } elseif(check_r=1 and check_t=0 and check_s=0 and check_h=1){
            $querysearch .="detail_worship_place, angkot, detail_restaurant, restaurant, detail_hotel, hotel where
            worship_place.id = detail_worship_place.id_worship_place and
            detail_worship_place.id_angkot = angkot.id and
            angkot.id = detail_restaurant.id_angkot = detail_hotel.id_angkot and
            detail_restaurant.id_restaurant = restaurant.id and
            detail_hotel.id_hotel=hotel.id";
        } elseif(check_r=0 and check_t=1 and check_s=1 and check_h=0){
            $querysearch .="detail_worship_place, angkot, detail_tourism, tourism, detail_souvenir, souvenir where
            worship_place.id = detail_worship_place.id_worship_place and
            detail_worship_place.id_angkot = angkot.id and
            angkot.id = detail_tourism.id_angkot = detail_souvenir.id_angkot and
            detail_tourism.id_tourism = tourism.id and
            detail_souvenir.id_souvenir=souvenir.id";
        } elseif(check_r=0 and check_t=1 and check_s=0 and check_h=1){
            $querysearch .="detail_worship_place, angkot, detail_tourism, tourism, detail_hotel, hotel where
            worship_place.id = detail_worship_place.id_worship_place and
            detail_worship_place.id_angkot = angkot.id and
            angkot.id = detail_tourism.id_angkot = detail_hotel.id_angkot and
            detail_tourism.id_tourism = tourism.id and
            detail_hotel.id_hotel=hotel.id";
        } elseif(check_r=0 and check_t=0 and check_s=1 and check_h=1){
            $querysearch .="detail_worship_place, angkot, detail_souvenir, souvenir, detail_hotel, hotel where
            worship_place.id = detail_worship_place.id_worship_place and
            detail_worship_place.id_angkot = angkot.id and
            angkot.id = detail_souvenir.id_angkot = detail_hotel.id_angkot and
            detail_souvenir.id_souvenir = souvenir.id and
            detail_hotel.id_hotel=hotel.id";
        } elseif(check_r=1 and check_t=1 and check_s=1 and check_h=0){
            $querysearch .="detail_worship_place, angkot, detail_restaurant, restaurant, detail_tourism, tourism, detail_souvenir, souvenir where
            worship_place.id = detail_worship_place.id_worship_place and
            detail_worship_place.id_angkot = angkot.id and
            angkot.id = detail_restaurant.id_angkot = detail_tourism.id_angkot = detail_souvenir.id_angkot and
            detail_restaurant.id_restaurant = restaurant.id and
            detail_tourism.id_tourism=tourism.id and
            detail_souvenir.id_souvenir=souvenir.id";
        } elseif (check_r=1 and check_t=1 and check_s=0 and check_h=1) {
            $querysearch .="detail_worship_place, angkot, detail_restaurant, restaurant, detail_tourism, tourism, detail_hotel, hotel where
            worship_place.id = detail_worship_place.id_worship_place and
            detail_worship_place.id_angkot = angkot.id and
            angkot.id = detail_restaurant.id_angkot = detail_tourism.id_angkot = detail_hotel.id_angkot and
            detail_restaurant.id_restaurant = restaurant.id and
            detail_tourism.id_tourism=tourism.id and
            detail_hotel.id_hotel=hotel.id";
        } elseif (check_r=1 and check_t=0 and check_s=1 and check_h=1) {
            $querysearch .="detail_worship_place, angkot, detail_restaurant, restaurant, detail_souvenir, souvenir, detail_hotel, hotel where
            worship_place.id = detail_worship_place.id_worship_place and
            detail_worship_place.id_angkot = angkot.id and
            angkot.id = detail_restaurant.id_angkot = detail_souvenir.id_angkot = detail_hotel.id_angkot and
            detail_restaurant.id_restaurant = restaurant.id and
            detail_souvenir.id_souvenir=souvenir.id and
            detail_hotel.id_hotel=hotel.id";
        } elseif (check_r=0 and check_t=1 and check_s=1 and check_h=1) {
            $querysearch .="detail_worship_place, angkot, detail_tourism, tourism, detail_souvenir, souvenir, detail_hotel, hotel where
            worship_place.id = detail_worship_place.id_worship_place and
            detail_worship_place.id_angkot = angkot.id and
            angkot.id = detail_tourism.id_angkot = detail_souvenir.id_angkot = detail_hotel.id_angkot and
            detail_tourism.id_tourism = tourism.id and
            detail_souvenir.id_souvenir=souvenir.id and
            detail_hotel.id_hotel=hotel.id";          
        } elseif (check_r=1 and check_t=1 and check_s=1 and check_h=1){
            $querysearch .="detail_worship_place, angkot, detail_restaurant, restaurant, detail_tourism, tourism, detail_souvenir, souvenir, detail_hotel, hotel where
            worship_place.id = detail_worship_place.id_worship_place and
            detail_worship_place.id_angkot = angkot.id and
            angkot.id = detail_restaurant.id_angkot = detail_tourism.id_angkot = detail_souvenir.id_angkot = detail_hotel.id_angkot and
            detail_restaurant.id_restaurant = restaurant.id and
            detail_tourism.id_tourism=tourism.id and
            detail_souvenir.id_souvenir=souvenir.id and
            detail_hotel.id_hotel=hotel.id";
        } endif;

    $dataarray = [];
	$hasil=mysqli_query($conn, $querysearch);
	while($row = mysqli_fetch_array($hasil))
		{
            $worship_name=$row['worship_place_name'];
			$rest_name=$row['restaurant_name'];
			$tourism_name=$row['tourism_name'];
			$souvenir_name=$row['souvenir_name'];
			$hotel_name=$row['hotel_name'];
			$dataarray[]=array(
                'worship_place_name'=>$worship_name,
                'restaurant_name'=>$rest_name,
                'tourism_name'=>$tourism_name,
                'souvenir_name'=>$souvenir_name,
                'hotel_name'=>$hotel_name
			    //'longitude'=>$longitude,'latitude'=>$latitude);
		}
    echo json_encode ($dataarray);
    
    //query versi 2
    //Tampil masjid - restoran
    // if (check_r=1 and check_t=0 and check_s=0 and check_h=0){
    //     $querysearch= "Select distinct worship_place.name as worship_place_name, restaurant.name as restaurant_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(restaurant.geom)),' 
    //             ',ST_X(ST_Centroid(restaurant.geom)),')'), 4326)) as jarak 
    //     from worship_place,detail_worship_place, angkot, detail_restaurant, restaurant where 
    //         worship_place.id = detail_worship_place.id_worship_place and
    //         detail_worship_place.id_angkot = angkot.id and
    //         angkot.id = detail_restaurant.id_angkot and
    //         detail_restaurant.id_restaurant = restaurant.id order by jarak ASC";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $rest_name=$row['restaurant_name'];
    //         $jarak=$row['jarak'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'restaurant_name'=>$rest_name,
    //             'jarak'=>$jarak
    //             );
		//       }
    //     echo json_encode ($dataarray);

    // //Tampil masjid - tourism
    // } elseif(check_r=0 and check_t=1 and check_s=0 and check_h=0){ 
    //     $querysearch = "Select distinct worship_place.name as worship_place_name, tourism.name as tourism_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(tourism.geom)),' 
    //             ',ST_X(ST_Centroid(tourism.geom)),')'), 4326)) as jarak 
    //     from worship_place, detail_worship_place, angkot, detail_tourism, tourism where
    //     detail_worship_place.id_worship_place=worship_place.id and
    //     angkot.id=detail_worship_place.id_angkot and
    //     detail_tourism.id_angkot=angkot.id and
    //     detail_tourism.id_tourism=tourism.id order by jarak ASC";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $tourism_name=$row['tourism_name'];
    //         $jarak=$row['jarak'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'tourism_name'=>$tourism_name,
    //             'jarak'=>$jarak
    //             );
		//       }
    //     echo json_encode ($dataarray);

    // //Tampil masjid - suvenir
    // } elseif(check_r=0 and check_t=0 and check_s=1 and check_h=0){
    //     $querysearch = "Select distinct worship_place.name as worship_place_name, souvenir.name as souvenir_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(souvenir.geom)),' 
    //             ',ST_X(ST_Centroid(souvenir.geom)),')'), 4326)) as jarak 
    //     from worship_place, detail_worship_place, angkot, detail_souvenir, souvenir where
    //     detail_worship_place.id_worship_place=worship_place.id and
    //     angkot.id=detail_worship_place.id_angkot and
    //     detail_souvenir.id_angkot=angkot.id and
    //     detail_souvenir.id_souvenir=souvenir.id order by jarak ASC";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $souvenir_name=$row['souvenir_name'];
    //         $jarak=$row['jarak'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'souvenir_name'=>$souvenir_name,
    //             'jarak'=>$jarak
    //             );
		//       }
    //     echo json_encode ($dataarray);

    // //Tampil masjid - hotel
    // } elseif(check_r=0 and check_t=0 and check_s=0 and check_h=1){
    //     $querysearch = "Select distinct worship_place.name as worship_place_name, hotel.name as hotel_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(hotel.geom)),' 
    //             ',ST_X(ST_Centroid(hotel.geom)),')'), 4326)) as jarak 
    //     from worship_place, detail_worship_place, angkot, detail_hotel, hotel where
    //     detail_worship_place.id_worship_place=worship_place.id and
    //     angkot.id=detail_worship_place.id_angkot and
    //     detail_hotel.id_angkot=angkot.id and
    //     detail_hotel.id_hotel=hotel.id order by jarak ASC";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $hotel_name=$row['hotel_name'];
    //         $jarak=$row['jarak'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'hotel_name'=>$hotel_name,
    //             'jarak'=>$jarak
    //             );
		//       }
    //     echo json_encode ($dataarray);

      //Tampil masjid - restoran - tourism
    // } elseif(check_r=1 and check_t=1 and check_s=0 and check_h=0){
    //     $querysearch = "Select distinct worship_place.name as worship_place_name, restaurant.name as restaurant_name, tourism.name as tourism_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(restaurant.geom)),' 
    //             ',ST_X(ST_Centroid(restaurant.geom)),')'), 4326)) as jarak1, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(tourism.geom)),' 
    //             ',ST_X(ST_Centroid(tourism.geom)),')'), 4326)) as jarak2
    //     from worship_place, detail_worship_place, angkot, detail_restaurant, restaurant, detail_tourism, tourism where
    //     worship_place.id = detail_worship_place.id_worship_place and
    //     detail_worship_place.id_angkot = angkot.id and
    //     angkot.id = detail_restaurant.id_angkot = detail_tourism.id_angkot and
    //     detail_restaurant.id_restaurant = restaurant.id and
    //     detail_tourism.id_tourism=tourism.id";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $rest_name=$row['restaurant_name'];
    //         $tourism_name=$row['tourism_name'];
    //         $jarak1=$row['jarak1'];
    //         $jarak2=$row['jarak2'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'restaurant_name'=>$rest_name,
    //             'tourism_name'=>$tourism_name,
    //             'jarak1'=>$jarak1,
    //             'jarak2'=>$jarak2
    //             );
		//       }
    //     echo json_encode ($dataarray);

    // //Tampil masjid - resto - suvenir
    // } elseif(check_r=1 and check_t=0 and check_s=1 and check_h=0){
    //     $querysearch = "Select distinct worship_place.name as worship_place_name, restaurant.name as restaurant_name, souvenir.name as souvenir_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(restaurant.geom)),' 
    //             ',ST_X(ST_Centroid(restaurant.geom)),')'), 4326)) as jarak1, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(souvenir.geom)),' 
    //             ',ST_X(ST_Centroid(souvenir.geom)),')'), 4326)) as jarak2
    //     from worship_place, detail_worship_place, angkot, detail_restaurant, restaurant, detail_souvenir, souvenir where
    //     worship_place.id = detail_worship_place.id_worship_place and
    //     detail_worship_place.id_angkot = angkot.id and
    //     angkot.id = detail_restaurant.id_angkot = detail_souvenir.id_angkot and
    //     detail_restaurant.id_restaurant = restaurant.id and
    //     detail_souvenir.id_souvenir=souvenir.id";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $rest_name=$row['restaurant_name'];
    //         $souvenir_name=$row['souvenir_name'];
    //         $jarak1=$row['jarak1'];
    //         $jarak2=$row['jarak2'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'restaurant_name'=>$rest_name,
    //             'souvenir_name'=>$souvenir_name,
    //             'jarak1'=>$jarak1,
    //             'jarak2'=>$jarak2
    //             );
		//       }
    //     echo json_encode ($dataarray);
        
    // //Tampil masjid - resto - hotel
    // } elseif (check_r=1 and check_t=0 and check_s=0 and check_h=1){
    //     $querysearch = "Select distinct worship_place.name as worship_place_name, restaurant.name as restaurant_name, hotel.name as hotel_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(restaurant.geom)),' 
    //             ',ST_X(ST_Centroid(restaurant.geom)),')'), 4326)) as jarak1, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(hotel.geom)),' 
    //             ',ST_X(ST_Centroid(hotel.geom)),')'), 4326)) as jarak2
    //     from worship_place, detail_worship_place, angkot, detail_restaurant, restaurant, detail_hotel, hotel where
    //     worship_place.id = detail_worship_place.id_worship_place and
    //     detail_worship_place.id_angkot = angkot.id and
    //     angkot.id = detail_restaurant.id_angkot = detail_hotel.id_angkot and
    //     detail_restaurant.id_restaurant = restaurant.id and
    //     detail_hotel.id_hotel=hotel.id";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $rest_name=$row['restaurant_name'];
    //         $hotel_name=$row['hotel_name'];
    //         $jarak1=$row['jarak1'];
    //         $jarak2=$row['jarak2'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'restaurant_name'=>$rest_name,
    //             'hotel_name'=>$hotel_name, 
    //             'jarak1'=>$jarak1,
    //             'jarak2'=>$jarak2
    //             );
		//       }
    //     echo json_encode ($dataarray);
    
    // //Tampil masjid - tourism - suvenir
    // } elseif (check_r=0 and check_t=1 and check_s=1 and check_h=0) {
    //     $querysearch = "Select distinct worship_place.name as worship_place_name, tourism.name as tourism_name, souvenir.name as souvenir_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(tourism.geom)),' 
    //             ',ST_X(ST_Centroid(tourism.geom)),')'), 4326)) as jarak1, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(souvenir.geom)),' 
    //             ',ST_X(ST_Centroid(souvenir.geom)),')'), 4326)) as jarak2
    //     from worship_place, detail_worship_place, angkot, detail_tourism, tourism, detail_souvenir, souvenir where
    //     worship_place.id = detail_worship_place.id_worship_place and
    //     detail_worship_place.id_angkot = angkot.id and
    //     angkot.id = detail_tourism.id_angkot = detail_souvenir.id_angkot and
    //     detail_tourism.id_tourism = tourism.id and
    //     detail_souvenir.id_souvenir=souvenir.id";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $tourism_name=$row['tourism_name'];
    //         $souvenir_name=$row['souvenir_name'];
    //         $jarak1=$row['jarak1'];
    //         $jarak2=$row['jarak2'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'tourism_name'=>$tourism_name,
    //             'souvenir_name'=>$souvenir_name, 
    //             'jarak1'=>$jarak1,
    //             'jarak2'=>$jarak2
    //             );
		//       }
    //     echo json_encode ($dataarray);

    // //Tampil masjid - tourism - hotel
    // } elseif (check_r=0 and check_t=1 and check_s=0 and check_h=1){
    //     $querysearch = "Select distinct worship_place.name as worship_place_name, tourism.name as tourism_name, hotel.name as hotel_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(tourism.geom)),' 
    //             ',ST_X(ST_Centroid(tourism.geom)),')'), 4326)) as jarak1, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(hotel.geom)),' 
    //             ',ST_X(ST_Centroid(hotel.geom)),')'), 4326)) as jarak2
    //     from worship_place, detail_worship_place, angkot, detail_restaurant, restaurant, detail_hotel, hotel where
    //     worship_place.id = detail_worship_place.id_worship_place and
    //     detail_worship_place.id_angkot = angkot.id and
    //     angkot.id = detail_tourism.id_angkot = detail_hotel.id_angkot and
    //     detail_tourism.id_tourism = tourism.id and
    //     detail_hotel.id_hotel=hotel.id";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $tourism_name=$row['tourism_name'];
    //         $hotel_name=$row['hotel_name'];
    //         $jarak1=$row['jarak1'];
    //         $jarak2=$row['jarak2'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'tourism_name'=>$tourism_name,
    //             'hotel_name'=>$hotel_name,
    //             'jarak1'=>$jarak1,
    //             'jarak2'=>$jarak2
    //             );
		//       }
    //     echo json_encode ($dataarray);

    // //Tampil masjid - suvenir - hotel
    // } elseif (check_r=0 and check_t=0 and check_s=1 and check_h=1){
    //     $querysearch = "Select distinct worship_place.name as worship_place_name, souvenir.name as souvenir_name, hotel.name as hotel_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(souvenir.geom)),' 
    //             ',ST_X(ST_Centroid(souvenir.geom)),')'), 4326)) as jarak1, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(hotel.geom)),' 
    //             ',ST_X(ST_Centroid(hotel.geom)),')'), 4326)) as jarak2
    //     from worship_place, detail_worship_place, angkot, detail_souvenir, souvenir, detail_hotel, hotel where
    //     worship_place.id = detail_worship_place.id_worship_place and
    //     detail_worship_place.id_angkot = angkot.id and
    //     angkot.id = detail_souvenir.id_angkot = detail_hotel.id_angkot and
    //     detail_souvenir.id_souvenir = souvenir.id and
    //     detail_hotel.id_hotel=hotel.id";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $souvenir_name=$row['souvenir_name'];
    //         $hotel_name=$row['hotel_name'];
    //         $jarak1=$row['jarak1'];
    //         $jarak2=$row['jarak2'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'souvenir_name'=>$souvenir_name,
    //             'hotel_name'=>$hotel_name,
    //             'jarak1'=>$jarak1,
    //             'jarak2'=>$jarak2
    //             );
		//       }
    //     echo json_encode ($dataarray);

    // //Tampil masjid - resto - tourism - suvenir
    // } elseif (check_r=1 and check_t=1 and check_s=1 and check_h=0){
    //     $querysearch = "Select distinct worship_place.name as worship_place_name, restaurant.name as restaurant_name, tourism.name as tourism_name, souvenir.name as souvenir_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(restaurant.geom)),' 
    //             ',ST_X(ST_Centroid(restaurant.geom)),')'), 4326)) as jarak1, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(tourism.geom)),' 
    //             ',ST_X(ST_Centroid(tourism.geom)),')'), 4326)) as jarak2, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(souvenir.geom)),' 
    //             ',ST_X(ST_Centroid(souvenir.geom)),')'), 4326)) as jarak3
    //     from worship_place, detail_worship_place, angkot, detail_restaurant, restaurant, detail_tourism, tourism, detail_souvenir, souvenir where
    //     worship_place.id = detail_worship_place.id_worship_place and
    //     detail_worship_place.id_angkot = angkot.id and
    //     angkot.id = detail_restaurant.id_angkot = detail_tourism.id_angkot = detail_souvenir.id_angkot and
    //     detail_restaurant.id_restaurant = restaurant.id and
    //     detail_tourism.id_tourism=tourism.id and
    //     detail_souvenir.id_souvenir=souvenir.id";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $rest_name=$row['restaurant_name'];
    //         $tourism_name=$row['tourism_name'];
    //         $souvenir_name=$row['souvenir_name'];
    //         $jarak1=$row['jarak1'];
    //         $jarak2=$row['jarak2'];
    //         $jarak3=$row['jarak3'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'restaurant_name'=>$rest_name,
    //             'tourism_name'=>$tourism_name,
    //             'souvenir_name'=>$souvenir_name,
    //             'jarak1'=>$jarak1,
    //             'jarak2'=>$jarak2,
    //             'jarak3'=>$jarak3
    //             );
		//       }
    //     echo json_encode ($dataarray);

    // //Tampil masjid - resto - tourism - hotel
    // } elseif (check_r=1 and check_t=1 and check_s=0 and check_h=1) {
    //     $querysearch = "Select distinct worship_place.name as worship_place_name, restaurant.name as restaurant_name, tourism.name as tourism_name, hotel.name as hotel_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(restaurant.geom)),' 
    //             ',ST_X(ST_Centroid(restaurant.geom)),')'), 4326)) as jarak1, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(tourism.geom)),' 
    //             ',ST_X(ST_Centroid(tourism.geom)),')'), 4326)) as jarak2, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(hotel.geom)),' 
    //             ',ST_X(ST_Centroid(hotel.geom)),')'), 4326)) as jarak3
    //     from worship_place, detail_worship_place, angkot, detail_restaurant, restaurant, detail_tourism, tourism, detail_hotel, hotel where
    //     worship_place.id = detail_worship_place.id_worship_place and
    //     detail_worship_place.id_angkot = angkot.id and
    //     angkot.id = detail_restaurant.id_angkot = detail_tourism.id_angkot = detail_hotel.id_angkot and
    //     detail_restaurant.id_restaurant = restaurant.id and
    //     detail_tourism.id_tourism=tourism.id and
    //     detail_hotel.id_hotel=hotel.id";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $rest_name=$row['restaurant_name'];
    //         $tourism_name=$row['tourism_name'];
    //         $hotel_name=$row['hotel_name'];
    //         $jarak1=$row['jarak1'];
    //         $jarak2=$row['jarak2'];
    //         $jarak3=$row['jarak3'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'restaurant_name'=>$rest_name,
    //             'tourism_name'=>$tourism_name,
    //             'hotel_name'=>$hotel_name,
    //             'jarak1'=>$jarak1,
    //             'jarak2'=>$jarak2,
    //             'jarak3'=>$jarak3
    //             );
		//       }
    //     echo json_encode ($dataarray);
    
    // //Tampil masjid - resto - suvenir - hotel
    // } elseif (check_r=1 and check_t=0 and check_s=1 and check_h=1) {
    //     $querysearch = "Select distinct worship_place.name as worship_place_name, restaurant.name as restaurant_name, souvenir.name as souvenir_name, hotel.name as hotel_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(restaurant.geom)),' 
    //             ',ST_X(ST_Centroid(restaurant.geom)),')'), 4326)) as jarak1, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(souvenir.geom)),' 
    //             ',ST_X(ST_Centroid(souvenir.geom)),')'), 4326)) as jarak2, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(hotel.geom)),' 
    //             ',ST_X(ST_Centroid(hotel.geom)),')'), 4326)) as jarak3
    //     from worship_place, detail_worship_place, angkot, detail_restaurant, restaurant, detail_souvenir, souvenir, detail_hotel, hotel where
    //     worship_place.id = detail_worship_place.id_worship_place and
    //     detail_worship_place.id_angkot = angkot.id and
    //     angkot.id = detail_restaurant.id_angkot = detail_souvenir.id_angkot = detail_hotel.id_angkot and
    //     detail_restaurant.id_restaurant = restaurant.id and
    //     detail_souvenir.id_souvenir=souvenir.id and
    //     detail_hotel.id_hotel=hotel.id";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $rest_name=$row['restaurant_name'];
    //         $souvenir_name=$row['souvenir_name'];
    //         $hotel_name=$row['hotel_name'];
    //         $jarak1=$row['jarak1'];
    //         $jarak2=$row['jarak2'];
    //         $jarak3=$row['jarak3'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'restaurant_name'=>$rest_name,
    //             'souvenir_name'=>$souvenir_name,
    //             'hotel_name'=>$hotel_name,
    //             'jarak1'=>$jarak1,
    //             'jarak2'=>$jarak2,
    //             'jarak3'=>$jarak3
    //             );
		//       }
    //     echo json_encode ($dataarray);

    // //Tampil masjid - tourism - suvenir - hotel
    // } elseif (check_r=0 and check_t=1 and check_s=1 and check_h=1) {
    //     $querysearch = "Select distinct worship_place.name as worship_place_name, tourism.name as tourism_name, souvenir.name as souvenir_name, hotel.name as hotel_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(tourism.geom)),' 
    //             ',ST_X(ST_Centroid(tourism.geom)),')'), 4326)) as jarak1, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(souvenir.geom)),' 
    //             ',ST_X(ST_Centroid(souvenir.geom)),')'), 4326)) as jarak2, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(hotel.geom)),' 
    //             ',ST_X(ST_Centroid(hotel.geom)),')'), 4326)) as jarak3
    //     from worship_place, detail_worship_place, angkot, detail_tourism, tourism, detail_souvenir, souvenir, detail_hotel, hotel where
    //     worship_place.id = detail_worship_place.id_worship_place and
    //     detail_worship_place.id_angkot = angkot.id and
    //     angkot.id = detail_tourism.id_angkot = detail_souvenir.id_angkot = detail_hotel.id_angkot and
    //     detail_tourism.id_tourism = tourism.id and
    //     detail_souvenir.id_souvenir=souvenir.id and
    //     detail_hotel.id_hotel=hotel.id";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $tourism_name=$row['tourism_name'];
    //         $souvenir_name=$row['souvenir_name'];
    //         $hotel_name=$row['hotel_name'];
    //         $jarak1=$row['jarak1'];
    //         $jarak2=$row['jarak2'];
    //         $jarak3=$row['jarak3'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'tourism_name'=>$tourism_name,
    //             'souvenir_name'=>$souvenir_name,
    //             'hotel_name'=>$hotel_name,
    //             'jarak1'=>$jarak1,
    //             'jarak2'=>$jarak2,
    //             'jarak3'=>$jarak3
    //             );
		//       }
    //     echo json_encode ($dataarray);

    // //Tampil masjid dan semua objek 
    // } elseif (check_r=1 and check_t=1 and check_s=1 and check_h=1){
    //     $querysearch = "Select distinct worship_place.name as worship_place_name, restaurant.name as restaurant_name, tourism.name as tourism_name, souvenir.name as souvenir_name, hotel.name as hotel_name, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(restaurant.geom)),' 
    //             ',ST_X(ST_Centroid(restaurant.geom)),')'), 4326)) as jarak, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(tourism.geom)),' 
    //             ',ST_X(ST_Centroid(tourism.geom)),')'), 4326)) as jarak1, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(souvenir.geom)),' 
    //             ',ST_X(ST_Centroid(souvenir.geom)),')'), 4326)) as jarak2, st_distance_sphere(
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(worship_place.geom)),' 
    //             ',ST_X(ST_Centroid(worship_place.geom)),')'), 4326),
    //         ST_GeomFromText(concat
    //           ('POINT(
    //             ',ST_Y(ST_CENTROID(hotel.geom)),' 
    //             ',ST_X(ST_Centroid(hotel.geom)),')'), 4326)) as jarak3
    //     from worship_place, detail_worship_place, angkot, detail_restaurant, restaurant, detail_tourism, tourism, detail_souvenir, souvenir, detail_hotel, hotel where
    //     worship_place.id = detail_worship_place.id_worship_place and
    //     detail_worship_place.id_angkot = angkot.id and
    //     angkot.id = detail_restaurant.id_angkot = detail_tourism.id_angkot = detail_souvenir.id_angkot = detail_hotel.id_angkot and
    //     detail_restaurant.id_restaurant = restaurant.id and
    //     detail_tourism.id_tourism=tourism.id and
    //     detail_souvenir.id_souvenir=souvenir.id and
    //     detail_hotel.id_hotel=hotel.id";
    //     $dataarray = [];
    //     $hasil=mysqli_query($conn, $querysearch);
    //     while($row = mysqli_fetch_array($hasil))
    //       {
    //         $worship_name=$row['worship_place_name'];
    //         $rest_name=$row['restaurant_name'];
    //         $tourism_name=$row['tourism_name'];
    //         $souvenir_name=$row['souvenir_name'];
    //         $hotel_name=$row['hotel_name'];
    //         $jarak=$row['jarak'];
    //         $jarak1=$row['jarak1'];
    //         $jarak2=$row['jarak2'];
    //         $jarak3=$row['jarak3'];
    //         $dataarray[]=array(
    //             'worship_place_name'=>$worship_name,
    //             'restaurant_name'=>$rest_name,
    //             'tourism_name'=>$tourism_name,
    //             'souvenir_name'=>$souvenir_name,
    //             'hotel_name'=>$hotel_name,
    //             'jarak'=>$jarak,
    //             'jarak1'=>$jarak1,
    //             'jarak2'=>$jarak2,
    //             'jarak3'=>$jarak3
    //             );
		//       }
    //     echo json_encode ($dataarray);
    // } endif;
?>