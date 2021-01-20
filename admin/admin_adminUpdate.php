<?php
require '../connection.php';
$query="UPDATE admin SET id='$_POST[id]',name='$_POST[name]',password='$_POST[password]' WHERE id='$_POST[oldID]' ";
if (mysqli_query($conn,$query)){
	header('Location:admin_adminView.php');
}
else{
	echo "<script>alert('fail to update admin information!')
	window.location.href='admin_adminView.php';
	</script>";
}
?>