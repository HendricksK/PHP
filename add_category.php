<html>
<?php include('header.php');?>
<body>
    <table>
        <tr><td>Category</td>
        <td>ID</td>
        <td>Actions</td>
        </tr>
<?php
$dbconn = new mysql_database();

$result = $dbconn->fetch("SELECT * FROM category");

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
        <tr><td><?php echo $row["category_name"];?></td> 
        <td><?php echo $row["Category_ID"];?></td>
        <td><form action="delete_category.php?ID=<?php echo $row["Category_ID"];?>" method="post"><input type="submit" value="delete"></form></td></tr>
    <?php }
}?>
<form method="post">
    Category name: <input type="text" name="name" value="" required><br>
    <input type="submit">
</form>

<?php
    $dbconn = new mysql_database();
    
    if (!empty($_POST))
    {
        $name = $_POST["name"];
        $sql = "INSERT INTO category (category_name) values ('".$name."')";
        $result = $dbconn->insert_category($sql);
        echo $result;
    }

?>
    <form action="index.php" method="post"><input type="submit" value="Return"></form>
</body>