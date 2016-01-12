<?php
include('database.php');

	$dbconn = new mysql_database();

	if (!empty($_POST) && !empty($_GET))
	{
	   $ID = $_GET["ID"];
	   $name = $_POST["name"];
	   $description = $_POST["description"];
	   $release_date = $_POST["release_date"];
	   $category_id = $_POST["category_id"];

		$sql = "UPDATE dvd SET name='".$name."', description='".$description."', release_date='".$release_date."', category_id='".$category_id."' WHERE id='".$ID."'";
		$result = $dbconn->update_dvd($sql);

	}
?>