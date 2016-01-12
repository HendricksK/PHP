<html>
<?php include('header.php');?>
<body>
<table>
	<tr><td>ID</td> 
	<td>Name</td> 
	<td>Description</td>
	<td>Release Date</td>
	<td>Category ID</td></tr>

<?php

include('database.php');

$dbconn = new mysql_database();

$result = $dbconn->fetch("select * from dvd");

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        echo "<tr>"."<td>" . $row["ID"]."</td>". 
        " <td>" . $row["name"]. "</td>". 
        " <td>" . $row["description"]. "</td>". 
        "<td>" . $row["release_date"] ."</td>" . 
        "<td>". $row["category_id"] ."</td>".
        "<td><form action='".$row["ID"]."' method='post'><input type='submit' value='edit'></form></td>" .
        "<td><form action='".$row["ID"]."' method='post'><input type='submit' value='delete'></form></td>";
    }
}

?>

</td></tr>
</table>

</body>
</html>