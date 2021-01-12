<?php
//Fungsi cari kuliner

	include('connect.php');
    
	$querysearch="SELECT * FROM review where id_worship = 'M0005' ";
	$hasil=mysqli_query($conn,$querysearch);

        while($rows = mysqli_fetch_array($hasil))
            {
              $rating = $rows['rating'];
              $tanggal = $rows['tanggal'];
              $nama = $rows['name'];
              $komen = $rows['comment'];
              $id_rev = $rows['id_review'];
                $dataarray[]=array('rating'=>$rating,'tanggal'=>$tanggal, 'name'=>$nama, 'comment'=>$komen,'id_review'=>$id_rev);
            }
            echo json_encode ($dataarray);
?>
