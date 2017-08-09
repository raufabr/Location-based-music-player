<?php

	require 'findFavoriteGenre.php';
	$activity = $_GET['activity'];
	$userID = $_GET['userID'];
	$findFavoriteGenre = new findFavoriteGenre();

	if($userID != null){

		$findFavoriteGenre->favoriteGenre($userID, $activity);
	}


?>
