<?php
require '../connection.php';
$sql="INSERT INTO admin (id, name, password) 
VALUES ('$_POST[id]', '$_POST[name]', '$_POST[id]')";
if (mysqli_query($conn,$sql)){
	header('Location:admin_adminView.php');
}
else{
	echo "<script>alert('fail to add admin!')
	window.location.href='admin_adminView.php';
	</script>";
}
?>