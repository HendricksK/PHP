<html>
<?php include('header.php');?>
<body>
<table>
	<tr><td>ID</td> 
	<td>Name</td> 
	<td>Surname</td>
	<td>Contact Number</td>
	<td>Email</td>
	<td>SA ID Number</td>
	<td>Address</td>
	<td>Actions</td></tr>

<?php 
$dbconn = new mysql_database();

$result = $dbconn->fetch("select * from customer");

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        echo "<tr>"."<td>" . $row["ID"]."</td>". 
        " <td>" . $row["name"]. "</td>". 
        " <td>" . $row["surname"]. "</td>". 
        "<td>" . $row["contact_number"] ."</td>" . 
        "<td>". $row["email"] ."</td>".
        "<td>". $row["sa_id_number"] .
        "<td>". $row["address"] .
        "<td><form action='customer.php?q=".$row["ID"]."' method='post'><input type='submit' value='edit'></form></td>" .
        "<td><form action='delete_customer.php?ID=".$row["ID"]."' method='post'><input type='submit' value='delete'></form></td>";
    }
}
  
?>

</td></tr>
</table>

<?php

if (isset($_GET["q"]))
{
   $id = ($_GET["q"]);

   $result = $dbconn->fetch("select * from customer where ID=".$id."");
   
   if ($result->num_rows > 0) {

   		while($row = $result->fetch_assoc()) {
       		
       		echo '<form method="post" action="edit_customer.php?ID='.$row["ID"].'">
					Name: <input type="text" name="name" value="'.$row["name"] .'" required><br>
					Surname: <input type="text" name="surname" value="'.$row["surname"] .'" required><br>
					Contact: <input type="text" name="contact_number" value="'.$row["contact_number"].'" required><br>
					E-mail: <input type="text" name="email" value="'.$row["email"].'" required><br>
					RSA ID: <input type="text" name="sa_id_number" value="'.$row["sa_id_number"].'" required><br>
					Address: <input type="text" name="address" value="'.$row['address'].'" required><br>
					<input type="submit">
					</form>';
    	}
   }
}
else
{
   //echo "<p>not clicked";
}



if(isset($_GET["edit_customer_status"])){
	$status = ($_GET["edit_customer_status"]);
	if($status == "success"){
		echo "Customer successfully updated";
	}
}

if(isset($_GET["delete_customer_status"])){
	$status = ($_GET["delete_customer_status"]);
	if($status == "success"){
		echo "Customer successfully deleted from database";
	}
}


?>

<form action="add_customer.php" method="post"><input type="submit" value="Add Customer"></form>
</body>
</html>