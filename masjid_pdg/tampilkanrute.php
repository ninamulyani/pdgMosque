<?php
	require 'connect.php';
	$querysearch = "SELECT a.id, destination, route_color from angkot As a left join angkot_color as b on b.id=a.id_color ORDER BY id ASC";

	$result = mysqli_query($conn, $querysearch);
	while ($isinya = mysqli_fetch_array($result)) 
	{
		$hasil[] = array(
			'id' => $isinya['id'],
			'destination' => $isinya['destination'],
			'route_color' => $isinya['route_color']
		);
	}
	echo json_encode($hasil);


?>

