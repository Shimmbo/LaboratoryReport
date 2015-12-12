<?php
	include('Register.php');
	$api = new Register();
	$postdata = file_get_contents("php://input");
	$data = json_decode($postdata);
	$api->DeleteRegister($data);

?>