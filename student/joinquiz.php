<?php
	require '../connection.php'; 
	
	if( !isset($_SESSION["updateparticipant"]) ){
		$_SESSION['updateparticipant']=0;
	}
	
	$sql="SELECT * from quiz_host where quiz_pin ='$_POST[quiz_pin]'";
	$result=mysqli_query($conn,$sql);
	
	if (mysqli_num_rows($result)==0){
		header('Location:../homepage.php?mess=2');
		exit;
	}
	$row=mysqli_fetch_assoc($result);
	$quiz_id=$row['quiz_id'];
	$status=$row['status'];
	if ($status==2){
		header('Location:../homepage.php?mess=3');
		exit;
	}
	if ($status==3){
		header('Location:../homepage.php?mess=4');
		exit;
	}
	$quiz_host_id=$row['id'];
	echo "<script>var quiz_host_id='$quiz_host_id';</script>";
	echo "<script>var quiz_id='$quiz_id';</script>";
	echo "<script>var quiz_pin='$_POST[quiz_pin]';</script>";
	
	if( (!isset($_SESSION["userID"])||$_SESSION["userID"]==0)&&$_SESSION["updateparticipant"]!=1 ){
		$_SESSION['userID']=0;
		$username='Guest';
		$guestmode='yes';
	}else{
		if($_SESSION['userID']=='0'){
			$username=$_SESSION['username'];
			$guestmode='no';
		}else{
			$sql="SELECT * from user where id =$_SESSION[userID]";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);
			$username=$row['username'];
			$guestmode='no';
			if( $_SESSION["updateparticipant"]==0 ){
				$query="UPDATE quiz_host SET total_participant=total_participant+1  WHERE id='$quiz_host_id' ";
				mysqli_query($conn,$query);
				$query="INSERT INTO quiz_result(quiz_host_id, username, userid, quiz_id, score) VALUES ('$quiz_host_id', '$username', '$_SESSION[userID]', '$quiz_id', '0')";
				mysqli_query($conn,$query);
				$_SESSION["updateparticipant"]=1;
			}
		}
		
	}
	echo "<script>var guestmode='$guestmode';</script>";
	
	$sql="SELECT * from quiz where id =$quiz_id";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$quiz_name=$row['quiz_name'];
	//$quiz_pin=$row['quiz_pin'];
	
	
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Join Quiz</title>
<!--getting all js script files, including jquery and self defined js file-->
<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script src="../js/initialiseHostQuiz.js?v=<?=time()?>"></script>
<script src="../js/countdown.js?v=<?=time()?>"></script>
<script src="../js/isortope.js"></script>
<script src="../js/isortope-min.js"></script>
<script src="https://ricostacruz.com/jquery.transit/jquery.transit.min.js"></script>
<!---->

<!--getting all css files, including css library and self defined css file-->
<link rel="stylesheet" href="../css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/home.css?v=<?=time()?>">
<link rel="stylesheet" href="../css/quiz.css?v=<?=time()?>">
<link rel="stylesheet" href="../css/footer.css">
<link rel="stylesheet" href="../css/style.css">
<!--transfer to local when done>

<!---->
</head>
<body>
<audio id="countdown">
	<source src="../audio/countdown.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio><audio id="correct">
	<source src="../audio/correct.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>
<audio id="incorrect">
	<source src="../audio/incorrect.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>

<nav class="navbar navbar-inverse sticky" style="min-height:55px;">
	<div class="container-fluid">
		<div class="navbar-header">	
			<a class="navbar-brand" style="position:relative; bottom:18px; right:10px;"  href="#top"><img class="logo" src="../image/home2.png"></img></a>
		</div>
		
		<ul class="nav navbar-nav navbar-right">
			<?php if(!isset($_SESSION['username'])){?>
			<li><a><i  class="fa fa-user" aria-hidden="true"></i> <span id="usernamebox">Welcome <?=$username?></span></a></li>
			<?php }else{?>
				<li><a><i class="fa fa-user" aria-hidden="true"></i> <?=$_SESSION['username']?></a></li>
				<li><a onclick="return confirm('Are you sure to logout?')" href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
			<?php }?>
		</ul>
	</div>
</nav>

<div class="container"  id="mainMenu" style="position:relative; top:20px;">
	<div class="row text-center guest_container">
		<div class="col-lg-12 text-center " >
			<h1 id="h1text" class="div-heading text-center">Enter your name</h1><br><br>		
			<input type="text" class="searchTerm" name="term" placeholder="Your name" value="" id="username"/>
			<br><button onclick="setname(event)" class="searchButton">
				Enter
			</button>
		</div>
	</div>
	<div class="row text-center spinner_container">
		<div class="col-lg-12 text-center " >
			<h1 class="div-heading text-center">Hi <span id="username_spinner"><?=$username?></span><br>Get ready for the quiz <?=$quiz_name?></h1><br><br>		
			<i style="font-size:40px;" class="fa fa-spinner fa-pulse"></i>
			<p class="normaltext">Your quiz will start shortly</p>
		</div>
	</div>
	<div class="row text-center countdown_container">
		<div class="col-lg-12 text-center countdownbox" >	
			<div id="hideMsg">
				<div id="countdown">3</div>
			</div>
		</div>
	</div>
	<div class="row text-center questiondiv_container">
		<div class="col-lg-12 text-center " >	
			<table class="questiontable" id="questiontable">
			<tr><td colspan="2" class="magnifying" id="magnifying">
			<span class="answerstatus" id="answerstatus">
			
			</span>
			<span class="magni">
			<div class="tooltip"><i onclick="showmagni()" class="fa fa-question-circle"></i>
				<span class="tooltiptext">Click me</span>
			</div>
			
				
			<span onclick='magni()'>
			<i id="magni1" class="fa fa-search" aria-hidden="true"></i>
			<i id="magni2" class="fa fa-search" aria-hidden="true"></i>
			<i id="magni3" class="fa fa-search" aria-hidden="true"></i>
			</span>
			</td></tr>
			<tr><td colspan="2" class="questioncolumn" id="questioncolumn"></td></tr>
			<tr>
				<td onclick="checkanswer('A')" id="option_A" class="optioncolumn"></td>
				<td onclick="checkanswer('B')" id="option_B" class="optioncolumn"></td>
			</tr>
			<tr>
				<td onclick="checkanswer('C')" id="option_C" class="optioncolumn"></td>
				<td onclick="checkanswer('D')" id="option_D" class="optioncolumn"></td>
			</tr>
			</table>
		</div>
	</div>
	<div class="row text-center leaderboarddiv_container">
		<div class="col-lg-12 text-center " >
			<p class="normaltext">Quiz result summary</p>
			<div style="border:3px solid #455a64; padding:20px;">
			<p class="normaltext">Congratulation <?=$username?></p>
			<p class="normaltext" id="leaderboardtext">Performance stats</p>
			<button style="background-color: #900C3F; color: white; margin-top: 10px; width:100px; font-size:18px; border:none; padding:10px;" onclick="location.href='../homepage.php'" type="button">Quit</button>
			</div>
			
			<p class="normaltext" id="">Leaderboard</p>
			<p class="normaltext" style="text-align:left;" id="rankingtext"></p>
			<table class="leaderboard" id="leaderboard">
				<thead>
				  <th>Ranking</th><th>Player</th><th>Accuracy</th><th>Score</th>
				</thead>
				<tbody id="thingy"></tbody>
			</table>
		</div>
	</div>
</div>

<div class="hover_bkgr_fricc">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">&times;</div>
        <p class="popup_icon">What is this?<br><i class="fa fa-search" aria-hidden="true"></i></p>
		<p class="popup_text">You can use magnifying glass to eliminate 1 wrong option. You can use them 3 times throughout this quiz but only 1 time per question. Good luck!</p>
    </div>
</div>
<!--footer class="footer">
    <div class="footerContainer">
        <p class="copyright">© THE1998 2020</p>
    </div>
</footer-->
<!--Arrow to go top of the page-->
</html>