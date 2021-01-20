<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<a class="btn btn-info back" href="admin_adminView.php" aria-label="View">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> BACK
		</a>
		</p>
		<?php
		$query="SELECT * FROM admin where id='$_GET[id]'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);
		?>
		<form action="admin_adminUpdate.php" method="post" onsubmit="checkpassword(event)">
			<input type="hidden" id="oldID" name="oldID" value="<?=$row['id']?>">
			<table class="table borderless">
			<tr>
			<td>Admin ID</td>
			<td><input class="form-control" id="id" type="text" placeholder="Enter Admin ID" name="id" value="<?=$row['id']?>" required /></td>
			</tr>
			<tr>
			<td>Admin Name</td>
			<td><input class="form-control" id="name" type="text" placeholder="Enter Admin Name" name="name"  value="<?=$row['name']?>" required /></td>
			</tr>
			<tr>
			<td>Password</td>
			<td><input class="form-control" id="password" type="password" placeholder="Enter Password" name="password" value="<?=$row['password']?>" required /></td>
			</tr>
			<tr>
			<td>Confirm Password</td>
			<td><input class="form-control" id="confirmpassword" type="password" placeholder="Enter Password" name="confirmpassword" value="<?=$row['password']?>" required /></td>
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

<script>
function checkpassword(ev){
	if($('#confirmpassword').val()!= $('#password').val() ){
		alert("Password and confirm password are not the same");
		ev.preventDefault();
		return false;
	}
}
</script>