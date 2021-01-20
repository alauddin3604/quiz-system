<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<a class="btn btn-success addstudent" style="margin-left:75%;" href="lecturer_qobjectiveAdd.php?id=<?php echo$_GET['id']?>" aria-label="View">
			<i class="fa fa-plus" aria-hidden="true"></i> Add question
		</a>
		</p>
		<?php
		$query="SELECT * FROM quiz_objective where workload_id='$_GET[id]' and status=1 order by id ASC";
		$result=mysqli_query($conn,$query);
		$counter=1;
		?>
		<table class="dataTable table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Question</th>
				<th>Option A</th>
				<th>Option B</th>
				<th>Option C</th>
				<th>Option D</th>
				<th>Answer</th>		
				<th>Modified By</th>		
				<th>Modified On</th>		
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
				<?php
				while ($row=mysqli_fetch_assoc($result)){
					$query_lecturerName="SELECT * FROM lecturer where id='$row[modified_by]' order by id ASC";
					$result_lecturerName=mysqli_query($conn,$query_lecturerName);
					$row_lecturerName=mysqli_fetch_assoc($result_lecturerName);
					$lecturerName=$row_lecturerName['name'];
				?>
				<tr>
				<td><?=$counter++?></td>
				<td><?=$row['question']?></td>
				<td><?=$row['option_1']?></td>
				<td><?=$row['option_2']?></td>
				<td><?=$row['option_3']?></td>
				<td><?=$row['option_4']?></td>
				<td><?=$row['answer']?></td>
				<td><?=$lecturerName?></td>
				<td><?=$row['modified_on']?></td>
				<td>
				<a class="btn btn-info" href="lecturer_qobjectiveEdit.php?id=<?=$row['id']?>&workload_id=<?=$row['workload_id']?>"><i class="fa fa-edit"></i></a>
				<a class="btn btn-danger" onclick="return confirm('Are you sure to delete this question?');" href="lecturer_qobjectiveDelete.php?id=<?=$row['id']?>&workload_id=<?=$row['workload_id']?>"><i class="fa fa-trash"></i></a>
				</td>
				</tr>
				<?php } ?>
			
			
		</tbody>
		</table>
	</div>
	</div>
</div>