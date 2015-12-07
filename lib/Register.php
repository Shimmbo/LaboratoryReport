<?php
	require "connection.php";
	class Register extends Connection{
	    public function RegistersList() {
	    	try{
		        $result = Array();
		        $rSQL = $this->query('CALL sp_get_register_info (NULL)');
		        
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
	    public function CircustancesList() {
	    	try{
		        $result = Array();
		        $rSQL = $this->query('SELECT * FROM Catalog_Circustance');
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

	    public function AddRegister($object) {
	    	try{
		    	$Id_Laboratory = utf8_encode($object['Id_Laboratory']);
		    	$Id_Teacher = utf8_encode($object['Id_Teacher']);
		    	$Id_Student = $object['Id_Student'] == NULL ? NULL : utf8_encode($object['Id_Student']);
		    	$Id_RegisterCircustance = $object['Id_RegisterCircustance'] == NULL ? NULL : utf8_encode($object['Id_RegisterCircustance']);
		    
		    	$StudentsAssistanceNumber = utf8_encode($object['StudentsAssistanceNumber']);
		    	$Id_Catalog_Hour = utf8_encode($object['Id_Catalog_Hour']);
		    	$timestamp = strtotime($object['DateRegister']);
		    	$DateRegister = date("Y-m-d H:i:s", $timestamp);
		        $rSQL = $this->query("INSERT INTO register (Id_Laboratory, Id_Student, Id_RegisterCircustance, Id_User, StudentsAssistanceNumber, Id_Catalog_Hour,Date)
		        		 VALUES($Id_Laboratory, NULL, NULL, 1, $StudentsAssistanceNumber, $Id_Catalog_Hour, '". $DateRegister."')");
		        $lastId = $this->insert_id;
		        $stuffTeacherId = $this->query('SELECT * FROM stuff_teacher WHERE Id_Teacher ='. $Id_Teacher .' AND  Id_Catalog_Hour = '.$Id_Catalog_Hour);

	        	while($row = $stuffTeacherId->fetch_array(MYSQLI_ASSOC)){
		        	$newSQL = $this->query("INSERT INTO register_teacher (Id_Register, Id_Stuff_Teacher) VALUES ($lastId,".$row["Id_Stuff_Teacher"] .")");
	        	}
	        	$lastId = $this->insert_id;
		        $result = Array();
		        $rSQL = $this->query('CALL sp_get_register_info ('.$lastId.')') ;
		        
		        if ($rSQL) {
		            while ($row = $rSQL->fetch_array(MYSQLI_ASSOC)) {
		                array_push($result, $row);
		            }
		        }
		        $this->close();
		        return utf8ize($result);
	    	}catch (Exception $e){
	    		echo $e->getMessage();
	    	}
    	}
	    public function UpdateRegister($object) {
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

	    public function DeleteRegister($id) {
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