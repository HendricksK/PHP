<html>
    <?php include('header.php');?>
<body>
<?php


	$dbconn = new mysql_database();

	if(!empty($_GET))
	{
		$ID = ($_GET["dvd_id"]);
		$sql = 'DELETE FROM dvd WHERE ID='.$ID.'';
		$result = $dbconn->delete_dvd($sql);
                echo $result;
	}
?>

<form action="dvd.php" method="post"><input type="submit" value="Return"></form>
</body>
</html>