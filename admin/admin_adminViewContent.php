<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<a class="btn btn-success addstudent" href="admin_adminAdd.php" aria-label="View">
			<i class="fa fa-plus" aria-hidden="true"></i> Add admin
		</a>
		</p>
		<?php
		$query="SELECT * FROM admin where status=1 order by id ASC";
		$result=mysqli_query($conn,$query);
		$counter=1;
		?>
		<table class="dataTable table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Admin ID</th>
				<th>Admin Name</th>		
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
				<?php
				while ($row=mysqli_fetch_assoc($result)){
				?>
				<tr>
				<td><?=$counter++?></td>
				<td><?=$row['id']?></td>
				<td><?=$row['name']?></td>
				<td>
				<a class="btn btn-info" href="admin_adminEdit.php?id=<?=$row['id']?>"><i class="fa fa-pencil"></i></a>
				<a class="btn btn-danger" onclick="return confirm('Are you sure to delete this admin?');" href="admin_adminDelete.php?id=<?=$row['id']?>"><i class="fa fa-trash"></i></a>
				</td>
				</tr>
				<?php } ?>
			
			
		</tbody>
		</table>
	</div>
	</div>
</div>