<?php
require '../connection.php';
//print_r($_POST);
$user_answer=array();
$scheme_answer=array();
foreach($_POST as $key => $value){
    if (strstr($key, 'answer_question'))
		$user_answer[$key] = $value;
		//array_push($user_answer,$value);
}

//echo"<pre>";print_r($user_answer);echo"</pre>";
$query="SELECT * FROM quiz_truefalse where workload_id='$_POST[workload_id]' and status='1' order by id ASC";
$result=mysqli_query($conn,$query);
$question_number=mysqli_num_rows($result);
$counter=1;
while ($row=mysqli_fetch_assoc($result)){
	$scheme_answer['answer_question'.$counter] = $row['answer'];
	$counter++;
}
//echo"<pre>";print_r($scheme_answer);echo"</pre>";
$check_answer=array_diff_assoc($user_answer,$scheme_answer);
//echo"<pre>";print_r($check_answer);echo"</pre>";
$correct_answer=$question_number-count($check_answer);
$mark = $correct_answer *2 ;

$check_duplicate="SELECT * from mark_truefalse where student_id='$_SESSION[userID]' and workload_id='$_POST[workload_id]' ";
$result_checkduplicate=mysqli_query($conn,$check_duplicate);

if(mysqli_num_rows($result_checkduplicate)==0){ //means student first do the quiz
	$sql="INSERT INTO mark_truefalse (student_id, workload_id, mark,submitted_on) 
VALUES ('$_SESSION[userID]', '$_POST[workload_id]', '$mark' , CURRENT_TIMESTAMP)";
}else{ //means student do the quiz second time because first time dapat mark=0
	$sql="UPDATE mark_truefalse SET mark='$mark',submitted_on=CURRENT_TIMESTAMP WHERE student_id='$_SESSION[userID]' and workload_id='$_POST[workload_id]' ";
}
mysqli_query($conn,$sql);
echo "<script>alert('You get ".$mark." mark for the quiz for scoring ".$correct_answer." out of ".		$question_number." questions.')
	window.location.href='student_registeredsubjectView.php';
	</script>";
//header("Location:student_registeredsubjectView.php");
?>