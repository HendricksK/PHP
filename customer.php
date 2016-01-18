<html>
<?php include('header.php');?>
<body>
<table>
	<tr><td>ID</td> 
	<td>Name</td> 
	<td>Surname</td>
	<td>Contact Number</td>
	<td>Email</td>
	<td>SA ID Number</td>
	<td>Address</td>
	<td>Actions</td></tr>
<?php 
$dbconn = new mysql_database();

$result = $dbconn->fetch("select * from customer");

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
        <tr><td><?php echo $row["ID"];?></td> 
        <td><?php echo $row["name"];?></td> 
        <td><?php echo $row["surname"];?></td> 
        <td><?php echo $row["contact_number"];?></td> 
        <td><?php echo $row["email"];?></td>
        <td><?php echo $row["sa_id_number"];?></td>
        <td><?php echo $row["address"];?>
        <td><form action="customer.php?customer_ID=<?php echo $row["ID"];?>" method="post"><input type="submit" value="edit"></form></td>
        <td><form action="delete_customer.php?ID=<?php echo $row["ID"];?>" method="post"><input type="submit" value="delete"></form></td>
    <?php }
} ?>

</tr></table>

<?php

if (isset($_GET["customer_ID"]))
{
   $id = ($_GET["customer_ID"]);

   $result = $dbconn->fetch("select * from customer where ID=".$id."");
   
   if ($result->num_rows > 0) {

   		while($row = $result->fetch_assoc()) {
       		?>
       		<form method="post" action="edit_customer.php?ID=<?php echo $row["ID"];?>">
                    Name: <input type="text" name="name" value="<?php echo $row["name"];?>" required><br>
                    Surname: <input type="text" name="surname" value="<?php echo $row["surname"];?>" required><br>
                    Contact: <input type="text" name="contact_number" value="<?php echo $row["contact_number"];?>" required><br>
                    E-mail: <input type="text" name="email" value="<?php echo $row["email"];?>" required><br>
                    RSA ID: <input type="text" name="sa_id_number" value="<?php echo $row["sa_id_number"];?>" required><br>
                    Address: <input type="text" name="address" value="<?php echo $row["address"];?>" required><br>
                    <input type="submit">
		</form> <?php
    	}
   }
} ?>

        <form action="add_customer.php" method="post"><input type="submit" value="Add Customer"></form>
    </body>
</html>