<html>

<body>
<table border="1">
	<tr>
		<th>First Name</th>
		<th>Last Name</th>	
		<th>Sex</th>
		<th>Multiple</th>
		<th>Multiple</th>
		<th>Quantity</th>
		<th>Size</th>
		<th>Cancel</th>
		<th>Edit</th>
		<th>Available</th>
	</tr>

	
<?php
	$dbserver = "db-mysql.zenit";
	$uid = "int322_171d17";
	$pw = "gkEG9753";
	$dbname = "int322_171d17";
      
    $link = mysqli_connect($dbserver, $uid, $pw, $dbname)
	or die('Could not connect: ' . mysqli_error($link));
    $sql_query = "SELECT * FROM fsossregister2";
		
    $result = mysqli_query($link, $sql_query) or die('query failed'. mysqli_error($link));
						
    while($row = mysqli_fetch_assoc($result))
 	{
?>
	<tr>
		<td><?php print $row['firstname']; ?></td>
		<td><?php print $row['lastname']; ?></td>
		<td><?php print $row['sex']; ?></td>
		<td><?php print $row['checkyes']; ?></td>
		<td><?php print $row['checkno']; ?></td>
		<td><?php print $row['number']; ?></td>
		<td><?php print $row['size']; ?></td>
		<td><a href="cancel.php?id=<?php echo $row['id'];?>">Cancel</a></td>
		<td><a href="edit.php?id=<?php echo $row['id'];?>">Edit</a></td>       
        <?php  $sold += $row['number']; ?>
<?php
}
?>	
		<td> <?php print 200 - $sold ;?></td>
	</tr>
</table>
<?php mysqli_free_result($result);
      mysqli_close($link); ?>
<a href="http://zenit.senecac.on.ca:13634/cgi-bin/lab4v2/fsosstshirt.php">Form</a>

</body>
</html>