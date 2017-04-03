<?php
 class DB_link {
  private $link;
  private $result;
  
  public 
  
  //connect
  function __construct ($dbserver, $uid, $pw, $dbname) {
	  
   $link = mysqli_connect ($dbserver, $uid, $pw, $dbname)
   or die('Could not connect: ' . mysqli_error($link));
   
   $this -> link = $link;
  }
  
  //close connection
  function __destruct() {
	   
  mysqli_close ($this -> link);
   
  }
   
  //query
  function query ($sql_query) {
   $result = mysqli_query ($this-> link, $sql_query)
   or die('Query failed' . mysqli_error($this->link));
   $this-> result = $result;
   return $result;
  } 
  
  //display
  function display($result) {
	  if(!$this->emptyResult()){
		  while($row = mysqli_fetch_assoc($result)){
			  foreach($row as $key => $value){
				  echo $key . " is " . $value . "<br>";
			  }
		  }
	  }else{
		  echo "No results found<br>";
	  }
	  
  }
  
  //returns true if the last result set returned from the DB had no records in it
  //otherwise, it should return false (meaning there are records in the result set)
  function emptyResult() {
	  if(mysqli_num_rows($this->result) > 0){
		  return false;
	  }else{
		  return true;
	  }
	  
  }
 }//end of class DB_link
  
  //class Menu
  class Menu{
	  public
	  
	  function __construct ($value){	

		$info = explode(",", $value);
		for($x = 0; $x < count($info); $x++){
			if(isset($info[$x])){
				echo $x+1 . ". ";
				echo $info[$x];
				echo "<br>";
			}
		}
		
	  }  
  }//end of class Menu
?>