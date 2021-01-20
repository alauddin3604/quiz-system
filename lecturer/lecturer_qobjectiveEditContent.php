<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<a class="btn btn-info back" style="margin-left:75%;" href="lecturer_qobjectiveView.php?id=<?=$_GET['workload_id']?>" aria-label="View">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> BACK
		</a>
		</p>
		<?php
		$query="SELECT * FROM quiz_objective where id='$_GET[id]'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);
		?>
		<form action="lecturer_qobjectiveUpdate.php" method="post">
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
			<td>Option A</td>
			<td>
			<input class="form-control" id="id" type="text" placeholder="Enter Option A" value="<?=$row['option_1']?>" name="option_1" required />
			</td>
			</tr>
			<tr>
			<td>Option B</td>
			<td>
			<input class="form-control" id="id" type="text" placeholder="Enter Option B" value="<?=$row['option_2']?>" name="option_2" required />
			</td>
			</tr>
			<tr>
			<td>Option C</td>
			<td>
			<input class="form-control" id="id" type="text" placeholder="Enter Option C" value="<?=$row['option_3']?>" name="option_3" required />
			</td>
			</tr>
			<tr>
			<td>Option D</td>
			<td>
			<input class="form-control" id="id" type="text" placeholder="Enter Option D" value="<?=$row['option_4']?>" name="option_4" required />
			</td>
			</tr>
			<tr>
			<td>Answer</td>
			<td>
			<label><input type="radio" name="answer" <?php if ($row['answer']=='A') echo "checked"; ?> required value="A">Option A</label><br>
			<label><input type="radio" name="answer" <?php if ($row['answer']=='B') echo "checked"; ?> value="B">Option B</label><br>
			<label><input type="radio" name="answer" <?php if ($row['answer']=='C') echo "checked"; ?> value="C">Option C</label><br>
			<label><input type="radio" name="answer" <?php if ($row['answer']=='D') echo "checked"; ?> value="D">Option D</label>
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