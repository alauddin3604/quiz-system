<?php
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
		
		?>
<div class="page-header">
    <h1>Quiz result for <?=$quizname?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle" style="vertical-align:center;height:60px;">Quiz result
		<a class="btn btn-info back" style="margin-left:unset;float:right;" href="admin_resultView.php" aria-label="View">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> BACK
		</a>
		<a class="btn btn-info back" style="margin-right:20px;margin-left:unset;float:right;" target="_blank" href="admin_resultPrint.php?quiz_host_id=<?=$_GET["quiz_host_id"]?>" aria-label="View">
			<i class="fa fa-print" aria-hidden="true"></i> PRINT
		</a>
		</p>
		
		<p class="normaltext" style="padding-left:10px; font-size:18px;">Quiz name : <?=$quizname?></p>
		<p class="normaltext" style="padding-left:10px; font-size:18px;">Quiz was hosted on : <?=$row_quizdetails['date']?></p>
		<p class="normaltext" style="padding-left:10px; font-size:18px;">Total participant are : <?=$total_participant?></p>
		<table class="dataTable table-bordered">
		<thead>
			<tr>
				<th>Ranking</th>
				<th>Student Name</th>	
				<th>Result</th>
				<th>Answering Status</th>
			</tr>
		</thead>
		<tbody>
				<?php
				while ($row=mysqli_fetch_assoc($result)){
					if($row["status"]=="0"){
						$status="Incomplete quiz";
						$style="style='color:red;'";
					}else if($row["status"]=="1"){
						$status="Completed quiz";
						$style="";
					}
				?>
				<tr>
				<td><?=$counter++?></td>
				<td><?=$row['username']?></td>
				<td><?=$row['score'].'/'.$quizquestion?></td>
				<td><span <?=$style?>><?=$status?></span></td>
				</tr>
				<?php } ?>
			
			
		</tbody>
		</table>
	</div>
	</div>
</div>

<script>
function checkpassword(ev){
	if($('#confirmpassword').val()!= $('#password').val() ){
		alert("Password and confirm password are not the same");
		ev.preventDefault();
		return false;
	}
}
</script>