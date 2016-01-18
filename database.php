<?php

class mysql_database {
    
    private $database;
    
    public function __construct() {
	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = new mysqli($servername, $username, $password, "dvd_shop");

	if ($conn->connect_error) {
            exit("Connection failed: " . $conn->connect_error);
	}echo "Connected successfully <br>";
        
        $this->database = $conn;
        return $conn;
    }

    public function fetch($query){
        $result = $this->database->query(mysql_real_escape_string($query));
	return $result;
    }

    public function insert($query){
	if($this->database->query($query) === TRUE){
            $this->__close();
            return "Customer successfully added to database";    
	}else {
            echo "Error updating record: " .  $this->database->error;
	}
    }

    public function insert_dvd($query){
	if($this->database->query($query) === TRUE){
            $this->__close();
            return "DVD succesfully added to the database";
	}else {
            echo "Error updating record: " . $this->database->error;
        }
    }

    public function insert_order($query){
	if($this->database->query($query) === TRUE){
            echo "order succesfully added to the database<br>";
            return $this->database->insert_id;
        }else {
            echo "Error updating record: " . $this->database->error;
	}
    }
    
     public function insert_category($query){
	if($this->database->query($query) === TRUE){
            $this->__close();
            return "Category successfully added to database";    
	}else {
            echo "Error updating record: " .  $this->database->error;
	}
    }

    public function update($query){
            if($this->database->query($query) === TRUE){
		return "Customer succesfully updated";
            }else {
                echo "Error updating record: " . $this->database->error;
	}
    }

    public function update_dvd($query){
       if($this->database->query($query) === TRUE){
		return "DVD succesfully updated";
            }else {
                echo "Error updating record: " . $this->database->error;
	}
    }

    public function update_order($query){
        if($this->database->query($query) === TRUE){
            return "Order succesfully updated";
        }else {
            echo "Error updating record: " . $this->database->error;
        }
    }

    public function delete($query){
	if($this->database->query($query) === TRUE){   
            return "Customer succesfully deleted";
        }else {
            echo "Error updating record: " . $this->database->error;
	}
    }

    public function delete_dvd($query){
	if($this->database->query($query) === TRUE){
            return "DVD succesfully deleted";
	}else {
            echo "Error updating record: " . $this->database->error;
	}
    }

    public function delete_order($query){
	if($this->database->query($query) === TRUE){
            return "Order succesfully deleted";
	}else {
            echo "Error updating record: " . $this->database->error;
	}
    }
        
    public function delete_category($query){
        if($this->database->query($query) === TRUE){
            return "Order succesfully deleted";
	}else {
            echo "Error updating record: " . $this->database->error;
	}
    }
        
    private function __close(){
        $this->database->close();
    }
} ?>