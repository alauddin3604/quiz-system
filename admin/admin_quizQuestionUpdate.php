<?php
require '../connection.php';
$query="UPDATE quiz_question SET question='$_POST[question]',option_1='$_POST[option_1]',option_2='$_POST[option_2]',option_3='$_POST[option_3]',option_4='$_POST[option_4]',answer='$_POST[answer]' WHERE id='$_POST[id]' ";
if (mysqli_query($conn,$query)){
	header("Location:admin_quizQuestionView.php?id=$_POST[quiz_id]");
}
else{
	echo "<script>alert('fail to update question information!')
	window.location.href='admin_quizQuestionView.php?id=$_POST[quiz_id]';
	</script>";
}
?>