<?php
	include('Stuff.php');
	$api = new Stuff();
	$postdata = file_get_contents("php://input");

	$data = json_decode($postdata,true);
	$api->UpdateStuffTeacher($data);

?>