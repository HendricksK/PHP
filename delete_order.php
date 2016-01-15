<html>
    <?php include('header.php');?>
<body>
<?php


	$dbconn = new mysql_database();

	if(!empty($_GET))
	{
		$ID = ($_GET["order_id"]);
		$sql = "DELETE FROM orders WHERE orders_ID=".$ID."";
		$result = $dbconn->delete_order($sql);
                echo $result;
	}
?>

<form action="order.php" method="post"><input type="submit" value="Return"></form>
</body>
</html>