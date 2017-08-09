<?php

 require_once('config.php');

class postMusic{
	//this function inserts the track details in the universal music table.
	//the music table is there to find all music nearby a user 
 	function insertIntoMusicTable($trackID, $lat, $long, $userID,$streamURI, $artWorkURI, $trackDur, $name){
 		global $con;

		$query = "INSERT INTO  `a8454564_users`.`music` (`track_id`,`latitude`,`longitude`,`userID`,`track_streamURI`,`track_artWorkURI`,
		`track_duration`, `track_name`) 
		VALUES 
		('$trackID', '$lat', '$long','$userID', '$streamURI', '$artWorkURI', '$trackDur', '$name')";
		$result = mysqli_query($con, $query);
		if($result){
			//$response = array('response_code' => "200 OK from insertInto Music table");
			//echo json_encode($response);		
		}else{
			$response = array('response_code' => "Error 400 bad request");
			echo json_encode($response);		
		}
	}



	//this function will first check if the activity and the genre used by the user is already inserted into the database

	function checkIfActivityMatchesGenre($userID, $activity, $genre){

		global $con;

		$query = "SELECT * FROM  `a8454564_users`.`activities` WHERE  `genre` =  '$genre' AND  `activity` =  '$activity' 
		AND `userID` = '$userID'";
		
		$result = mysqli_query($con, $query);
 		//if the genre and the activity matches, increment the number of times played for that genre and activity
 		if($result && mysqli_num_rows($result) > 0){
 	    	//echo "User is already in the db";
 			//echo "Genre exists";
 			return true;
 		//if it hasn't been added yet, then insert it into the table
 		}
 		else{
 			//echo "Genre doesn't exist";
 			return false;
 		}	

	}

	//this function inserts the genre along with the user activity on the user table
	//when recommending music, this table will check the number of times a certain genre was played to recommend music
	function insertIntoActivityTable($userID, $activity, $genre){
		global $con;
		$query = "INSERT INTO `a8454564_users`.`activities` (`genre`,`activity`, `userID`)
		VALUES ('$genre', '$activity','$userID')";
		$result = mysqli_query($con, $query); 	
		if($result){
			$response = array('response_code' => 'Inserted Into Activity table');
			echo json_encode($response);
		}else{
			$response = array('response_code' => 'Could not Insert Into Activity table');
			echo json_encode($response);
		}
	}

	function updateTimesPlayedGenre($userID, $activity, $genre){

		global $con;


		$query = "UPDATE `a8454564_users`.`activities` SET `timesPlayed` = `timesPlayed` + 1 WHERE 
		`genre` = '$genre' AND `activity` = '$activity' AND `userID` = '$userID'";	
	
		$result = mysqli_query($con, $query);
		if($result){
			$response = array('response_code' => 'Succesfully updated table') ;
			echo json_encode($response);
		}else{
			$response = array('response_code' => 'Error 404 Could not Update Activity table');
			echo json_encode($response);

		}
	}


}

?>
