<?php
		$query="SELECT * FROM quiz_result where userid='$_SESSION[userID]' order by id DESC";
		$result=mysqli_query($conn,$query);
		
		$counter=1;
		//$row=mysqli_fetch_assoc($result);
		
		/**/
		
		
		
		?>
<div class="page-header">
    <h1>My quiz result</h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle">My quiz result
		
		</p>
		
		<!--p class="normaltext" style="padding-left:10px; font-size:18px;">Quiz name : <?=$quizname?></p>
		<p class="normaltext" style="padding-left:10px; font-size:18px;">Quiz was hosted on : <?=$row_quizdetails['date']?></p>
		<p class="normaltext" style="padding-left:10px; font-size:18px;">Total participant are : <?=$total_participant?></p-->
		<table class="dataTable table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Date</th>	
				<th>Hosted by</th>	
				<th>Quiz Name</th>	
				<th>Result</th>
				<th>Answering Status</th>
			</tr>
		</thead>
		<tbody>
				<?php
				while ($row=mysqli_fetch_assoc($result)){
					$sql_quizname="SELECT * from quiz where id='$row[quiz_id]'";
					$result_quizname = mysqli_query($conn,$sql_quizname);
					$row_quizname = mysqli_fetch_assoc($result_quizname);
					$quizname=$row_quizname['quiz_name'];
					
					$sql_quizquestion="SELECT * from quiz_question where quiz_id='$row[quiz_id]' and status=1";
					$result_quizquestion = mysqli_query($conn,$sql_quizquestion);
					$quizquestion = mysqli_num_rows($result_quizquestion);
					
					$query_quizdetails="SELECT * FROM quiz_host where id='$row[quiz_host_id]' ";
					$result_quizdetails=mysqli_query($conn,$query_quizdetails);
					$row_quizdetails=mysqli_fetch_assoc($result_quizdetails);
					$date=$row_quizdetails['date'];
					$userid=$row_quizdetails['userid'];
					
					$query_username="SELECT * FROM user where id='$userid' ";
					$result_username=mysqli_query($conn,$query_username);
					$row_username=mysqli_fetch_assoc($result_username);
					$username=$row_username['username'];
					
					
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
				<td><?=$date?></td>
				<td><?=$username?></td>
				<td><?=$quizname?></td>
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