<?php
	include("connection.php");
	session_start();
	try {
		if(isset($_POST['userName']) && isset($_POST['password']))
		{
			$username=$_POST['userName'];  
			$password=$_POST['password']; 
		    $Connection = Connection::getInstance();
		    $sql = "SELECT Id_User, Name, NameEmail FROM User
		    		WHERE NameEmail like '$username' and Password like '$password'";
		    $result = $Connection->query($sql);
		    if($row = $result->fetch_array(MYSQLI_ASSOC)) {
		        $_SESSION['login_user']=$row['Id_User'];
		        $_SESSION['login_name'] = $row['Name'];
		        $_SESSION['login_email'] = $row['NameEmail'];
		        echo "login";
		    }
		    $Connection->close();
		}
		
	}
	catch (Exception $e) {

	}
?>