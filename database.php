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

	/*switch (n) {
	    case label1:
	        code to be executed if n=label1;
	        break;
	    case label2:
	        code to be executed if n=label2;
	        break;
	    case label3:
	        code to be executed if n=label3;
	        break;
	    ...
	    	default:
	        code to be executed if n is different from all labels;
	} will clean up the database class, to ensure that there are less functions, to reduce the overall size of the file*/

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

	public function insert_dvd($query){
		$conn = new mysql_database();
		$conn = $conn->__construction();
		if($conn->query($query) === TRUE){
			sleep(1);
		   	header("Location: dvd.php?add_dvd_status=success");
		   	die();
		}else {
		    echo "Error updating record: " . $conn->error;
		}
	}

	public function insert_order($query){
		$conn = new mysql_database();
		$conn = $conn->__construction();
		if($conn->query($query) === TRUE){
			sleep(1);
		   	header("Location: order.php?add_order_status=success");
		   	die();
		   	return $conn->insert_id;
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

	public function update_dvd($query){
		$conn = new mysql_database();
		$conn = $conn->__construction();
		if($conn->query($query) === TRUE){
			sleep(1);
		   	header("Location: dvd.php?edit_dvd_status=success");
		   	die();
		}else {
		    echo "Error updating record: " . $conn->error;
		}
	}

	public function update_order($query){
		$conn = new mysql_database();
		$conn = $conn->__construction();
		if($conn->query($query) === TRUE){
			sleep(1);
		   	header("Location: order.php?edit_order_status=success");
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

	public function delete_dvd($query){
		$conn = new mysql_database();
		$conn = $conn->__construction();
		if($conn->query($query) === TRUE){
			sleep(1);
		   	header("Location: dvd.php?delete_dvd_status=success");
		   	die();
		}else {
		    echo "Error updating record: " . $conn->error;
		}
	}

	public function delete_order($query){
		$conn = new mysql_database();
		$conn = $conn->__construction();
		if($conn->query($query) === TRUE){
			sleep(1);
		   	header("Location: order.php?delete_order_status=success");
		   	die();
		}else {
		    echo "Error updating record: " . $conn->error;
		}
	}
}

?>