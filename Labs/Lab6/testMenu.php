 <!DOCTYPE HTML>
 <html>
 <head><title>Menu</title></head>
 <body>
<?php
		if($_POST){
			$value = $_POST['vals'];
		}

		if($_POST){
			include 'myClasses.php';
			$menu = new Menu($value);
		}
?>
	<form method="post" action="">
		<p>Enter values separated by a comma</p>
		<input type="text" name="vals" value="">
		<br/>
		<br/>
		<input type="submit" name="submit"><br/>
		
	</form>
 </body>
 </html>
