<?php
	include('Laboratory.php');
	$api = new Laboratory();
	$postdata = file_get_contents("php://input");

	$data = json_decode($postdata,true);
	$api->AddLaboratory($data);

?>