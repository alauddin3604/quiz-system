<?php
require '../connection.php';
$query="UPDATE quiz_objective SET question='$_POST[question]',option_1='$_POST[option_1]',option_2='$_POST[option_2]',option_3='$_POST[option_3]',option_4='$_POST[option_4]',answer='$_POST[answer]',modified_by='$_SESSION[userID]',modified_on =CURRENT_TIMESTAMP WHERE id='$_POST[id]' ";
if (mysqli_query($conn,$query)){
	header("Location:lecturer_qobjectiveView.php?id=$_POST[workload_id]");
}
else{
	echo "<script>alert('fail to update question information!')
	window.location.href='lecturer_qobjectiveView.php?id=$_POST[workload_id]';
	</script>";
}
?>