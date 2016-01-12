<?php
include('header.php');
include('database.php');

	$dbconn = new mysql_database();

	if(!empty($_GET))
	{
		$ID = ($_GET["order_id"]);
		echo $ID;
		$sql = "DELETE FROM orders WHERE orders_ID=".$ID."";
		$result = $dbconn->delete_order($sql);
	}
?>