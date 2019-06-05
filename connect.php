<?php

	
	class Database {
		private $_connection;
		private static $_instance; 
		private $_host = "localhost";
		private $_username = "root";
		private $_password = "";
		private $_database = "thesis_library";

		public static function getInstance() {
			if(!self::$_instance) { 
				self::$_instance = new self();
			}
			return self::$_instance;
		}
		// Constructor
		private function __construct() {
			$this->_connection = new mysqli($this->_host, $this->_username, 
				$this->_password, $this->_database);
		
			// Error handling
			if(mysqli_connect_error()) {
				trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
					 E_USER_ERROR);
			}
			else{
				//echo "connection";
			}
		}
		private function __clone() { }
		public function getConnection() {
			return $this->_connection;
		}
		private function close() {
			$this->mysql_close($this->_connections);
		}
	}

	$db = Database::getInstance();
    $conn = $db->getConnection(); 

?>