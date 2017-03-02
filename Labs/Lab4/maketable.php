<?php
 
	$cxn = mysqli_connect("db-mysql.zenit", "int322_171d17", "gkEG9753", "int322_171d17");

	if (mysqli_connect_errno()){
	  echo "Connection Failed: " . mysqli_connect_error();
	}

	$sql_query="CREATE TABLE fsossregister2(id int(11) AUTO_INCREMENT, firstname VARCHAR(30), lastname VARCHAR(30), sex VARCHAR(2), 
	checkyes VARCHAR(3), checkno VARCHAR(2), number VARCHAR(3), size VARCHAR(2), PRIMARY KEY(id))";

	if (mysqli_query($cxn, $sql_query))
	{
		echo "Table created";
	}
	else
	{
		echo "Error: " . mysqli_error($cxn);
	}
?>