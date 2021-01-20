<?php
require '../connection.php';
$query="UPDATE quiz_truefalse SET question='$_POST[question]',answer='$_POST[answer]',modified_by='$_SESSION[userID]',modified_on =CURRENT_TIMESTAMP WHERE id='$_POST[id]' ";
if (mysqli_query($conn,$query)){
	header("Location:lecturer_qtruefalseView.php?id=$_POST[workload_id]");
}
else{
	echo "<script>alert('fail to update question information!')
	window.location.href='lecturer_qtruefalseView.php?id=$_POST[workload_id]';
	</script>";
}
?>