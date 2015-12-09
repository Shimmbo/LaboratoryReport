<?php
	include('Stuff.php');
	$api = new Stuff();
	echo json_encode($api->CatalogHourList());
?>