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
		$query="SELECT * FROM workload where status=1 order by id ASC";
		$result=mysqli_query($conn,$query);
		$counter=1;
		?>
		<table class="dataTable table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Lecutrer Name</th>
				<th>Subject Name</th>		
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
				<?php
				while ($row=mysqli_fetch_assoc($result)){
					$sql_getlecturer="SELECT * FROM lecturer where id ='$row[lecturer_id]' ";
					$sql_getsubjectname="SELECT * FROM subject where subject_code ='$row[subject_code]' ";
					$result_getlecturer=mysqli_query($conn,$sql_getlecturer);
					$result_getsubjectname=mysqli_query($conn,$sql_getsubjectname);
					$row_sql_getlecturer=mysqli_fetch_assoc($result_getlecturer);
					$row_sql_getsubjectname=mysqli_fetch_assoc($result_getsubjectname);
				?>
				<tr>
				<td><?=$counter++?></td>
				<td><?=$row_sql_getlecturer['name']?></td>
				<td><?=$row_sql_getsubjectname['subject_name']?></td>
				<td>
				<a class="btn btn-success" href="student_subjectCreate.php?id=<?=$row['id']?>&subject_code=<?=$row['subject_code']?>"><i class="fa fa-plus"></i></a>
				
				</td>
				</tr>
				<?php } ?>
			
			
		</tbody>
		</table>
	</div>
	</div>
</div>