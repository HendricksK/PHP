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
        "<td><form action=edit_dvd.php?ID='".$row["ID"]."' method='post'><input type='submit' value=edit></form></td>" .
        "<td><form action=delete_dvd.php?dvd_id='".$row["ID"]."' method='post'><input type='submit' value='delete'></form></td>";
    }
}
?>

</td></tr>
</table>

<form action="add_dvd.php" method="post"><input type="submit" value="Add DVD"></form>

</body>
</html>