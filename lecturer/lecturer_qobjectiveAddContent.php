<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<a class="btn btn-info back" style="margin-left:75%;" href="lecturer_qobjectiveView.php?id=<?=$_GET['id']?>" aria-label="View">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> BACK
		</a>
		</p>
		<form action="lecturer_qobjectiveCreate.php" method="post">
		<input type="hidden" id="workload_id" name="workload_id" value="<?=$_GET['id']?>">
			<table class="table borderless">
			<tr>
			<td>Question</td>
			<td>
			<input class="form-control" id="id" type="text" placeholder="Enter Question" name="question" required />
			</td>
			</tr>
			<tr>
			<td>Option A</td>
			<td>
			<input class="form-control" id="id" type="text" placeholder="Enter Option A" name="option_1" required />
			</td>
			</tr>
			<tr>
			<td>Option B</td>
			<td>
			<input class="form-control" id="id" type="text" placeholder="Enter Option B" name="option_2" required />
			</td>
			</tr>
			<tr>
			<td>Option C</td>
			<td>
			<input class="form-control" id="id" type="text" placeholder="Enter Option C" name="option_3" required />
			</td>
			</tr>
			<tr>
			<td>Option D</td>
			<td>
			<input class="form-control" id="id" type="text" placeholder="Enter Option D" name="option_4" required />
			</td>
			</tr>
			<tr>
			<td>Answer</td>
			<td>
			<label><input type="radio" name="answer" required value="A">Option A</label><br>
			<label><input type="radio" name="answer" value="B">Option B</label><br>
			<label><input type="radio" name="answer" value="C">Option C</label><br>
			<label><input type="radio" name="answer" value="D">Option D</label>
			</td>
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