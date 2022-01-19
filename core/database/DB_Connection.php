<?php 


class DB_Connection{

	function __construct(){
		require_once(__DIR__.'/../../config/database.php');
		$this->db_params = $db_params;
	}


	// function getConnection(){
	// 	$conn = new mysqli($this->db_params['servername'],$this->db_params['username'],$this->db_params['password'],$this->db_params['dbname']);
	// 	if($conn->connect_error){
	// 		die("Connection Faild: ". $conn->connect_error);
	// 	}
	// 	return $conn;
	// }
	function getConnection(){
		try {
			$servername = $this->db_params['servername'];
			$dbname = $this->db_params['dbname'];
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $this->db_params['username'], $this->db_params['password']);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		  } catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		  }
	}

}


?>