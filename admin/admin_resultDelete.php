<?php
require '../connection.php';
/*$sql_check="SELECT * from quiz_host_id where student_id= '$_GET[id]' ";
$result_check=mysqli_query($conn,$sql_check);
$rowcount_check = mysqli_num_rows($result_check);


if ($rowcount_check==0){*/
	$sql="delete from quiz_host where id ='$_GET[id]' ";
	if (mysqli_query($conn,$sql)){
		header('Location:admin_resultView.php');
	}
	else{
		echo "<script>alert('fail to delete quiz!')
		window.location.href='admin_resultView.php';
		</script>";
	}
/*}else{
	echo "<script>alert('The student has registered under some subjects!Thus no deletion occur')
	window.location.href='admin_studentView.php';
	</script>";
}*/
?>