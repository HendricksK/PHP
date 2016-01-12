<html>
<?php include('header.php');?>
<body>
<form method="post" action="add_dvd.php">
	<label>Add new DVD</label><br>
	Name: <input type="text" name="name" value="" required><br>
	Description: <textarea name="description" value="" required></textarea><br>
	Release Date: <input type="text" name="release_date" value="" required><br>
	Category ID: <input type="text" name="category_id" value="" required><br>
	<input type="submit">
</form>

<?php

include('database.php');

	$dbconn = new mysql_database();

	if (!empty($_POST))
	{
	   $name = $_POST["name"];
	   $description = $_POST["description"];
	   $release_date = $_POST["release_date"];
	   $category_id = $_POST["category_id"];

		$sql = "INSERT INTO dvd (name, description, release_date, category_id) 
		values ('".$name."', '".$description."', '".$release_date."', '".$category_id."')";
		
		$result = $dbconn->insert_dvd($sql);
	}

?>


</body>