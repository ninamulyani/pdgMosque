<?php
require 'connect.php';
require 'geom_helper.php';
$querysearch="select *, ST_ASWKB(geom) AS wkb from hotel";

$hasil=mysqli_query($conn,$querysearch);
while($row=mysqli_fetch_assoc($hasil))
	{
		$properties = $row;
		# Remove wkb and geometry fields from properties
		unset($properties['wkb']);
		unset($properties['geom']);
		$feature = array(
			 'type' => 'Feature',
			 'geometry' => json_decode(($row['wkb'])),
			 'properties' => $properties
		);
		# Add feature arrays to feature collection array
		array_push($geojson['features'], $feature);
	} echo(json_encode($geojson));
	
?>
