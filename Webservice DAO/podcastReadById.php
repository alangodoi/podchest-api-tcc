<?php

include_once 'PodcastDAO.php';
include_once 'Podcast.php';

$lerPodcastId = new PodcastDAO();
$podcast = new Podcast();

if (isset($_POST['id'])) {

$podcast->setId($_POST['id']);

$lerPodcastId->lerPodcastId($podcast);
	
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>