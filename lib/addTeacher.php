<?php
	include('Teacher.php');
	$api = new Teacher();
	$postdata = file_get_contents("php://input");

	$data = json_decode($postdata,true);
	$api->AddTeacher($data);

?>