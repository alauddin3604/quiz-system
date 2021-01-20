<?php
require '../connection.php';


$sql_check_modified_1="SELECT * from student where modified_by= '$_GET[id]' ";
$sql_check_modified_2="SELECT * from lecturer where modified_by= '$_GET[id]' ";
$sql_check_modified_3="SELECT * from subject where modified_by= '$_GET[id]' ";
$result_check_1=mysqli_query($conn,$sql_check_modified_1);
$result_check_2=mysqli_query($conn,$sql_check_modified_2);
$result_check_3=mysqli_query($conn,$sql_check_modified_3);


if (mysqli_num_rows($result_check_1)==0&&mysqli_num_rows($result_check_2)==0&&mysqli_num_rows($result_check_3)==0){
	$sql="delete from admin where id = '$_GET[id]' ";
	if (mysqli_query($conn,$sql)){
		header('Location:admin_adminView.php');
	}
	else{
		echo "<script>alert('fail to delete admin!')
		window.location.href='admin_adminView.php';
		</script>";
	}
}else{
	echo "<script>alert('The admin data is being used in other table!Thus no deletion occur')
	window.location.href='admin_adminView.php';
	</script>";
}
?>