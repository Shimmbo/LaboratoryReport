<?php
	require "connection.php";
	class Stuff extends Connection{
	    public function StuffTeacherList() {
	    	try{
		        $result = Array();
		        $rSQL = $this->query('CALL get_stuff_teacher_info()');
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
	    public function StuffList() {
	    	try{
		        $result = Array();
		        $rSQL = $this->query('SELECT * FROM Stuff');
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
	    public function CatalogHourList() {
	    	try{
		        $result = Array();
		        $rSQL = $this->query('SELECT * FROM Catalog_Hour');
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
	    public function AddStuffTeacher($object) {
	    	try{
		    	$Id_Teacher = utf8_encode($object['Id_Teacher']);
		    	$Id_Stuff = utf8_encode($object['Id_Stuff']);
		    	$Id_Catalog_Hour = utf8_encode($object['Id_Catalog_Hour']);
		        $rSQL = $this->query("INSERT INTO stuff_teacher (Id_Teacher, Id_Stuff, Id_Catalog_Hour) VALUES($Id_Teacher, $Id_Stuff, $Id_Catalog_Hour)");
		        $this->close();
	    	}catch (Exception $e){
	    		echo $e->getMessage();
	    	}
    	}
	    public function UpdateStuffTeacher($object) {
	    	try{
	    		$Id_Stuff_Teacher = utf8_encode($object['Id_Stuff_Teacher']);
		    	$Id_Teacher = utf8_encode($object['Id_Teacher']);
		    	$Id_Stuff = utf8_encode($object['Id_Stuff']);
		    	$Id_Catalog_Hour = utf8_encode($object['Id_Catalog_Hour']);
		        $rSQL = $this->query("UPDATE stuff_Teacher SET Id_Teacher = $Id_Teacher, Id_Stuff = $Id_Stuff, Id_Catalog_Hour = $Id_Catalog_Hour WHERE Id_Stuff_Teacher = $Id_Stuff_Teacher");
		        $this->close();
	    	}catch (Exception $e){
	    		echo $e->getMessage();
	    	}
    	}

	    public function DeleteStuffTeacher($id) {
	    	try{
		        $rSQL = $this->query("DELETE FROM stuff_teacher WHERE Id_Stuff_Teacher = $id");
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