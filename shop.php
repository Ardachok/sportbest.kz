<?php 
session_start();
include "../init/db.php";
include "user.php";

if(isset($_POST['new'])){
	if($_POST['new']=="good"){
		$number=$_POST['number'];
$address=$_POST['address'];
$good_id=$_POST['good_id'];

if(isset($_SESSION['user_id'])){
	$name=$USER_DATA->name;
	$uid=$USER_DATA->id;

}else{
	$name=$_POST['name'];
	$uid=0;
}

$sql="INSERT INTO `final`.`shop` (`id`, `name`, `address`, `call`, `number`, `sold`,`user_id`,`good_id`) VALUES (NULL, '$name', '$address', 'no', '$number', 'no','$uid','$good_id')";
echo $sql;
$connection->query($sql);
header("Location:../index.php");
}

	
}elseif (isset($_POST['id'])) {
	$shid= $_POST['id'];
	$call= $_POST['call'];
	$sold= $_POST['sold'];
	$sqlU="UPDATE `final`.`shop` SET `call` = '$call', `sold` = '$sold' WHERE `shop`.`id` = '$shid'";
	$connection->query($sqlU);
	header("Location:../admin.php");
	# code...
}


?>