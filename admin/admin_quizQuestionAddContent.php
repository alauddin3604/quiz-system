<div class="page-header">
    <h1><?=$header_text?></h1>
</div>
<div class="page-content">

	<div class="card-header col-md-12 col-sm-12 col-xs-12 mb-2">
	
	<div class="card">
		<p class="cardtitle"><?=$header_text?>
		<a class="btn btn-info back" style="margin-left:75%;" href="admin_quizQuestionView.php?id=<?=$_GET['id']?>" aria-label="View">
			<i class="fa fa-arrow-left" aria-hidden="true"></i> BACK
		</a>
		</p>
		<form action="admin_quizQuestionCreate.php" method="post">
		<input type="hidden" id="quiz_id" name="quiz_id" value="<?=$_GET['id']?>">
			<table class="table borderless">
			<tr>
			<td>Question</td>
			<td>
			<input class="form-control" id="id" type="text" placeholder="Enter Question" name="question" required />
			</td>
			<td>
			<div class="tooltip">
				<i class="fa fa-hand-o-down"></i>
				<span class="tooltiptext">Please select the correct answer</span>
			</div>
			</td>
			</tr>
			<tr>
			<td>Option A</td>
			<td>
			<input class="form-control" id="text1" type="text" placeholder="Enter Option A" name="option_1" required />
			</td>
			<td>
			<input id="option1" class="radiostyle" type="radio" name="answer" onclick="changecss('choice1','text1')" required value="A">
			<label class="choicestyle" id="choice1" for="option1"><i class="fa fa-check-circle-o"></i></label>
			</td>
			</tr>
			<tr>
			<td>Option B</td>
			<td>
			<input class="form-control" id="text2" type="text" placeholder="Enter Option B" name="option_2" required />
			</td>
			<td>
			<input id="option2" class="radiostyle" type="radio" name="answer" onclick="changecss('choice2','text2')" value="B">
			<label class="choicestyle" id="choice2" for="option2"><i class="fa fa-check-circle-o"></i></label>
			</td>
			</tr>
			<tr>
			<td>Option C</td>
			<td>
			<input class="form-control" id="text3" type="text" placeholder="Enter Option C" name="option_3" required />
			</td>
			<td>
			<input id="option3" class="radiostyle" type="radio" name="answer" onclick="changecss('choice3','text3')" value="C">
			<label class="choicestyle" id="choice3" for="option3"><i class="fa fa-check-circle-o"></i></label><br>
			</td>
			</tr>
			<tr>
			<td>Option D</td>
			<td>
			<input class="form-control" id="text4" type="text" placeholder="Enter Option D" name="option_4" required />
			</td>
			<td>
			<input id="option4" class="radiostyle" type="radio" name="answer" onclick="changecss('choice4','text4')" value="D">
			<label class="choicestyle" id="choice4" for="option4"><i class="fa fa-check-circle-o"></i></label>
			</td>
			</tr>
			<!--tr>
			<td>Answer</td>
			<td>
			<br>
			<br>
			
			
			</td>
			</tr-->
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
<script>
function changecss(selected,selectedtext) {
	$(".choicestyle").fadeOut(500, function() {
		$("#text1").css("border","1px solid #ccc");
		$("#text2").css("border","1px solid #ccc");
		$("#text3").css("border","1px solid #ccc");
		$("#text4").css("border","1px solid #ccc");
		$("#"+selectedtext).css("border","2px solid green");
		$(".choicestyle").html("<i class='fa fa-times'></i>").fadeIn(500);
		$('#'+selected).html("<i class='fa fa-check'></i>").fadeIn(500);
   })
}
</script>
<style>
.radiostyle{
	position:fixed;
	opacity:0;
}
.fa fa-check-circle-o{
	color:gray;
}
.tooltip {
	position: relative;
	display: contents;
	border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
	visibility: hidden;
	width: 120px;
	background-color: gray;
	color: #fff;
	text-align: center;
	border-radius: 6px;
	padding: 5px 0;

	/* Position the tooltip */
	position: absolute;
	z-index: 1;
	right:80px;
	top:97px;
}

.tooltip:hover .tooltiptext {
	visibility: visible;
}

.fa-hand-o-down{
	font-size:19px;
}
<style>