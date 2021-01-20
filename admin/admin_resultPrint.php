<?php
require('../fpdf.php');
require('../connection.php');

	
//$_GET['quiz_host_id']=1;
$query="SELECT * FROM quiz_result where quiz_host_id='$_GET[quiz_host_id]' order by score DESC";
$result=mysqli_query($conn,$query);
$total_participant=mysqli_num_rows($result);
$counter=1;
		//$row=mysqli_fetch_assoc($result);
		
$query_quizdetails="SELECT * FROM quiz_host where id='$_GET[quiz_host_id]' ";
$result_quizdetails=mysqli_query($conn,$query_quizdetails);
$row_quizdetails=mysqli_fetch_assoc($result_quizdetails);
$quiz_id=$row_quizdetails['quiz_id'];
		
$sql_quizname="SELECT * from quiz where id='$quiz_id'";
$result_quizname = mysqli_query($conn,$sql_quizname);
$row_quizname = mysqli_fetch_assoc($result_quizname);
$quizname=$row_quizname['quiz_name'];
		
$sql_quizquestion="SELECT * from quiz_question where quiz_id='$quiz_id' and status=1";
$result_quizquestion = mysqli_query($conn,$sql_quizquestion);
$quizquestion = mysqli_num_rows($result_quizquestion);
		

$result = mysqli_query($conn, $query);
$counter=0;
$array=array();
while($row=mysqli_fetch_assoc($result)) {
	if($row["status"]=="0"){
		$status="Incomplete quiz";
		$style="style='color:red;'";
	}else if($row["status"]=="1"){
		$status="Completed quiz";
		$style="";
	}
	$array[$counter][0]=$counter+1;//,$row['score'].'/'.$quizquestion);
	$array[$counter][1]=$row['username'];//,$row['score'].'/'.$quizquestion);
	$array[$counter][2]=$row['score'].'/'.$quizquestion;
	$array[$counter][3]=$status;
	$resultset[] = $array[$counter];
	$counter++;
}

$header=array("Ranking","Student Name","Result","Answering Status");


$pdf = new FPDF();
$pdf->SetTitle("Result Report Quiz $quizname");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->PrintChapter(1,$quizname);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,8,"Quiz date : $row_quizdetails[date]");
$pdf->Ln();
$pdf->Cell(0,8,"Total participant : $total_participant");
$pdf->Ln();
$pdf->Cell(0,8,"Result table",1,0,'C');
$pdf->Ln();
foreach($header as $heading) {
	//foreach($heading as $column_heading)
	$pdf->SetFont('Arial','B',12);
		$pdf->Cell(47.5,7,$heading,1,0,'C');
}
foreach($resultset as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(47.5,7,$column,1,0,'C');
}
$pdf->Output();
?>