<?php
	require 'connection.php'; 
	
	$sql="SELECT * from quiz_host where quiz_pin ='$_POST[quiz_pin]'";
	$result=mysqli_query($conn,$sql);
	
	if (mysqli_num_rows($result)==0){
		header('Location:homepage.php?mess=2');
		exit;
	}
	$row=mysqli_fetch_assoc($result);
	$quiz_id=$row['quiz_id'];
	$status=$row['status'];
	
	$sql="SELECT * from quiz where id =$quiz_id";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$quiz_name=$row['quiz_name'];
	//$quiz_pin=$row['quiz_pin'];
	
	$sql="SELECT * from user where id =$_SESSION[userID]";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$username=$row['username'];
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
<script src="../js/shoppingcart.js?v=<?=time()?>"></script>
<script src="../js/initialiseHostQuiz.js?v=<?=time()?>"></script>
<!---->

<!--getting all css files, including css library and self defined css file-->
<link rel="stylesheet" href="../css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/home.css?v=<?=time()?>">
<link rel="stylesheet" href="../css/footer.css">
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
				<li><a><i class="fa fa-user" aria-hidden="true"></i> <?=$_SESSION['username']?></a></li>
				</li>
				<li><a onclick="return confirm('Are you sure to logout?')" href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			<?php }?>
		</ul>
	</div>
</nav>

<div class="container"  id="mainMenu" style="position:relative; top:40px;">
	<h1 class="div-heading text-center">Hi <?=$username?><br>Get ready for the quiz <?=$quiz_name?></h1><br><br>
	<div class="row text-center">
		<div class="col-lg-12 text-center search" >	
		<i class="fa fa-spinner" aria-hidden="true"></i>
		</div>
	</div>
	<div class="row text-center">
		<div class="col-lg-12 text-center search" >	
		participant list
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