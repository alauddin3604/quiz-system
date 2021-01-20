<?php
require '../connection.php';
$sql="UPDATE quiz_truefalse SET status= '0',modified_by='$_SESSION[userID]',modified_on =CURRENT_TIMESTAMP where id = '$_GET[id]' ";
if (mysqli_query($conn,$sql)){
	header("Location:lecturer_qtruefalseView.php?id=$_GET[workload_id]");
}
else{
	echo "<script>alert('fail to delete workload!')
	window.location.href='lecturer_qtruefalseView.php?id=$_GET[workload_id]';
	</script>";
}

?>