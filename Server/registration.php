<?php
require_once('config.php')
class registration{
	function regUser($userID){
		$query= "INSERT IGNORE INTO `userID` (`scID`) VALUES ('$userID')"
		$result = mysqli_query($con, $query);
 		//if a user exists, true is returned.
 		if($result ){
 		    echo "Success";
 			//return true;
 		}else{
 			echo "Failure. Could not register";
			//echo mysqli_error(); 		
			//return false;
		}	

	}
}
?>