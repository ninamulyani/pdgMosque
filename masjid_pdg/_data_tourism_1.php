<?php
    session_start();
    //MENAMPILKAN DETAIL INFORMASI OBJEK WISATA (DIDALAM gallery.php)
    require '../connect.php';

    $cari = $_GET["cari"];
    $city = $_SESSION['id'];

    //DATA INFORMASI DETAIL
    // $querysearch = "SELECT t.id, t.name, t.address, t.open, t.close, t.ticket, 
    //                 t.contact_person, tt.name AS tourism_type, st_x(st_centroid(t.geom)) AS lon, 
    //                 st_y(st_centroid(t.geom)) AS lat 
    //                 FROM tourism t
    //                 LEFT JOIN tourism_type tt ON t.id_type = tt.id, city c
    //                 WHERE c.id='$city' AND st_contains(c.geom, t.geom) AND t.id = '$cari'"; 

    $querysearch = "SELECT t.id, t.name, t.address, t.open, t.close, t.ticket, tt.name AS tourism_type, 
                    st_x(st_centroid(t.geom)) AS lon, 
                    st_y(st_centroid(t.geom)) AS lat 
                    FROM tourism t
                    LEFT JOIN tourism_type tt ON t.id_type = tt.id, city c
                    WHERE c.id='$city' AND st_contains(c.geom, t.geom) AND t.id = '$cari'";   

    $hasil=mysqli_query($conn, $querysearch);

    while($row = mysqli_fetch_assoc($hasil))
    {
        $id             = $row['id'];
        $name           = $row['name'];
        $address        = $row['address'];
        $open           = $row['open'];
        $close          = $row['close'];
        $ticket         = $row['ticket'];
        $tourism_type   = $row['tourism_type'];
        //$cp             = $row['contact_person'];
        $longitude      = $row['lon'];
        $latitude       = $row['lat'];
        
        // $dataarray[] = array('id'=>$id,'name'=>$name,'address'=>$address,'open'=>$open, 'close'=>$close,'ticket'=>$ticket, 'contact_person'=>$cp,'tourism_type'=>$tourism_type,'longitude'=>$longitude,'latitude'=>$latitude);
        $dataarray[] = array('id'=>$id,'name'=>$name,'address'=>$address,'open'=>$open, 'close'=>$close,'ticket'=>$ticket, 'tourism_type'=>$tourism_type,'longitude'=>$longitude,'latitude'=>$latitude);
    }

    //DATA GALLERY
    // $query_gallery = "SELECT serial_number, gallery_tourism FROM tourism_gallery where id = '".$cari."' "; 

    // $hasil2 = mysqli_query($conn, $query_gallery);

    // while($baris = mysqli_fetch_assoc($hasil2))
    // {
    //     $serial_number    = $baris['serial_number'];
    //     $gallery_tourism  = $baris['gallery_tourism'];
    //     $data_gallery[]   = array('serial_number'=>$serial_number,'gallery_tourism'=>$gallery_tourism);
    // }

    //DATA FASILITAS
    $query_fasilitas = 
              "SELECT facility_tourism.id, facility_tourism.name 
              FROM facility_tourism 
              left join detail_facility_tourism on detail_facility_tourism.id_facility = facility_tourism.id 
              left join tourism on tourism.id = detail_facility_tourism.id_tourism 
              where tourism.id = '$cari' 
              ORDER BY facility_tourism.name ASC "; 
      
    $hasil3=mysqli_query($conn, $query_fasilitas);

    while($row = mysqli_fetch_array($hasil3))
    {
        $id = $row['id'];
        $name = $row['name'];
        $data_fasilitas[] = array('id'=>$id,'name'=>$name);
    }

    //DATA EVENT
    // $query_event =   "SELECT tourism_event.id_event, tourism_event.id_tourism, tourism_event.nama_event, 
    //                 tourism_event.date_start, tourism_event.date_end, tourism_event.description, 
    //                 tourism_event.contact_person, tourism.name AS tourism_name 
    //                 FROM tourism_event 
    //                 LEFT JOIN tourism ON tourism.id = tourism_event.id_tourism 
    //                 WHERE id_tourism = '$cari' 
    //                 ORDER BY date_start ASC";

    // $hasil4=mysqli_query($conn, $query_event);

    // while($baris = mysqli_fetch_array($hasil4))
    // {
    //     $date         = $baris['date_start'];
    //     $name_event   = $baris['nama_event'];
    //     $data_event[] = array('date_start'=>$date,'nama_event'=>$name_event);
    // }         

    //DATA RATING
    // $query_rating = "SELECT * from review where id_ow = '".$cari."' ORDER BY tanggal DESC";
    
    // $hasil5 = mysqli_query($conn, $query_rating);

    // while($baris = mysqli_fetch_array($hasil5)){
    //     $rating       = $baris['rating'];
    //     $date_rate    = $baris['tanggal'];
    //     $name_user    = $baris['name'];
    //     $comment      = $baris['comment'];

    //     $data_rating[] = array('rating'=>$rating, 'tanggal'=>$date_rate,'name'=>$name_user, 'comment'=>$comment);
    // }         

    //DATA INFO
    // $query_info = "SELECT * from information_admin where id_ow = '".$cari."' ORDER BY id_informasi DESC";
    // $hasil6 = mysqli_query($conn, $query_info);

    // while($baris = mysqli_fetch_array($hasil6))
    // {
    //     $date_info    = $baris['tanggal'];
    //     $informasi    = $baris['informasi'];
    //     $data_info[]  = array('tanggal'=>$date_info,'informasi'=>$informasi);
    // }                

    // $arr=array("data"=>$dataarray, "gallery"=>$data_gallery, "fasilitas"=>$data_fasilitas, "Event"=>$data_event, "rating"=>$data_rating, "info"=>$data_info);
    $arr=array("data"=>$dataarray, "fasilitas"=>$data_fasilitas);

    echo json_encode($arr);
?>