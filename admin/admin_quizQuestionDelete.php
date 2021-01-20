<?php
require '../connection.php';
$sql="UPDATE quiz_question SET status= '0' where id = '$_GET[id]' ";

if (mysqli_query($conn,$sql)){
	header("Location:admin_quizQuestionView.php?id=$_GET[quiz_id]");
}
else{
	echo "<script>alert('fail to delete quiz question!')
	window.location.href='admin_quizQuestionView.php?id=$_GET[quiz_id]';
	</script>";
}

?>