<?php
require 'connect.php';
require 'getIP.php';

$cari = $_GET["cari"];
$dataarray = [];
$querysearch ="select worship_place.id, worship_place.name as name_mesjid, address, land_size, building_size, park_area_size, capacity, est, last_renovation, imam, jamaah, teenager, category_worship_place.name as name_category, image, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat 
	from worship_place 
		left join category_worship_place on category_worship_place.id=worship_place.id_category 
		where worship_place.id='$cari'";
$hasil=mysqli_query($conn, $querysearch);


while($row = mysqli_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name_mesjid=$row['name_mesjid'];
		  $address=$row['address'];
		  $land_size=$row['land_size'];
		  $building_size=$row['building_size'];
		  $park_area_size=$row['park_area_size'];
		  $capacity=$row['capacity'];
		  $est=$row['est'];
		  $last_renovation=$row['last_renovation'];
		  $imam=$row['imam'];
		  $jamaah=$row['jamaah'];
		  $teenager=$row['teenager'];
		  $name_category=$row['name_category'];
		  $image=$row['image'];
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		//   $getrating = "SELECT * FROM rating_wp where id_worship_place='$id'";
        //   $test = mysqli_query($conn,$getrating); 
		//   $rating = null;
		//   $nilai = null;
		  
		//   Rumus rating lama
        //   if(mysqli_num_rows($test) > 0){
        //       $queryRating = "select sum(nilai_rating) as total, count(nilai_rating) as jumlah from rating_wp where id_worship_place = '$id'";
        //       $pg_rating = mysqli_query($conn, $queryRating);
        //       $data_rating = mysqli_fetch_array($pg_rating);
        //       $rating = $data_rating['total'] / $data_rating['jumlah'];

		// 	  $nilai = null;
		// 	  $ip_user = getUserIpAddr();
        //       $myRating = "select nilai_rating from rating_wp where id_worship_place = '$id' and ip_user='$ip_user'";
        //       $pg_myrating = mysqli_query($conn, $myRating);
        //       $data_myrating = mysqli_fetch_array($pg_myrating);
        //       $nilai = $data_myrating['nilai_rating'];
		//   }
		  
		  $dataarray[]=array('id'=>$id,'name_mesjid'=>$name_mesjid,'address'=>$address, 'land_size'=>$land_size, 'building_size'=>$building_size, 'park_area_size'=>$park_area_size,'capacity'=>$capacity,'est'=>$est, 'last_renovation'=>$last_renovation, 'imam'=>$imam, 'jamaah'=>$jamaah, 'teenager'=>$teenager, 'name_category'=>$name_category, 'image'=>$image,'longitude'=>$longitude,'latitude'=>$latitude);

		  if ($image=='null' || $image=='' || $image==null){
			$image='foto/foto.jpg';
		  }
	}

	//DATA GALLERY
	$data_gallery=[]; 
	$query_gallery = "SELECT serial_number, gallery_worship_place FROM worship_place_gallery 
	where id = '".$cari."' ";  
	$hasil2 = mysqli_query($conn, $query_gallery);
	while($baris = mysqli_fetch_array($hasil2)){
		$serial_number = $baris['serial_number'];
		$gallery_worship = $baris['gallery_worship_place'];
		$data_gallery[] = array('serial_number'=>$serial_number,'gallery_worship_place'=>$gallery_worship);
	}

	//DATA FASILITAS
	$data_fasilitas=[];
    $query_fasilitas="SELECT facility.id, facility.name FROM facility 
		left join detail_facility on detail_facility.id_facility = facility.id 
		left join worship_place on worship_place.id = detail_facility.id_worship_place 
		where worship_place.id = '".$cari."' ";
    $hasil3=mysqli_query($conn,$query_fasilitas);
    while($baris = mysqli_fetch_array($hasil3)){
        $id_fas=$baris['id'];
        $name=$baris['name'];
        $data_fasilitas[]=array('id'=>$id_fas,'name'=>$name);
	}
	
	//DATA KEGIATAN
	$data_keg = [];
    $query_keg="SELECT event.name as event_name, detail_event.id_worship_place,worship_place.name as worship_place_name, detail_event.date, ustad.name as ustad_name, detail_event.description, detail_event.time FROM detail_event 
		left join event on detail_event.id_event=event.id
		left join worship_place on detail_event.id_worship_place=worship_place.id 
		left join ustad on detail_event.id_ustad=ustad.id  
	where detail_event.id_worship_place='".$cari."'";

    $hasil4=mysqli_query($conn, $query_keg);
    while($baris = mysqli_fetch_array($hasil4)){
        $event_name=$baris['event_name']; 
        $date=$baris['date'];
        $time=$baris['time'];
        $data_keg[]=array('event_name'=>$event_name,'date'=>$date, 'time'=>$time);
    }
	$arr=array("data"=>$dataarray, "fasilitas"=>$data_fasilitas, "keg"=>$data_keg, "galeri"=>$data_gallery);
    echo json_encode($arr);
?>
