<?php
	include('Teacher.php');
	$api = new Teacher();
	echo json_encode($api->TeachersList());
?>