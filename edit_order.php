<html>
<?php include('header.php');?>
<body>
<?php
include('database.php');

if (!empty($_GET))
{

   $id = ($_GET["order_id"]);

   $dbconn = new mysql_database();

   $result = $dbconn->fetch("select * from orders where orders_ID=".$id."");

   if ($result->num_rows > 0) {

   		while($row = $result->fetch_assoc()) {	
       		echo '<form method="post" action="edit_order.php?orders_ID='.$row["orders_ID"].'">
					Rental Date: <input type="text" name="rent_date" value="'.$row["rent_date"] .'" required><br>
					Due Date: <input type="text" name="due_date" value="'.$row["due_date"] .'" required><br>
					Return Date: <input type="text" name="actual_return_date" value="'.$row["actual_return_date"].'" required><br>
					Customer ID: <input type="text" name="customer_id" value="'.$row["customer_id"].'" required><br>
					<input type="submit">
					</form>';
    	}
   }
}
else
{
   //echo "<p>not clicked";
}

  $dbconn = new mysql_database();

  if (!empty($_POST) && !empty($_GET))
  {
     $orders_ID = $_GET["orders_ID"];
     $rent_date = $_POST["rent_date"];
     $due_date = $_POST["due_date"];
     $actual_return_date = $_POST["actual_return_date"];
     $customer_id = $_POST["customer_id"];

    $sql = "UPDATE orders SET rent_date='".$rent_date."', due_date='".$due_date."', due_date='".$due_date."', actual_return_date='".$actual_return_date."' WHERE orders_ID='".$orders_ID."'";
    $result = $dbconn->update_order($sql);

  }
?>
</body>
</html>