<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<a class="btn btn-info back" style="margin-left:75%;" href="lecturer_qtruefalseView.php?id=<?=$_GET['id']?>" aria-label="View">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> BACK
		</a>
		</p>
		<form action="lecturer_qtruefalseCreate.php" method="post">
		<input type="hidden" id="workload_id" name="workload_id" value="<?=$_GET['id']?>">
			<table class="table borderless">
			<tr>
			<td>Question</td>
			<td>
			<input class="form-control" id="id" type="text" placeholder="Enter Question" name="question" required />
			</td>
			</tr>
			<tr>
			<td>Answer</td>
			<td>
			<label><input type="radio" name="answer" required value="true">True</label><br>
			<label><input type="radio" name="answer" value="false">False</label>
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