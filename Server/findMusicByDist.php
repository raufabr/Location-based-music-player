<?php

	require 'distanceCalc.php';

	$distanceCalc = new distanceCalc();
	$lat = $_GET['lat'];
	$lon = $_GET['lon'];

	if($lat !=null && $lon != null){
		$distanceCalc->distance($lat, $lon);
	}

?>
