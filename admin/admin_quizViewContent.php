<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<a class="btn btn-success addstudent" href="admin_quizAdd.php" aria-label="View">
			<i class="fa fa-plus" aria-hidden="true"></i> Add quiz
		</a>
		</p>
		<?php
		$query="SELECT * FROM quiz where status=1 and createdby=$_SESSION[userID] order by id ASC";
		$result=mysqli_query($conn,$query);
		$counter=1;
		?>
		<table class="dataTable table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Quiz Name</th>				
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
				<?php
				while ($row=mysqli_fetch_assoc($result)){
					/*$query_adminName="SELECT * FROM admin where id='$row[modified_by]' order by id ASC";
					$result_adminName=mysqli_query($conn,$query_adminName);
					$row_adminName=mysqli_fetch_assoc($result_adminName);
					$adminName=$row_adminName['name'];*/
				?>
				<tr>
				<td><?=$counter++?></td>
				<!--td><?=$row['quiz_code']?></td-->
				<td><?=$row['quiz_name']?></td>
				<td>
				<a class="btn btn-info" href="admin_quizEdit.php?id=<?=$row['id']?>"><i class="fa fa-pencil"></i></a>
				<a class="btn btn-info" href="admin_quizQuestionView.php?id=<?=$row['id']?>"><i class="fa fa-eye"></i></a>
				<a class="btn btn-info" href="admin_quizHost.php?id=<?=$row['id']?>"><i class="fa fa-share-alt"></i></a>
				<a class="btn btn-danger" onclick="return confirm('Are you sure to delete this quiz?');" href="admin_quizDelete.php?id=<?=$row['id']?>"><i class="fa fa-trash"></i></a>
				</td>
				</tr>
				<?php } ?>
			
			
		</tbody>
		</table>
	</div>
	</div>
</div>