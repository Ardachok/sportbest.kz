<?php 
include "../init/db.php";
session_start();
	if($_POST['act']=='findLogin'){


			
			$login=$_POST['login'];
			$password=$_POST['password'];

		$sql="Select * from users  where login=\"".$login."\"  ";

		$query=$connection->query($sql);
		if ($row=$query->fetch_object()) {
			
			echo "1";


		}else{
			echo "0";
		}

	}
?>