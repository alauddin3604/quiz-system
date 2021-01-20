<?php
require '../connection.php';
$query="UPDATE student SET id='$_POST[id]',name='$_POST[name]',email='$_POST[email]',password='$_POST[password]',modified_by ='$_SESSION[userID]',modified_on = CURRENT_TIMESTAMP  WHERE id='$_POST[oldID]' ";
if (mysqli_query($conn,$query)){
	header('Location:admin_studentView.php');
}
else{
	echo "<script>alert('fail to update student!')
	window.location.href='admin_studentView.php';
	</script>";
}
?>