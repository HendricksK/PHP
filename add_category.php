<html>
<?php include('header.php');?>
<body>
    <table>
        <tr><td>Category</td>
        <td>ID</td>
        </tr>
<?php
$dbconn = new mysql_database();

$result = $dbconn->fetch("SELECT * FROM category");

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        echo "<tr>"."<td>" . $row["category_name"]."</td>". 
        "<td>" . $row["Category_ID"]. "</td>";
    }
}


?>
<form method="post" action="add_category.php">
	Category name: <input type="text" name="name" value="" required><br>
	<input type="submit">
</form>

<?php
    $dbconn = new mysql_database();
    
    if (!empty($_POST))
    {
        $name = $_POST["name"];
        $sql = "INSERT INTO category (category_name) values ('".$name."')";
        $result = $dbconn->insert($sql);
        echo $result;
    }

?>
    <form action="index.php" method="post"><input type="submit" value="Return"></form>
</body>