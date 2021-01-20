<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<!--a class="btn btn-success addstudent" href="admin_subjectAdd.php" aria-label="View">
			<i class="fa fa-plus" aria-hidden="true"></i> Add subject
		</a-->
		</p>
		<?php
		$query="SELECT * FROM workload where lecturer_id ='$_SESSION[userID]' and status='1' order by id ASC";
		$result=mysqli_query($conn,$query);
		$counter=1;
		?>
		<table class="dataTable table-bordered">
		<thead>
			<tr>
				<th>No</th>
				
				<th>Subject Name</th>		
				<th>True/False</th>		
				<th>Objective</th>			
				
			</tr>
		</thead>
		<tbody>
				<?php
				while ($row=mysqli_fetch_assoc($result)){
					$sql_getsubjectname="SELECT * FROM subject where subject_code ='$row[subject_code]' ";
					$result_getsubjectname=mysqli_query($conn,$sql_getsubjectname);
					$row_subjectname=mysqli_fetch_assoc($result_getsubjectname);
				?>
				<tr>
				<td><?=$counter++?></td>
				
				<td><?=$row_subjectname['subject_name']?></td>
				<td>
				<a class="btn btn-success" href="lecturer_qtruefalseView.php?id=<?=$row['id']?>"><i class="fa fa-edit"></i></a>
				<a class="btn btn-success" href="lecturer_markView.php?workload_id=<?=$row['id']?>&subject_code=<?=$row['subject_code']?>&quiz=tf"><i class="fa fa-eye"></i></a>
				</td>
				<td>
				<a class="btn btn-success" href="lecturer_qobjectiveView.php?id=<?=$row['id']?>"><i class="fa fa-edit"></i></a>
				<a class="btn btn-success" href="lecturer_markView.php?workload_id=<?=$row['id']?>&subject_code=<?=$row['subject_code']?>&quiz=obj"><i class="fa fa-eye"></i></a>
				</td>
				</tr>
				<?php } ?>
			
			
		</tbody>
		</table>
	</div>
	</div>
</div>