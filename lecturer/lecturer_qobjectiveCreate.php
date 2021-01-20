<?php
require '../connection.php';
$sql="INSERT INTO quiz_objective (workload_id,question,option_1,option_2,option_3,option_4,answer,modified_by,modified_on) 
VALUES ('$_POST[workload_id]','$_POST[question]','$_POST[option_1]','$_POST[option_2]','$_POST[option_3]','$_POST[option_4]', '$_POST[answer]','$_SESSION[userID]',CURRENT_TIMESTAMP)";

if (mysqli_query($conn,$sql)){
	header("Location:lecturer_qobjectiveView.php?id=$_POST[workload_id]");
}
else{
	echo "<script>alert('fail to add question!')
	window.location.href='lecturer_qobjectiveView.php?id=$_POST[workload_id];
	</script>";
}
?>