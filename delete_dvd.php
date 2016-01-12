<?php
include('header.php');
include('database.php');

	$dbconn = new mysql_database();

	if(!empty($_GET))
	{
		$ID = ($_GET["dvd_id"]);
		echo $ID;
		$sql = 'DELETE FROM dvd WHERE ID='.$ID.'';
		$result = $dbconn->delete_dvd($sql);
	}
?>