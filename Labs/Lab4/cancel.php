<?php
	$dbserver = "db-mysql.zenit";
	$uid = "int322_171d17";
	$pw = "gkEG9753";
	$dbname = "int322_171d17";
      
	$link = mysqli_connect($dbserver, $uid, $pw, $dbname)
	or die('Could not connect: ' . mysqli_error($link));
	
	$sql_query = "SELECT * FROM fsossregister2";
				
	$result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));   

if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql_query = 'DELETE FROM fsossregister2 WHERE id = "' . $id . '"';
	$result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));      
} else {
	echo "error";
}
mysqli_close($link);
header('Location:table.php');
?>
