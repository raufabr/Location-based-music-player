<?php
	require 'postMusic.php';

	$postMusic = new postMusic();
	$trackID = $_GET['track_id'];
	$latitude = $_GET['latitude'];
	$longitude = $_GET['longitude'];
	$userID = $_GET['userID'];
	$activity = $_GET['activity'];
	$genre = $_GET['track_genre'];
	$streamURI = $_GET['track_streamURI'];
	$artWorkURI = $_GET['track_artWorkURI'];
	$trackDur= $_GET['track_duration'];
	$trackName = $_GET['track_name'];



	
	if($trackID !=null && $latitude!= null && $longitude!=null && 
		$userID != null&& $activity != null && $trackDur !=null && $streamURI!=null){ 
		$postMusic->insertIntoMusicTable($trackID,  $latitude, $longitude, $userID, $streamURI, $artWorkURI, 
			$trackDur, $trackName);
		$postActivity = $postMusic-> checkIfActivityMatchesGenre($userID, $activity, $genre);
		if($postActivity){
			$postMusic->updateTimesPlayedGenre($userID, $activity, $genre);
		}else{
			$postMusic->insertIntoActivityTable($userID, $activity, $genre);
		}//else{
		//$response = array('response_code' => "One of the fields is missing");
		//echo json_encode($response);		
		//}
	}
?>