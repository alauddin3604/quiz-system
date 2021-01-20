<?php
require '../connection.php';

$check_register="SELECT * FROM student_registration where subject_code='$_GET[subject_code]' and student_id='$_SESSION[userID]'";//
$result_checkregister=mysqli_query($conn,$check_register);
if(mysqli_num_rows($result_checkregister)==0){//means student did not register for this subject
	$sql="INSERT INTO student_registration (workload_id, subject_code,student_id) 
	VALUES ('$_GET[id]', '$_GET[subject_code]','$_SESSION[userID]')";
	mysqli_query($conn,$sql);
	echo "<script>alert('Successfully register for this subject!')";
	header('Location:student_subjectView.php');
}else{
	echo "<script>alert('You already registered for this subject!')
	window.location.href='student_subjectView.php';
	</script>";
}
?>