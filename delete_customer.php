<?php
include('header.php');
include('database.php');

	$dbconn = new mysql_database();

	if(!empty($_GET))
	{
		$ID = ($_GET["ID"]);
		echo $ID;
		$sql = "DELETE FROM customer WHERE ID='".$ID."'";
		$result = $dbconn->update($sql);
	}
?>