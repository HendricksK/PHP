<html>
<?php include('header.php'); ?>    
<body
<?php
	$dbconn = new mysql_database();

	if(!empty($_GET))
	{
		$ID = ($_GET["ID"]);
		echo $ID;
		$sql = 'DELETE FROM customer WHERE ID='.$ID.'';;
		$result = $dbconn->delete($sql);
                echo $result;
	}
?>
<form action="customer.php" method="post"><input type="submit" value="Return"></form>
</body>
</html>