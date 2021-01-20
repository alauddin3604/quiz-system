<?php
require '../connection.php';
//$sql_check="SELECT * from workload where quiz_code= '$_GET[id]' ";
//$result_check=mysqli_query($conn,$sql_check);
//$rowcount_check = mysqli_num_rows($result_check);


//if ($rowcount_check==0){
	//$sql="delete from quiz where quiz_code = '$_GET[id]' ";
	$sql="UPDATE quiz SET status='0' WHERE id='$_GET[id]' ";
	if (mysqli_query($conn,$sql)){
		header('Location:admin_quizView.php');
	}
	else{
		echo "<script>alert('fail to delete quiz!')
		window.location.href='admin_quizView.php';
		</script>";
	}
//}
//else{
	//echo "<script>alert('The quiz has lecturer working under it!Thus no deletion occur')
	//window.location.href='admin_quizView.php';
	//</script>";
//}
?>