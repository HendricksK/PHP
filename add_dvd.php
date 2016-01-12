<html>
<?php include('header.php');?>
<body>
<form method="post" action="add_customer.php">
	Name: <input type="text" name="name" value="" required><br>
	Surname: <input type="text" name="surname" value="" required><br>
	Contact: <input type="text" name="contact_number" value="" required><br>
	E-mail: <input type="text" name="email" value="" required><br>
	RSA ID: <input type="text" name="sa_id_number" value=""><br>
	Address: <input type="text" name="address" value="" required><br>
	<input type="submit">
</form>

<?php

include('database.php');

	$dbconn = new mysql_database();

	if (!empty($_POST))
	{
	   $ID = $_POST["ID"];
	   $name = $_POST["name"];
	   $surname = $_POST["surname"];
	   $contact_number = $_POST["contact_number"];
	   $email = $_POST["email"];
	   $sa_id_number = $_POST["sa_id_number"];
	   $address = $_POST["address"];

		$sql = "INSERT INTO customer (name, surname, contact_number, email, sa_id_number, address) 
		values ('".$name."', '".$surname."', '".$contact_number."', '".$email."', '".$sa_id_number."', '".$address."')";
		//$sql = "UPDATE customer SET name='".$name."' WHERE id='".$ID."'";
		
		$result = $dbconn->insert($sql);
	}

?>

<form action="add_dvd.php" method="post"><input type="submit" value="Add Customer"></form>

</body>