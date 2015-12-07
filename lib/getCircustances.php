<?php
	include('Register.php');
	$api = new Register();
	echo json_encode($api->CircustancesList());
?>