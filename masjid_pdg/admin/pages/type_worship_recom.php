<?php 
	include("../../connect.php");
	$id_t = $_GET['id_type'];

    if ($id_t == 'x') {
        
        $sql = mysqli_query( $conn, "select worship_place.id, worship_place.name as worship, detail_worship_type.status, worship_place.address, worship_place_type.name as type from worship_place join detail_worship_type 
        on worship_place.id=detail_worship_type.id join worship_place_type 
        on detail_worship_type.id_type=worship_place_type.id_type
        order by worship_place.id ASC" );    
    }else{

        $sql = mysqli_query( $conn, "select worship_place.id, worship_place.name as worship, detail_worship_type.status, worship_place.address, worship_place_type.name as type from worship_place join detail_worship_type 
        on worship_place.id=detail_worship_type.id join worship_place_type 
        on detail_worship_type.id_type=worship_place_type.id_type 
        WHERE worship_place_type.id_type = '$id_t'
        order by worship_place.id ASC" );
    }

    $no = 1;
	while($row = mysqli_fetch_array($sql))
    {
        $id_t = $row['id'];
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
            'id'=>$id_t,
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
