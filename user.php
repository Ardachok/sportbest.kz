<?php

if(isset($_SESSION['user_id'])){
	$USER_DATA=NULL;
	$uid=$_SESSION['user_id'];
	$sqlCheck="SELECT * from users where id='$uid' ";
	$queryCheck=$connection->query($sqlCheck);
	if($rowCheck=$queryCheck->fetch_object()){

		$USER_DATA=$rowCheck;
		
		

	}
}

 ?>