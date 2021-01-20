<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<a class="btn btn-success addstudent" style="margin-left:75%;" href="lecturer_subjectView.php" aria-label="View">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> Back
		</a>
		</p>
		<?php
		if ($_GET['quiz']=='obj'){
			$table="mark_objective";
			$heading="Result Quiz Objective";
			$quiz_table="quiz_objective";
		}else if (($_GET['quiz']=='tf')){
			$table="mark_truefalse";
			$heading="Result Quiz True/False";
			$quiz_table="quiz_truefalse";
		}
		$query="SELECT * FROM student_registration where workload_id='$_GET[workload_id]' order by id ASC";
		$result=mysqli_query($conn,$query);
		$counter=1;
		$sql_getsubjectname="SELECT * FROM subject where subject_code ='$_GET[subject_code]' ";
		$result_getsubjectname=mysqli_query($conn,$sql_getsubjectname);
		$row_sql_getsubjectname=mysqli_fetch_assoc($result_getsubjectname);
		echo "Subject Name : ".$row_sql_getsubjectname['subject_name']."<br>";
		echo "Subject Code : ".$row_sql_getsubjectname['subject_code']."<br><br>";
		
		$sql_gettotalmark="SELECT * FROM $quiz_table where workload_id='$_GET[workload_id]' and status='1' ";
		$result_gettotalmark=mysqli_query($conn,$sql_gettotalmark);
		$totalquestion=mysqli_num_rows($result_gettotalmark);
		$totalmark=$totalquestion*2;
		$pass=0;
		$fail=0;
		$notdo=0;
		?>
		<table class="dataTable table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Student Name</th>
				<th>Student ID</th>		
				<th><?=$heading?></th>
			</tr>
		</thead>
		<tbody>
				<?php
				while ($row=mysqli_fetch_assoc($result)){
					$sql_getstudent="SELECT * FROM student where id ='$row[student_id]' ";
					$result_getstudent=mysqli_query($conn,$sql_getstudent);
					$row_getstudent=mysqli_fetch_assoc($result_getstudent);
					/*get mark true false*/
					$sql_getmark="SELECT * FROM $table where student_id ='$row[student_id]' and workload_id = '$row[workload_id]'";
					$result_getmark=mysqli_query($conn,$sql_getmark);
					if (mysqli_num_rows($result_getmark)==0){
						$mark="0<br>has not do the quiz yet";
						$notdo++;
					}else{
						$row_getmark=mysqli_fetch_assoc($result_getmark);
						
						if ($row_getmark['mark']>$totalquestion/2){
							$pass++;
							$mark="<span style='color:green'>".$row_getmark['mark'].'/'.$totalmark."</span>";
						}else{
							$fail++;
							$mark="<span style='color:red'>".$row_getmark['mark'].'/'.$totalmark."</span>";
						}
						
					}
				?>
				<tr>
				<td><?=$counter++?></td>
				<td><?=$row_getstudent['name']?></td>
				<td><?=$row['student_id']?></td>
				<td>
				<?=$mark;?>
				</td>
				</tr>
				<?php } ?>
			
			
		</tbody>
		</table>
		<?php
		echo "Number of pass student : ".$pass."<br>";
		echo "Number of fail student : ".$fail."<br>";
		echo "Number of student who did not do the quiz : ".$notdo."<br>";
		?>
	</div>
	</div>
</div>