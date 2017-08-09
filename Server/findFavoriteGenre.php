<?php
	require_once('config.php');	
	class findFavoriteGenre{
		//this function will take the user's current activity, check if there's a result and then update the table

		function favoriteGenre($userID, $activity){
			
			global $con;
			$query = "SELECT track_genre FROM  `a8454564_users`.`activities` WHERE  `activity` =  '$activity' AND `userID` = '$userID' AND  
			`track_times_played` = ( SELECT MAX(  `track_times_played` ) FROM  `a8454564_users`.`$userID`)";
			

			$rows = array();
			$result = mysqli_query($con, $query);
			if($result){
				while($r = mysqli_fetch_assoc($result)) {
    				$rows[] = $r;
				}
			}
			$row = array_values($rows);
		//	print_r($row);
			$json = json_encode($rows);
			print_r($json);

	}
}
?>