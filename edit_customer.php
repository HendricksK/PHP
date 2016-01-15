<html>
<?php include('header.php');?>
    
<?php
	$dbconn = new mysql_database();

	if (!empty($_POST) && !empty($_GET))
	{
	   $ID = $_GET["ID"];
	   $name = $_POST["name"];
	   $surname = $_POST["surname"];
	   $contact_number = $_POST["contact_number"];
	   $email = $_POST["email"];
	   $sa_id_number = $_POST["sa_id_number"];
	   $address = $_POST["address"];

		$sql = "UPDATE customer SET name='".$name."', surname='".$surname."', contact_number='".$contact_number."', email='".$email."', sa_id_number='".$sa_id_number."', address='".$address."' WHERE id='".$ID."'";
		$result = $dbconn->update($sql);
                echo $result;
	}    
?>
        <form action="customer.php" method="post"><input type="submit" value="Return"></form>
    </body>
 </html>