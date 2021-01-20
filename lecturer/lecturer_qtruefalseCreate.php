<?php
require '../connection.php';
$sql="INSERT INTO quiz_truefalse (workload_id,question,answer,modified_by,modified_on) 
VALUES ('$_POST[workload_id]','$_POST[question]', '$_POST[answer]','$_SESSION[userID]',CURRENT_TIMESTAMP)";

if (mysqli_query($conn,$sql)){
	header("Location:lecturer_qtruefalseView.php?id=$_POST[workload_id]");
}
else{
	echo "<script>alert('fail to add question!')
	window.location.href='lecturer_qtruefalseView.php?id=$_POST[workload_id];
	</script>";
}
?>