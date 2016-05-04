<?php 
include "../init/db.php";
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
 
 

	if(isset($_POST['new'])){
	
		if(isset($_POST['login'])){

			

			$login=$_POST['login'];
	$password=$_POST['password'];
	$name=$_POST['name'];
	$phoneNumber=$_POST['phoneNumber'];
	$sql="INSERT INTO `final`.`users` (`id`, `login`, `password`, `name`, `phones_number`) VALUES (NULL, '$login', '$password', '$name', '$phoneNumber')";
	$connection->query($sql);
	 
	$sqlCheck="SELECT * from users where login='$login' and password='$password' ";
	$queryCheck=$connection->query($sqlCheck);
	if($rowCheck=$queryCheck->fetch_object()){

		$_SESSION['user_id']=$rowCheck->id;
		if($rowCheck->id=='1'){
			 
			header("Location:../admin.php");
		}else{
			 
			header("Location:../index.php");
		}
		
		

	}else{
		header("Location:../index.php");
	}
		}elseif($_POST['new']=="good"){
			$name=$_POST['name'];
			$price=$_POST['price'];
			$size=$_POST['size'];
			$weight=$_POST['weight'];
			$description=$_POST['description'];
			$category_one=$_POST['category_one'];
			$category_two=$_POST['category_two'];
			$image1=$_POST['image1'];
			$image2=$_POST['image2'];

			if($category_one==0){
				$category_oneN=$_POST['category_oneNew'];
				$sqlC="INSERT INTO `final`.`category_one` (`id`, `name`) VALUES (NULL, '$category_one')";
				$connectiom->query($sqlC);
				$sql="select * from category_one where name=$category_oneN";
				$queryCO=$connection->query($sqlCO);
				if ( $rowC=$queryCO->fetch_object()) {
					$category_one=$rowC->id;

						}
			}
			if($category_two==0){
				$category_twoN=$_POST['category_twoNew'];
				$sqlC="INSERT INTO `final`.`category_two` (`id`, `name`) VALUES (NULL, '$category_twoN')";
				$connection->query($sqlC);
				$sql="select * from category_two where name='$category_twoN'";
				//echo $sql;
				$queryCO=$connection->query($sql);
				if ( $rowC=$queryCO->fetch_object()) {
					$category_two=$rowC->id;

						}
			}


			$sqlGood="INSERT INTO `final`.`goods` (`id`, `name`, `price`, `size`, `weight`, `description`, `category_one`, `category_two`, `image_url_big`, `image_url_small`) VALUES (NULL, '$name', '$price', '$size', '$weight', '$description' , '$category_one', '$category_two', '$image1', '$image2')";
			//echo $sqlGood ;
			$connection->query($sqlGood);
			
			header("Location:../admin.php");


		}elseif($_POST['new']=="update"){
			$id=$_POST['id'];
			$name=$_POST['name'];
			$price=$_POST['price'];
			$size=$_POST['size'];
			$weight=$_POST['weight'];
			$description=$_POST['description'];
			$category_one=$_POST['category_one'];
			$category_two=$_POST['category_two'];
			$image1=$_POST['image1'];
			$image2=$_POST['image2'];

			if($category_one==0){
				$category_oneN=$_POST['category_oneNew'];
				$sqlC="INSERT INTO `final`.`category_one` (`id`, `name`) VALUES (NULL, '$category_one')";
				$connectiom->query($sqlC);
				$sql="select * from category_one where name=$category_oneN";
				$queryCO=$connection->query($sqlCO);
				if ( $rowC=$queryCO->fetch_object()) {
					$category_one=$rowC->id;

						}
			}
			if($category_two==0){
				$category_twoN=$_POST['category_twoNew'];
				$sqlC="INSERT INTO `final`.`category_two` (`id`, `name`) VALUES (NULL, '$category_twoN','$category_one')";
				$connection->query($sqlC);
				$sql="select * from category_two where name='$category_twoN'";
				//echo $sql;
				$queryCO=$connection->query($sql);
				if ( $rowC=$queryCO->fetch_object()) {
					$category_two=$rowC->id;

						}
			}


			$sqlGood="UPDATE `final`.`goods` SET `name` = '$name', `price` = '$price', `size` = '$size', `weight` = '$weight', `description` = '$description', `category_one` = '$category_one', `category_two` = '$category_two', `image_url_big` = '$image1', `image_url_small` = '$image2' WHERE `goods`.`id` = '$id' ";
			//echo $sqlGood ;
			$connection->query($sqlGood);
			
			header("Location:../admin.php");
		}

	}
}

?>