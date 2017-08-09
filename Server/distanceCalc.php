<?php

require_once('config.php');
class distanceCalc{
	function distance($lat, $lon) {

		global $con;

		$query = "SELECT track_id, track_streamURI, track_duration, track_name, track_artWorkURI, userID, (3959 * acos (cos ( radians('$lat') )* cos( radians( latitude ) )
      	* cos( radians(longitude ) - radians('$lon') )+ sin ( radians('$lat') )* sin( radians( latitude ) ) ) ) AS distance
		FROM music
		HAVING distance < 10
		ORDER BY id desc
		LIMIT 0 , 40";
	
		$rows = array();
		$result = mysqli_query($con, $query);
		
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		
		$row = array_values($rows);
	//	print_r($row);
		$json = json_encode($rows);
		print_r($json);
		
	}
}

?>
