<?php
	require "connection.php";
	class Teacher extends Connection{
	    public function TeachersList() {
	    	try{
		        $result = Array();
		        $rSQL = $this->query('SELECT * FROM teacher');
		        if ($rSQL) {
		            while ($row = $rSQL->fetch_array(MYSQLI_ASSOC)) {
		                array_push($result, $row);
		            }
		        }
		        $this->close();
		        return utf8ize($result);
	    	} catch (Exception $e){

	    	}
    	}

	    public function AddTeacher($object) {
	    	try{
		    	$Name = utf8_encode($object['Name']);
		    	$LastName = utf8_encode($object['LastName']);
		    	$SecondLastName = utf8_encode($object['SecondLastName']);
		    	$Enrollment = utf8_encode($object['Enrollment']);
		        $rSQL = $this->query("INSERT INTO teacher (Name, LastName, SecondLastName, Enrollment) VALUES('$Name', '$LastName', '$SecondLastName', '$Enrollment')");
		        $this->close();
	    	}catch (Exception $e){
	    		echo $e->getMessage();
	    	}
    	}
	    public function UpdateTeacher($object) {
	    	try{
	    		$Id_Teacher = utf8_encode($object['Id_Teacher']);
		    	$Name = utf8_encode($object['Name']);
		    	$LastName = utf8_encode($object['LastName']);
		    	$SecondLastName = utf8_encode($object['SecondLastName']);
		    	$Enrollment = utf8_encode($object['Enrollment']);
		        $rSQL = $this->query("UPDATE Teacher SET Name = '$Name', LastName = '$LastName', SecondLastName = '$SecondLastName', Enrollment = '$Enrollment' WHERE Id_Teacher = $Id_Teacher");
		        $this->close();
	    	}catch (Exception $e){
	    		echo $e->getMessage();
	    	}
    	}

	    public function DeleteTeacher($id) {
	    	try{
		        $rSQL = $this->query("DELETE FROM Teacher WHERE Id_Teacher = $id");
		        $this->close();
	    	}catch (Exception $e){
	    		echo $e->getMessage();
	    	}
    	}
	}
	function utf8ize($d) {
	    if (is_array($d)) {
	        foreach ($d as $k => $v) {
	            $d[$k] = utf8ize($v);
	        }
	    } else if (is_string ($d)) {
	        return utf8_encode($d);
	    }
	    return $d;
	}
?>