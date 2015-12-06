<?php
	class Connection extends mysqli {
	    private static $_connected = false;
	    private static $_instance = null;
	    public function  __destruct() {
	        $this->close();
	    }

	    public static function getInstance() {
	        if(self::$_instance === null) {
	            self::$_instance = new self();
	        }
	        return self::$_instance;
	    }

	    public function connect($host = NULL, $user = NULL, $password = NULL, $database = NULL, $port = NULL, $socket = NULL) {
	        if(!self::$_connected) {
	        	    if($host === NULL)
				    {
    	            	parent::__construct(
		                    "localhost",
		                    "root",
		                    "root",
		                    "project"
	            		);
				    }else
				    {
				        parent::__construct($host, $user, $password , $database, $port, $socket);
				    }

	            if(mysqli_connect_errno()) {
	                throw new Exception("Connection failed: ".mysqli_connect_error());
	            }
	            self::$_connected = true;
	        }
	    }

	    public function close() {
	        if(self::$_connected) {
	            parent::close();
	            self::$_connected = false;
	        }
	    }

	    public function query($sql) {
	        $this->connect();
	        $result = parent::query($sql);
	        if($result) {
	            return $result;
	        }
	        else {
	            throw new Exception('Query Exception: '.mysqli_error($this).' num:'.mysqli_errno($this));
	        }
	    }
	}
?>
