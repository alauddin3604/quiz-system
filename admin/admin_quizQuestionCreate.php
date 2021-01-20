<?php
require '../connection.php';
$sql="INSERT INTO quiz_question (quiz_id,question,option_1,option_2,option_3,option_4,answer) 
VALUES ('$_POST[quiz_id]','$_POST[question]','$_POST[option_1]','$_POST[option_2]','$_POST[option_3]','$_POST[option_4]', '$_POST[answer]')";

if (mysqli_query($conn,$sql)){
	header("Location:admin_quizQuestionView.php?id=$_POST[quiz_id]");
}
else{
	echo "<script>alert('fail to add question!')
	window.location.href='admin_quizQuestionView.php?id=$_POST[quiz_id];
	</script>";
}
?>