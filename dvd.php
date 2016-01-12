<html>
<?php include('header.php');?>
<body>
<table>
	<tr><td>ID</td> 
	<td>Name</td> 
	<td>Description</td>
	<td>Release Date</td>
	<td>Category name</td></tr>

<?php

include('database.php');

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

<?php


if (isset($_GET["dvd_id"]))
{
   $id = ($_GET["dvd_id"]);

   $dbconn = new mysql_database();

   $result = $dbconn->fetch("select * from dvd where ID=".$id."");
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

if(isset($_GET["edit_dvd_status"])){
    $status = ($_GET["edit_dvd_status"]);
    if($status == "success"){
        echo "Customer successfully updated";
    }
}

if(isset($_GET["add_dvd_status"])){
    $status = ($_GET["add_dvd_status"]);
    if($status == "success"){
        echo "Customer successfully added to database";
    }
}

if(isset($_GET["delete_customer_status"])){
    $status = ($_GET["delete_customer_status"]);
    if($status == "success"){
        echo "Customer successfully deleted from database";
    }
}

?>

<form action="add_dvd.php" method="post"><input type="submit" value="Add DVD"></form>

</body>
</html>