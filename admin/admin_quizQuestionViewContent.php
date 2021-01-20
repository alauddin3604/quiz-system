<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<a class="btn btn-success addstudent" style="margin-left:75%;" href="admin_quizQuestionAdd.php?id=<?php echo$_GET['id']?>" aria-label="View">
			<i class="fa fa-plus" aria-hidden="true"></i> Add question
		</a>
		</p>
		<?php
		$query="SELECT * FROM quiz_question where quiz_id='$_GET[id]' and status=1 order by id ASC";
		$result=mysqli_query($conn,$query);
		$counter=1;
		?>
		<p style="padding-left:10px; font-size:15px;color:black;"><i class="fa fa-info-circle" aria-hidden="true"></i>
			The correct answer is shown in green column</p>
		<table class="dataTable table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Question</th>
				<th>Option A</th>
				<th>Option B</th>
				<th>Option C</th>
				<th>Option D</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
				<?php
				while ($row=mysqli_fetch_assoc($result)){
					/*$query_lecturerName="SELECT * FROM lecturer where id='$row[modified_by]' order by id ASC";
					$result_lecturerName=mysqli_query($conn,$query_lecturerName);
					$row_lecturerName=mysqli_fetch_assoc($result_lecturerName);
					$lecturerName=$row_lecturerName['name'];*/
				?>
				<tr>
				<td><?=$counter++?></td>
				<td><?=$row['question']?></td>
				<td <?php if ($row['answer']=='A') {echo "style='background-color:lightgreen'";}?>><?=$row['option_1']?></td>
				<td <?php if ($row['answer']=='B') {echo "style='background-color:lightgreen'";}?>><?=$row['option_2']?></td>
				<td <?php if ($row['answer']=='C') {echo "style='background-color:lightgreen'";}?>><?=$row['option_3']?></td>
				<td <?php if ($row['answer']=='D') {echo "style='background-color:lightgreen'";}?>><?=$row['option_4']?></td>
				<td>
				<a class="btn btn-info" href="admin_quizQuestionEdit.php?id=<?=$row['id']?>&quiz_id=<?=$row['quiz_id']?>"><i class="fa fa-pencil"></i></a>
				<a class="btn btn-danger" onclick="return confirm('Are you sure to delete this question?');" href="admin_quizQuestionDelete.php?id=<?=$row['id']?>&quiz_id=<?=$row['quiz_id']?>"><i class="fa fa-trash"></i></a>
				</td>
				</tr>
				<?php } ?>
			
			
		</tbody>
		</table>
	</div>
	</div>
</div>