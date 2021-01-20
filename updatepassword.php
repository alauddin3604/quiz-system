<?php
require 'connection.php';

if($_SESSION['account_type'] == 'admin' ){
	$query="UPDATE admin SET password='$_POST[password]', firstlogin='0' WHERE id='$_SESSION[userID]' ";
	$landingpage='admin/admin_subjectView.php';
}
else if($_SESSION['account_type'] == 'lecturer' ){
	$query="UPDATE lecturer SET password='$_POST[password]', firstlogin='0' WHERE id='$_SESSION[userID]' ";
	$landingpage='lecturer/lecturer_subjectView.php';
	
}else if($_SESSION['account_type'] == 'student' ){
	$query="UPDATE student SET password='$_POST[password]', firstlogin='0' WHERE id='$_SESSION[userID]' ";
	$landingpage='student/student_subjectView.php';
	
}
mysqli_query($conn,$query);
header('Location: '.$landingpage);
exit;
?>