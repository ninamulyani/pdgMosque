<?php
require 'connect.php';

//fungsional detail industri kecil
$cari = $_GET["cari"];
$querysearch	= "select id, name, owner, cp, address, employee,ST_X(ST_Centroid(geom)) AS longitude, ST_Y(ST_CENTROID(geom)) As latitude from small_industry where id='$cari'";
$dataarray=[];
$hasil=mysqli_query($conn,$querysearch);
while($row = mysqli_fetch_array($hasil))
    {
          $id=$row['id'];
          $name=$row['name'];
          $owner=$row['owner'];
		  $cp=$row['cp'];
		  $address=$row['address'];
		  $employee=$row['employee'];
          $longitude=$row['longitude'];
          $latitude=$row['latitude'];
          $dataarray[]=array('id'=>$id,'name'=>$name, 'owner'=>$owner, 'cp'=>$cp, 'address'=>$address, 'employee'=>$employee, 'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode ($dataarray);
?>
