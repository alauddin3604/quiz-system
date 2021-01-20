<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<a class="btn btn-info back" style="margin-left:75%;" href="lecturer_qtruefalseView.php?id=<?=$_GET['workload_id']?>" aria-label="View">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> BACK
		</a>
		</p>
		<?php
		$query="SELECT * FROM quiz_truefalse where id='$_GET[id]'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);
		?>
		<form action="lecturer_qtruefalseUpdate.php" method="post">
		<input type="hidden" id="id" name="id" value="<?=$row['id']?>">
		<input type="hidden" id="workload_id" name="workload_id" value="<?=$row['workload_id']?>">
			<table class="table borderless">
			<tr>
			<td>Question</td>
			<td>
			<input class="form-control" id="id" type="text" placeholder="Enter Question" value="<?=$row['question']?>" name="question" required />
			</td>
			</tr>
			<tr>
			<td>Subject Name</td>
			<td>
			<label><input type="radio" name="answer" <?php if ($row['answer']=='true') echo "checked"; ?> required value="true">True</label><br>
			<label><input type="radio" name="answer" <?php if ($row['answer']=='false') echo "checked"; ?> value="false">False</label>
			</td>
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