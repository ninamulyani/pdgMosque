<?php
	include ('connect.php');

	// $id=$_GET["id"];
	$dataarray=array();

	// $sql= mysqli_query($conn,
	// 	    " select distinct restaurant_category.id, restaurant_category.name from restaurant_category, restaurant, detail_restaurant, 
	// 		angkot, detail_worship_place, worship_place where
	// 					restaurant_category.id=restaurant.id_category and
	// 					detail_restaurant.id_restaurant = restaurant.id and
	// 					angkot.id = detail_restaurant.id_angkot and
	// 					detail_worship_place.id_angkot = angkot.id and
	// 					worship_place.id = detail_worship_place.id_worship_place
	// 					order by restaurant_category.id");

	// $sql= mysqli_query($conn,
	// 	    "select distinct restaurant_category.id, restaurant_category.name from restaurant_category order by restaurant_category.id");

	$sql= mysqli_query($conn,
					   "SELECT culinary_category.id, culinary_category.name from culinary_category order by id");
		    // "SELECT culinary.id, culinary.name from culinary order by id limit 10");

	while($row = mysqli_fetch_array($sql)){
		$id=$row['id'];
		$name=$row['name'];
		$dataarray[]=array('id'=>$id,'name'=>$name);
	}
	echo json_encode ($dataarray);

?>
