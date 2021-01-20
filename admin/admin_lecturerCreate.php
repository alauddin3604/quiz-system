<?php
require '../connection.php';
$sql="INSERT INTO lecturer (id, name, password, modified_by, modified_on) 
VALUES ('$_POST[id]', '$_POST[name]', '$_POST[id]', '$_SESSION[userID]', CURRENT_TIMESTAMP)";
if (mysqli_query($conn,$sql)){
	header('Location:admin_lecturerView.php');
}
else{
	echo "<script>alert('fail to add lecturer!')
	window.location.href='admin_lecturerView.php';
	</script>";
}
?>