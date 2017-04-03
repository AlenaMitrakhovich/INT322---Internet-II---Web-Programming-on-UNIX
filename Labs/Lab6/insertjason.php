<?php
	//retrieve log in information
	$login = file('/home/int322_171d17/secret/topsecret');
	$dbserver = trim($login[0]);
	$uid = trim($login[1]);
	$pw = trim($login[2]);
	$dbname = trim($login[3]);
	
	//establish connection
	$link = mysqli_connect($dbserver, $uid, $pw, $dbname)
	or die ('Could not connect' . mysqli_error($link));

	//insert
	$sql_query = 'insert into users set username="jason@server.com",
	password="secret",
	role="user",
	passwordHint="shh, don\'t tell anyone"';
		
	$result = mysqli_query($link, $sql_query)
	or ('Query failed' . mysqli_error($link));
?>