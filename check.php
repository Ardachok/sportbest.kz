<?php 
include "../init/db.php";
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
	$login=$_POST['login'];
	$password=$_POST['password'];
	$sqlCheck="SELECT * from users where login='$login' and password='$password' ";
	$queryCheck=$connection->query($sqlCheck);
	if($rowCheck=$queryCheck->fetch_object()){

		$_SESSION['user_id']=$rowCheck->id;
		if($rowCheck->id=='1'){
			 
			header("Location:../admin.php");
		}else{
			 
			header("Location:../index.php");
		}
		
		

	}
}
?>