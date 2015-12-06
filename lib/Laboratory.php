<?php
	require "connection.php";
	class Laboratory extends Connection{
	    public function LaboratoriesList() {
	    	try{
		        $result = Array();
		        $rSQL = $this->query('SELECT * FROM Laboratory');
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

	    public function AddLaboratory($object) {
	    	try{
		    	$Name = utf8_encode($object['Name']);
		    	$Description = utf8_encode($object['Description']);
		    	$NoStudents = utf8_encode($object['NoStudents']);
		        $rSQL = $this->query("INSERT INTO laboratory (Name, Description, NoStudents) VALUES('$Name', '$Description', '$NoStudents')");
		        $this->close();
	    	}catch (Exception $e){
	    		echo $e->getMessage();
	    	}
    	}
	    public function UpdateLaboratory($object) {
	    	try{
	    		$Id_Laboratory = utf8_encode($object['Id_Laboratory']);
		    	$Name = utf8_encode($object['Name']);
		    	$Description = utf8_encode($object['Description']);
		    	$NoStudents = utf8_encode($object['NoStudents']);
		        $rSQL = $this->query("UPDATE laboratory SET Name = '$Name', Description = '$Description', NoStudents = '$NoStudents' WHERE Id_Laboratory = $Id_Laboratory");
		        $this->close();
	    	}catch (Exception $e){
	    		echo $e->getMessage();
	    	}
    	}

	    public function DeleteLaboratory($id) {
	    	try{
		        $rSQL = $this->query("DELETE FROM laboratory WHERE Id_Laboratory = $id");
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