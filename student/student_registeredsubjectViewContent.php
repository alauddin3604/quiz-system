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
		$query="SELECT * FROM student_registration where student_id='$_SESSION[userID]' order by id ASC";
		$result=mysqli_query($conn,$query);
		$counter=1;
		?>
		<table class="dataTable table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Lecutrer</th>
				<th>Subject</th>		
				<th>Mark T/F</th>
				<th>Quiz T/F</th>
				<th>Mark Objective</th>		
				<th>Quiz Objective</th>
			</tr>
		</thead>
		<tbody>
				<?php
				while ($row=mysqli_fetch_assoc($result)){
					$sql_getworkload="SELECT * FROM workload where id ='$row[workload_id]' ";
					$sql_getsubjectname="SELECT * FROM subject where subject_code ='$row[subject_code]' ";
					$result_getworkload=mysqli_query($conn,$sql_getworkload);
					$result_getsubjectname=mysqli_query($conn,$sql_getsubjectname);
					$row_getworkload=mysqli_fetch_assoc($result_getworkload);
					$row_sql_getsubjectname=mysqli_fetch_assoc($result_getsubjectname);
					$sql_getlecturer="SELECT * FROM lecturer where id ='$row_getworkload[lecturer_id]' ";
					$result_getlecturer=mysqli_query($conn,$sql_getlecturer);
					$row_getlecturer=mysqli_fetch_assoc($result_getlecturer);
					
					/*get mark true false*/
					$sql_getmark="SELECT * FROM mark_truefalse where student_id ='$_SESSION[userID]' and workload_id = '$row[workload_id]' ";
					$result_getmark=mysqli_query($conn,$sql_getmark);
					/*get total mark for quiz*/
					$sql_gettotalmark="SELECT * FROM quiz_truefalse where workload_id='$row[workload_id]' and status='1' ";
					$result_gettotalmark=mysqli_query($conn,$sql_gettotalmark);
					$totalquestion=mysqli_num_rows($result_gettotalmark);
					$totalmark=$totalquestion*2;
					/*get total mark for quiz*/
					if (mysqli_num_rows($result_getmark)==0)
						$mark_truefalse="0<br>has not do the quiz yet";
					else{
						$row_getmark=mysqli_fetch_assoc($result_getmark);
						$mark_truefalse=$row_getmark['mark'].'/'.$totalmark;;
						if($mark_truefalse>0)
							$block_truefalse="alert('You have taken the quiz!');return false;";
						else
							$block_truefalse="";
					}
					/*end get mark true false*/
					
					/*get mark objective*/
					$sql_getmark="SELECT * FROM mark_objective where student_id ='$_SESSION[userID]' and workload_id = '$row[workload_id]' ";
					$result_getmark=mysqli_query($conn,$sql_getmark);
					$sql_gettotalmark="SELECT * FROM quiz_objective where workload_id='$row[workload_id]' and status='1' ";
					$result_gettotalmark=mysqli_query($conn,$sql_gettotalmark);
					$totalquestion=mysqli_num_rows($result_gettotalmark);
					$totalmark=$totalquestion*2;
					if (mysqli_num_rows($result_getmark)==0)
						$mark_objective="0<br>has not do the quiz yet";
					else{
						$row_getmark=mysqli_fetch_assoc($result_getmark);
						$mark_objective=$row_getmark['mark'].'/'.$totalmark;
						if($mark_objective>0)
							$block_objective="alert('You have taken the quiz!');return false;";
						else
							$block_objective="";
					}
					/*end get mark objective*/
				?>
				<tr>
				<td><?=$counter++?></td>
				<td><?=$row_getlecturer['name']?></td>
				<td><?=$row_sql_getsubjectname['subject_name']?></td>
				<td>
				<?=$mark_truefalse;?>
				</td>
				<td>
				<a class="btn btn-info" onclick="<?=$block_truefalse?>" href="student_quiztruefalse.php?workload_id=<?=$row['workload_id']?>&subject_code=<?=$row['subject_code']?>"><i class="fa fa-question-circle"></i></a>
				</td>
				<td>
				<?=$mark_objective;?>
				</td>
				<td>
				<a class="btn btn-info" onclick="<?=$block_objective?>" href="student_quizobjective.php?workload_id=<?=$row['workload_id']?>&subject_code=<?=$row['subject_code']?>"><i class="fa fa-question-circle"></i></a>
				</td>
				</tr>
				<?php } ?>
			
			
		</tbody>
		</table>
	</div>
	</div>
</div>