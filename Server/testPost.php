<?php

$trackID = $_GET['track_id'];
if($trackID != null){
	$response = array('response_code' => "1");
	echo json_encode($response);
}else{
	$response = array('response_code'=>"2");
	echo json_encode($response);	
}
?>