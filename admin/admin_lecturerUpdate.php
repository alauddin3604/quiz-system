<?php
require '../connection.php';
$query="UPDATE lecturer SET id='$_POST[id]',name='$_POST[name]',password='$_POST[password]',modified_by ='$_SESSION[userID]',modified_on =CURRENT_TIMESTAMP  WHERE id='$_POST[oldID]' ";
if (mysqli_query($conn,$query)){
	header('Location:admin_lecturerView.php');
}
else{
	echo "<script>alert('fail to update lecturer information!')
	window.location.href='admin_lecturerView.php';
	</script>";
}
?>