<?php

class mysql_database {
	 function __construction() {
		$servername = "localhost";
		$username = "root";
		$password = "";

		// Create connection
		$conn = new mysqli($servername, $username, $password, "dvd_shop");

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully <br>";
		return $conn;
	}

	public function fetch($query){
		$conn = new mysql_database();
		$conn = $conn->__construction();
		$result = $conn->query($query);
		return $result;
	}

	public function insert($query){
		$conn = new mysql_database();
		$conn = $conn->__construction();
		if($conn->query($query) === TRUE){
			sleep(1);
		   	header("Location: customer.php?add_customer_status=success");
		   	die();
		}else {
		    echo "Error updating record: " . $conn->error;
		}
	}

	public function update($query){
		$conn = new mysql_database();
		$conn = $conn->__construction();
		if($conn->query($query) === TRUE){
			sleep(1);
		   	header("Location: customer.php?edit_customer_status=success");
		   	die();
		}else {
		    echo "Error updating record: " . $conn->error;
		}
	}

	public function delete($query){
		$conn = new mysql_database();
		$conn = $conn->__construction();
		if($conn->query($query) === TRUE){
			sleep(1);
		   	header("Location: customer.php?delete_customer_status=success");
		   	die();
		}else {
		    echo "Error updating record: " . $conn->error;
		}
	}
}

?>