<?php
require '../inc/connect.php';
require $_SERVER['DOCUMENT_ROOT'].'masjid_pdg/geom_helper.php';
$id=$_GET['id'];

$sql="select *, ST_ASWKB(geom) AS wkb from worship_place where id = '$id'";

	$result = mysqli_query($conn,$sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$properties = $row;
		# Remove wkb and geometry fields from properties
		unset($properties['wkb']);
		unset($properties['geom']);
		$feature = array(
			 'type' => 'Feature',
			 'geometry' => json_decode(wkb_to_json($row['wkb'])),
			 'properties' => $properties
		);
		# Add feature arrays to feature collection array
		array_push($geojson['features'], $feature);
	}

	//  print_r($geojson);

	echo(json_encode($geojson));
?>
