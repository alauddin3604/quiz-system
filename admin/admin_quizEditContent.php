<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<a class="btn btn-info back" href="admin_quizView.php" aria-label="View">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> BACK
		</a>
		</p>
		<?php
		$query="SELECT * FROM quiz where id='$_GET[id]'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);
		?>
		<form action="admin_quizUpdate.php" method="post">
			<input type="hidden" id="id" name="id" value="<?=$row['id']?>">
			<table class="table borderless">
			<tr>
			<td>Quiz Name</td>
			<td><input class="form-control" id="name" type="text" placeholder="Enter Quiz Name" name="quizname"  value="<?=$row['quiz_name']?>" required /></td>
			</tr>
			<tr>
			</tr>
			<tr>
			<td colspan='2' style="text-align:right;">
			<button  class="btn btn-success" aria-label="View">
				<i class="fa fa-floppy-o" aria-hidden="true"></i> UPDATE
			</button>
			</td>
			</tr>
			</table>
		</form>
	</div>
	</div>
</div>