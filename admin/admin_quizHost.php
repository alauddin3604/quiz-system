<?php
	require '../connection.php'; 
	$sql="SELECT * from quiz where id ='$_GET[id]'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$quiz_name=$row['quiz_name'];
	$quiz_id=$row['id'];
	$your_user_login = $_SESSION['userID'];
	$quiz_pin = md5(uniqid($your_user_login, true));
	$quiz_pin = substr($quiz_pin, 0, 6);
	$quiz_pin = strtoupper($quiz_pin);
	
	echo "<script>var quiz_id='$quiz_id';</script>";
	echo "<script>var quiz_pin='$quiz_pin';</script>";
	$date=date('Y-m-d');
	$sql="INSERT INTO quiz_host (userid,quiz_pin,quiz_id,date) VALUES ('$_SESSION[userID]','$quiz_pin','$quiz_id','$date')";
	mysqli_query($conn,$sql);
	$last_id = mysqli_insert_id($conn);
	//$last_id = 7;
	$sql="SELECT * from quiz_host where id ='$last_id'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$quiz_id=$row['quiz_id'];
	$status=$row['status'];
	$quiz_host_id=$row['id'];
	echo "<script>var quiz_host_id='$last_id';</script>";
	
	$query="SELECT * from quiz_question where quiz_id='$quiz_id' and status=1 order by id";
	$result2=mysqli_query($conn,$query);
	$tq=mysqli_num_rows($result2);
	echo "<script>var tq='$tq';</script>";
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Host Quiz</title>
<!--getting all js script files, including jquery and self defined js file-->
<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="../js/initialiseHostQuiz2.js?v=<?=time()?>"></script>
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
<a id="top"/>
<nav class="navbar navbar-inverse sticky" style="min-height:55px;">
	<div class="container-fluid">
		<div class="navbar-header">	
			<a class="navbar-brand" style="position:relative; bottom:12px; right:10px;"  href="#top"><img class="logo" src="../image/home2.png"></img></a>
		</div>
		
		<ul class="nav navbar-nav navbar-right">
			<?php if(!isset($_SESSION['username'])){?>
			<li></li>
			<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			<li><a onclick="showform()"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			<?php }else{?>
				<li id="backbutton" style="background-color: #900C3F; color: white; border-radius: 10px; margin-top: 5px;"><a href="admin_quizView.php"> Back</a></li>
				</li>
				<li><a><i class="fa fa-user" aria-hidden="true"></i> <?=$_SESSION['username']?></a></li>
				</li>
				<li><a onclick="return confirm('Are you sure to logout?')" href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			<?php }?>
		</ul>
	</div>
</nav>

<div class="container"  id="mainMenu" style="position:relative; top:40px;">
	
	<div class="row text-center participantlist_container">
	<h1 id="h1text" class="div-heading text-center"><?=$quiz_name?><br>Share this pin to your students</h1><br><br>
		<div class="col-lg-12 text-center search" >	
		<form style="width:50%" method="POST">
			<input type="text" class="searchTerm" name="term" readonly placeholder="Quiz Pin" value="<?=$quiz_pin?>"/>
				<br><button onclick="start(event)" class="searchButton">
					START
				</button>
		</form>
			
		</div><p></p>
		<table class="participantlist"  id="participantlist">
				<thead>
				  <th colspan="5">Participant list</th>
				</thead>
				<tbody id="thingy"></tbody>
			</table>
	</div>
	<div class="row text-center leaderboarddiv_container">
		<div class="col-lg-12 text-center" >	
		<div style="border:0px solid #455a64; padding:10px;color:white;text-align:left;">
		<p class="normaltext" id="totaltext"></p>
		<p class="normaltext" id="incompletetext"></p>
		<p class="normaltext" id="completetext"></p>
		
		</div>
		<button style="background-color: #900C3F; color: white; margin-top: 10px; width:100px; font-size:18px; border:none; padding:10px;" onclick="end(event)" type="button">End Quiz</button>
		<p class="normaltext" style="color:white;" id="">Leaderboard</p>
			
			<table class="leaderboard" id="leaderboard">
				<thead>
				  <th>Ranking</th><th>Player</th><th>Accuracy</th><th>Score</th>
				</thead>
				<tbody id="thingy2"></tbody>
			</table>
		</div>
	</div>
</div>
	



<!--footer class="footer">
    <div class="footerContainer">
        <p class="copyright">© THE1998 2020</p>
    </div>
</footer-->
<!--Arrow to go top of the page-->
</html>