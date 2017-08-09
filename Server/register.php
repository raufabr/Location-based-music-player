<?php
 
 require_once('config.php');

//class to register users to database once they login to soundclass with dissertation app.
 class Register{

function regUser($userID){
		global $con;
		$query= "INSERT IGNORE INTO `userID` (`ScID`) VALUES ('$userID')";
		$result = mysqli_query($con, $query);
 		//if a user exists, true is returned.
 		if($result){
 		    echo "Success";
 			//return true;
 		}else{
 			echo "Failure. Could not register";
			//echo mysqli_error(); 		
			//return false;
		}	

	}


}
 	//function to check if userID is already included in the database. 	
 /*	function userExists($userID){
 		global $con;
  		$query = "SELECT * FROM users WHERE userID = '$userID'";
 		$result = mysqli_query($con, $query);
 		//if a user exists, true is returned.
 		if($result && mysqli_num_rows($result) > 0){
 		    echo "User is already in the db";
 			return true;
 		}else{
			//echo mysqli_error(); 		
			return false;
		}	

 	}

 	//function to enter user ID and authorisation token into the database to identify unique users
 	function regUser($userID){
 			global $con;
			$insertQuery = "INSERT INTO users (userID) VALUES ('$userID')";
			
		 	//"INSERT INTO users (authToken,userID) VALUES ('$authToken','$userID')";
			if(mysqli_query($con, $insertQuery))
			{
 				echo "Successfully Registered in first table<br>";
 				return true;
 			}
	 		else{
				 echo "Could not register<br>";
				 return false; 
 			}

 	}

 	function createUserTable($userID){
 		global $con;
		$sql = "CREATE TABLE IF NOT EXISTS `a8454564_users`.`$userID` 
		(
			`track_times_played` INT( 100 ) NOT NULL DEFAULT '1',
			`track_genre` VARCHAR( 100 ) NOT NULL DEFAULT  'Indie',
			`activity` VARCHAR( 20 ) NOT NULL DEFAULT  'Unknown'
		) ENGINE = MYISAM";
 		$result =mysqli_query($con,$sql); 
 		if($result){
 			echo "Succesfully created table<br>";
 		}else{
 			echo "Could not create table.<br>";
 		}
	}*/

?>