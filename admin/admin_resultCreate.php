<?php
require '../connection.php';

$email = strtolower($_POST['id']); 
$email = str_replace(' ', '', $email); 
$email =$email."siswa.uthm.edu.my";

$sql="INSERT INTO student (id, name, password, email, modified_by, modified_on) 
VALUES ('$_POST[id]', '$_POST[name]', '$_POST[id]', '$email', '$_SESSION[userID]', CURRENT_TIMESTAMP)";
if (mysqli_query($conn,$sql)){
	header('Location:admin_studentView.php');
}
else{
	echo "<script>alert('fail to add student!')
	window.location.href='admin_studentView.php';
	</script>";
}
?>