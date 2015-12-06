<?php
	include('Laboratory.php');
	$api = new Laboratory();
	echo json_encode($api->LaboratoriesList());
?>