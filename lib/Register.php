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
		    	$Id_Student =empty($object['Id_Student']) ? "NULL" : utf8_encode($object['Id_Student']);
		    	$Id_RegisterCircustance = empty($object['Id_RegisterCircustance']) ? "NULL" : utf8_encode($object['Id_RegisterCircustance']);
		    
		    	$StudentsAssistanceNumber = utf8_encode($object['StudentsAssistanceNumber']);
		    	$Id_Catalog_Hour = utf8_encode($object['Id_Catalog_Hour']);

		    	$timestamp = strtotime($object['DateRegister']);
		    	$DateRegister = date("Y-m-d H:i:s", $timestamp);

		    	$stuffTeacherId = $this->query('SELECT * FROM stuff_teacher WHERE Id_Teacher ='. $Id_Teacher .' AND  Id_Catalog_Hour = '.$Id_Catalog_Hour);
		        if(!$stuffTeacherId->num_rows > 0){
		        	return array('Status'=>400, 'Message' => 'El maestro no tiene asignada materia para esta hora');
	        	}

		        $rSQL = $this->query("INSERT INTO register (Id_Laboratory, Id_Student, Id_RegisterCircustance, Id_User, StudentsAssistanceNumber, Id_Catalog_Hour,Date)
		        		 VALUES($Id_Laboratory,". $Id_Student.",". $Id_RegisterCircustance.", 1, $StudentsAssistanceNumber, $Id_Catalog_Hour, '". $DateRegister."')");
		        $lastId = $this->insert_id;
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
	    public function ConsultReport($object) {
    		try{
		        $result = Array();
		        $Date = utf8_encode($object);
		        $rSQL = $this->query("CALL sp_get_report('".$Date."')");
		        
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
	    public function UpdateRegister($object) {
	    	try{
		    	$Id_Laboratory = intval(utf8_encode($object['Id_Laboratory']));
		    	$Id_Teacher = intval(utf8_encode($object['Id_Teacher']));
		    	$Id_Student =empty($object['Id_Student']) ? "NULL" : utf8_encode($object['Id_Student']);
		    	$Id_RegisterCircustance = empty($object['Id_RegisterCircustance']) ? "NULL" : utf8_encode($object['Id_RegisterCircustance']);
		    	$StudentsAssistanceNumber = utf8_encode($object['StudentsAssistanceNumber']);
		    	$Comments = utf8_encode($object['Comments']);
	    		$Id_Register_Teacher = utf8_encode($object['Id_Register_Teacher']);
		        $rSQL = $this->query("CALL update_register_teacher ($Id_Register_Teacher, $Id_Laboratory, $Id_Student, $Id_RegisterCircustance, $StudentsAssistanceNumber, '$Comments')");

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