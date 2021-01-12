<?php 

    session_start();
    include("../connect.php");
    //error_reporting (E_ALL ^ E_NOTICE);
    $id_c = $_SESSION['id'];
	$id_t = $_GET['id_type'];

    if ($id_t == 'x') {
        
        $sql = mysqli_query( $conn, "select worship_place.id as id_worship, worship_place.name as worship, detail_worship_type.status, worship_place.address, worship_place_type.name as type from worship_place join detail_worship_type 
        on worship_place.id=detail_worship_type.id join worship_place_type
        on detail_worship_type.id_type=worship_place_type.id_type, city 
        WHERE city.id = '$id_c' AND ST_CONTAINS(city.geom, worship_place.geom) AND detail_worship_type.status != '0' order by detail_worship_type.status ASC" );    
    }else{

        $sql = mysqli_query( $conn, "select worship_place.id as id_worship, worship_place.name as worship, detail_worship_type.status, worship_place.address, worship_place_type.name as type from worship_place join detail_worship_type 
        on worship_place.id=detail_worship_type.id join worship_place_type
        on detail_worship_type.id_type=worship_place_type.id_type, city 
        WHERE city.id = '$id_c' AND ST_CONTAINS(city.geom, worship_place.geom) AND detail_worship_type.status != '0' and worship_place_type.id_type ='$id_t' order by detail_worship_type.status ASC" );
    } 
    //echo "<script>console.log($id_c)</script>";

    $no = 1;
	while($row = mysqli_fetch_array($sql))
    {
        $id_type = $row['id_worship'];
        $worship_type = $row['worship'];
        $type = $row['type'];
        $address = $row['address'];
        $status = $row['status'];
            if ($status == 1) {
                    $color = '#4284f5';
            } elseif ($status == 2) {
                    $color = 'green';
            } elseif ($status == 3) {
                    $color = 'Yellow';
            } elseif ($status == 4) {
                    $color = 'Orange';
            } elseif ($status == 5) {
                    $color = 'Red';
            }
        $dataarray[]=array(
            'id'=>$id_type,
            'worship'=>$worship_type,
            'type'=>$type,
            'status'=>$status,
            'color'=>$color,
            'no'=>$no,
            'address'=>$address);
    $no++;
    }
    echo json_encode ($dataarray);
 ?>
