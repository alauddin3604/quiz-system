<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<!--a class="btn btn-success addstudent" style="margin-left:65%;" href="student_subjectAdd.php" aria-label="View">
			<i class="fa fa-plus" aria-hidden="true"></i> View registered subject
		</a-->
		</p>
		<?php
		$query="SELECT * FROM quiz_truefalse where workload_id='$_GET[workload_id]' and status='1' order by id ASC";
		$result=mysqli_query($conn,$query);
		$rowcount=mysqli_num_rows($result);
		/*if quiz question is not ready*/
		if($rowcount==0){
			echo "<script>alert('The quiz question is not ready yet. Please come back later')
				window.location.href='student_registeredsubjectView.php';
				</script>";
			exit;
		}
		/*if the quiz has 0 question redirect user back to previous page*/
		$counter=1;
		$query_getsubjectcode="SELECT * FROM subject where subject_code ='$_GET[subject_code]' ";
		$result_getsubjectcode=mysqli_query($conn,$query_getsubjectcode);
		$row_getsubjectcode=mysqli_fetch_assoc($result_getsubjectcode);
		echo "Subject Name : ".$row_getsubjectcode['subject_name']."<br>";
		echo "Subject Code : ".$row_getsubjectcode['subject_code']."<br><br>";
		?>
		<form action="student_quiztruefalseSubmit.php" method="post">
		<input type="hidden" id="workload_id" name="workload_id" value="<?=$_GET['workload_id']?>">
		<input type="hidden" id="subject_code" name="subject_code" value="<?=$_GET['subject_code']?>">
		<table class="dataTable table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Question</th>
				<th>True or False</th>		
				
			</tr>
		</thead>
		<tbody>
				<?php
				while ($row=mysqli_fetch_assoc($result)){
					
				?>
				<tr>
				<td><?=$counter?></td>
				<td><?=$row['question']?></td>
				<td>
				<label><input type="radio" name="answer_question<?=$counter?>" required value="true">True</label><br>
				<label><input type="radio" name="answer_question<?=$counter?>" value="false">False</label>
				</td>
				</tr>
				<?php 
				$counter++;
				} ?>
				<tr>
				<td style="visibility: hidden;"><?=$counter++;?></td>
				<td style="visibility: hidden;"></td>
				<td align="center">
				<button  class="btn btn-info" aria-label="View">
					<i class="fa fa-paper-plane" aria-hidden="true"></i> SUBMIT
				</button>
				</td>
				</tr>
			
		</tbody>
		</table>
		</form>
	</div>
	</div>
</div>