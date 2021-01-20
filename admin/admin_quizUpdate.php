<?php
require '../connection.php';
$query="UPDATE quiz SET quiz_name='$_POST[quizname]' WHERE id='$_POST[id]' ";
if (mysqli_query($conn,$query)){
	header('Location:admin_quizView.php');
}
else{
	echo "<script>alert('fail to update quiz information!')
	window.location.href='admin_quizView.php';
	</script>";
}
?>