<html>
<?php include('header.php');?>
<body>
<?php

if (!empty($_GET))
{
   $ID = ($_GET["ID"]);
   
   $dbconn = new mysql_database();
   
   $id = octdec($ID);; 
    $result = $dbconn->fetch("SELECT * FROM dvd where ID=$id");
   
   if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
                echo '<form method="post" action="edit_dvd.php?ID='.$row["ID"].'">
                Name: <input type="text" name="name" value="'.$row["name"].'" required><br>
                Description: <textarea name="description" value required>"'.$row["description"].'"</textarea><br>
                Release Date: <input type="text" name="release_date" value="'.$row["release_date"].'" required><br>
                Category ID: <input type="text" name="category_id" value="'.$row["category_id"].'" required><br>
                <input type="submit">
                </form>';
            }
        }
   }
else
{
   //echo "<p>not clicked";
}



	if (!empty($_POST) && !empty($_GET))
	{
	   $ID = $_GET["ID"];
	   $name = $_POST["name"];
	   $description = $_POST["description"];
	   $release_date = $_POST["release_date"];
	   $category_id = $_POST["category_id"];

		$sql = "UPDATE dvd SET name='".$name."', description='$description', release_date='".$release_date."', category_id='".$category_id."' WHERE id='".$ID."' ";
		$result = $dbconn->update_dvd($sql);
                echo $result;
	}
?>
    <form action="dvd.php" method="post"><input type="submit" value="Return"></form>
</body>
</html>