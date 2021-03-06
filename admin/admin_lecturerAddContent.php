<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<a class="btn btn-info back" href="admin_lecturerView.php" aria-label="View">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> BACK
		</a>
		</p>
		<form action="admin_lecturerCreate.php" method="post">
			<table class="table borderless">
			<tr>
			<td>Lecturer ID</td>
			<td><input class="form-control" id="id" type="text" placeholder="Enter Lecturer ID" name="id" required /></td>
			</tr>
			<tr>
			<td>Lecturer Name</td>
			<td><input class="form-control" id="name" type="text" placeholder="Enter Lecturer Name" name="name" required /></td>
			</tr>
			<tr>
			<td colspan='2' style="text-align:right;">
			<button  class="btn btn-success" aria-label="View">
				<i class="fa fa-floppy-o" aria-hidden="true"></i> ADD
			</button>
			</td>
			</tr>
			</table>
		</form>
	</div>
	</div>
</div>