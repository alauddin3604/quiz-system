<?php
require '../connection.php';
$sql_check="SELECT * from workload where lecturer_id= '$_GET[id]' ";
$result_check=mysqli_query($conn,$sql_check);
$rowcount_check = mysqli_num_rows($result_check);


if ($rowcount_check==0){
	$sql="delete from lecturer where id = '$_GET[id]' ";
	if (mysqli_query($conn,$sql)){
		header('Location:admin_lecturerView.php');
	}
	else{
		echo "<script>alert('fail to delete lecturer!')
		window.location.href='admin_lecturerView.php';
		</script>";
	}
}else{
	echo "<script>alert('The lecturer has been assigned to workload!Thus no deletion occur')
	window.location.href='admin_lecturerView.php';
	</script>";
}
?>