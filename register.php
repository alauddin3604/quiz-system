<?php
require 'connection.php';

$sql="INSERT INTO user (username, password) 
VALUES ('$_POST[username]', '$_POST[password]')";


if (mysqli_query($conn,$sql)){
	/*$current_id = mysqli_insert_id($conn);
	$query="INSERT INTO shoppingcart (userid) VALUES ($current_id)";
	mysqli_query($conn,$query);*/
	header('Location:homepage.php');
}
else{
	echo "<script>alert('Fail to Register Account!')
	window.location.href='signup.php';
	</script>";
}
?>