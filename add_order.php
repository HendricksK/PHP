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

include('database.php');

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

	<table>
	<tr><td>ID</td> 
	<td>Name</td> 
	<td>Description</td>
	<td>Release Date</td>
	<td>Category name</td></tr>

<?php

$dbconn = new mysql_database();

$result = $dbconn->fetch("select * from dvd inner join category on category.Category_ID=dvd.category_id");

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        echo "<tr>"."<td>" . $row["ID"]."</td>". 
        "<td>" . $row["name"]. "</td>". 
        "<td>" . $row["description"]. "</td>". 
        "<td>" . $row["release_date"] ."</td>" . 
        "<td>". $row["category_name"] ."</td>".
        "<td><form action=dvd.php?dvd_id='".$row["ID"]."' method='post'><input type='submit' value='edit'></form></td>" .
        "<td><form action=delete_dvd.php?dvd_id='".$row["ID"]."' method='post'><input type='submit' value='delete'></form></td>";
    }
}


?>

</td></tr>
</table>

<form method="post" action="add_order.php">
	<label>Add new Order</label><br>
	Customer ID: <input type="text" name="customer_id" value="" required><br>
	DVD ID: <input type="text" name="dvd" value="" required><br>
	<input type="submit">
</form>


<!-- need to add an dvd_order for every dvd added-->
<?php

	if (!empty($_POST))
	{
		//print_r($_POST);
	    $customer = $_POST["customer_id"];
	    $dvd_id_array = $_POST["dvd"];

		$sql = "INSERT INTO orders (customer_id, rent_date, due_date, actual_return_date) 
		values ('".$customer."', curdate(), adddate(curdate(),2) , '' )";
		
		$result = $dbconn->insert_order($sql);
		//echo $result;

		$dvd_id_array = explode(",", $dvd_id_array);

		foreach ($dvd_id_array as $key => $dvd_id) {
			$sql = "insert into dvd_orders (dvd_id, order_id) values ('".$dvd_id."', '".$result."')";
			$result = $dbconn->insert_order($sql);
		}
		
		//echo $result;
	}

?>
<script type="text/javascript">
	
</script>

</body>