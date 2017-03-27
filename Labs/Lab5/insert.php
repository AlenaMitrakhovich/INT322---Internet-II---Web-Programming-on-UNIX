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
	$sql_query = 'insert into users set username="alena@hotmail.com",
	password="Password1!",
	role="user",
	passwordHint="number one"';
		
	$result = mysqli_query($link, $sql_query)
	or ('Query failed' . mysqli_error($link));
	
	$sql_query = 'insert into users set username="alex@hotmail.com",
	password="Password2!",
	role="user",
	passwordHint="number two"';
		
	$result = mysqli_query($link, $sql_query)
	or ('Query failed' . mysqli_error($link));
	
	$sql_query = 'insert into users set username="joey@hotmail.com",
	password="Password3!",
	role="user",
	passwordHint="number three"';
		
	$result = mysqli_query($link, $sql_query)
	or ('Query failed' . mysqli_error($link));
?>