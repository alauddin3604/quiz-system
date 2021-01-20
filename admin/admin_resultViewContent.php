<div class="page-header">
    <h1>View quiz result</h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle">Quiz result List
		</p>
		<?php
		$query="SELECT * FROM quiz_host where userid='$_SESSION[userID]' and (status='3' or status='2') order by id DESC";
		$result=mysqli_query($conn,$query);
		
		?>
		<table class="dataTable table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Quiz Name</th>
				<th>Hosted On</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
				<?php
				$counter=1;
				while ($row=mysqli_fetch_assoc($result)){
					$sql_quizname="SELECT * from quiz where id='$row[quiz_id]'";
					$result_quizname = mysqli_query($conn,$sql_quizname);
					$row_quizname = mysqli_fetch_assoc($result_quizname);
					$quizname=$row_quizname['quiz_name'];
				?>
				<tr>
				<td><?=$counter++;?></td>
				<td><?=$quizname?></td>
				<td><?=$row['date']?></td>
				<td>
				<a class="btn btn-info" href="admin_resultDetailsView.php?quiz_host_id=<?=$row['id']?>"><i class="fa fa-eye"></i></a>
				<a class="btn btn-danger" onclick="return confirm('Are you sure to delete this quiz result?');" href="admin_resultDelete.php?id=<?=$row['id']?>"><i class="fa fa-trash"></i></a>
				</td>
				</tr>
				<?php } ?>
			
			
		</tbody>
		</table>
	</div>
	</div>
</div>