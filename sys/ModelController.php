<?php

require 'sys/PDO_Adapter.php';

class ModelController {	

	private $adapter;


	public function __construct() {
		$this->adapter = new PDOAdapter();
	}


	public function checkLogin($user,$pass){
		$stmt = $this->adapter->conn->prepare("SELECT COUNT(*) FROM USERS WHERE username=? AND password=?;");
		$stmt->bindParam(1,$user);
		$stmt->bindParam(2,$pass);
		try{
			$result = $this->adapter->executeFetchPrepared($stmt);
		}catch(PDOException $e){
			return null;
		}

		return $result;
	}

}	
?>
