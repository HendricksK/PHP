<html>
<?php include('header.php');?>
<body>

<?php
if(isset($_GET["edit_customer_status"])){
    $status = ($_GET["edit_customer_status"]);
    if($status == "success"){
        echo "Customer successfully updated";
    }
}

if(isset($_GET["add_order_status"])){
    $status = ($_GET["add_order_status"]);
    if($status == "success"){
        echo "Order successfully added to database";
    }
}

if(isset($_GET["delete_order_status"])){
    $status = ($_GET["delete_order_status"]);
    if($status == "success"){
        echo "Customer successfully deleted from database";
    }
}
?>
<form action="add_order.php" method="post"><input type="submit" value="Add order"></form>

<table>
	<tr><td>Order ID</td>
    <td>Customer ID</td> 
	<td>Rental Date</td>
    <td>Return Date</td>
	<td>Actions</td></tr>

<?php

include('database.php');

$dbconn = new mysql_database();

$result = $dbconn->fetch("SELECT * FROM orders INNER JOIN customer on customer.ID=orders.customer_id ORDER BY orders_ID DESC");

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        echo "<tr>"."<td>" . $row["orders_ID"]."</td>". 
        "<td>" . $row["ID"]. "</td>". 
        "<td>" . $row["rent_date"]. "</td>" .
        "<td>" . $row["actual_return_date"]. "</td>" .
        "<td><form action='edit_order.php?order_id=".$row["orders_ID"]."' method='post'><input type='submit' value='edit'></form></td>" .
        "<td><form action='delete_order.php?order_id=".$row["orders_ID"]."' method='post'><input type='submit' value='delete'></form></td>";
    }
}


?>

</td></tr>
</table>



</body>
</html>