<?php
require '../connection.php';
$quizpin = md5(uniqid($your_user_login, true));
$quizpin = substr($quizpin, 0, 6);
$quizpin = strtoupper($quizpin);
$sql="INSERT INTO quiz (quiz_name,quiz_pin,createdby) 
VALUES ( '$_POST[quizname]','$quizpin', '$_SESSION[userID]')";
if (mysqli_query($conn,$sql)){
	header('Location:admin_quizView.php');
}
else{
	echo "<script>alert('fail to add quiz!')
	window.location.href='admin_quizView.php';
	</script>";
}
?>