<?php
require 'connection.php';

	$query="SELECT * FROM user where username='$_POST[username]' and password='$_POST[password]' ";
	$landingpage='homepage.php';
	//$account_type='admin';
	$errorCode='1';


$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)==0){ //means no matching result found
	$landingpage='homepage.php?mess='.$errorCode;
} else {
	$row = mysqli_fetch_assoc($result);
	$_SESSION['userID']=$row['id'];
	$_SESSION['username']=$row['username'];
	//$_SESSION['account_type']=$account_type;
	
	$landingpage='homepage.php';
}

header('Location: '.$landingpage);
exit;
?>