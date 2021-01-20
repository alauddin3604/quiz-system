<?php
	require 'connection.php'; 
	$error_message="";
	if (isset($_GET['mess'])){
		if ($_GET['mess']==1){
			echo "<script>alert('Invalid Username or Password');window.location.href='homepage.php';</script>";
			//header('Location:../homepage.php');
		} else if ($_GET['mess']==2){
			echo "<script>alert('Invalid quiz pin ');window.location.href='homepage.php';</script>";
			//header('Location:../homepage.php');
		} else if ($_GET['mess']==3){
			echo "<script>alert('You cannot join this quiz because it has started already! ');window.location.href='homepage.php';</script>";
			//header('Location:../homepage.php');
		} else if ($_GET['mess']==4){
			echo "<script>alert('You cannot join this quiz because it has already ended! ');window.location.href='homepage.php';</script>";
			//header('Location:../homepage.php');
		} 
	}//print_r($_SESSION);!)
	if (isset($_SESSION['userID'])&&$_SESSION["userID"]==0){
		session_unset();
		session_destroy();
	}
	$_SESSION['updateparticipant']=0;
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home page</title>
<!--getting all js script files, including jquery and self defined js file-->
<script src="js/jquery-3.4.1.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="js/shoppingcart.js?v=<?=time()?>"></script>
<script src="js/initialiseHomepage.js?v=<?=time()?>"></script>
<!---->

<!--getting all css files, including css library and self defined css file-->
<link rel="stylesheet" href="css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/home.css?v=<?=time()?>">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/quiz.css">
<!--transfer to local when done>

<!---->
</head>
<body>
<a id="top"/>
<nav class="navbar navbar-inverse sticky" style="min-height:55px;">
	<div class="container-fluid">
		<div class="navbar-header">	
			<a class="navbar-brand" style="position:relative; bottom:14px; right:10px;"  href="#top"><img class="logo" src="image/home2.png"></img></a>
		</div>
		
		<ul class="nav navbar-nav navbar-right">
			<?php if(!isset($_SESSION['username'])){?>
			<li></li>
			<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			<li><a onclick="showform()"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			<?php }else{?>
				<li style="background-color: #900C3F; color: white; border-radius: 10px; margin-top: 5px;"><a href="admin/admin_quizView.php"> Manage quiz</a></li>
				</li>
				<li><a><i class="fa fa-user" aria-hidden="true"></i> <?=$_SESSION['username']?></a></li>
				</li>
				<li><a onclick="return confirm('Are you sure to logout?')" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
			<?php }?>
		</ul>
	</div>
</nav>

<div class="container"  id="mainMenu" style="position:relative; top:100px;">
	<h1 class="div-heading text-center" id="h1text">Enter quiz pin</h1><br><br>
	<div class="row text-center">
		<div class="col-lg-12 text-center search" >	
		<form action="student/joinquiz.php" style="width:50%" method="POST">
		<input type="text" class="searchTerm" name="quiz_pin"  placeholder="Quiz Pin"/>
			<br><button type="submit" class="searchButton">
				ENTER
			</button>
		</form>
		</div>
	</div>
</div>
	



<!--Login pop up form here-->
<div id="loginform" class="modal">
  <form class="modal-content animate usertab" action="login.php" method="post">
    <div class="imgcontainer">
    <span onclick="closeform()" class="close" title="Close Modal">&times;</span>
	<div>
		<div class="avataricon">
			<div class="userborder avatarborder"></div>
			<!--img src="image/user.png" alt="Avatar" class="avatar"-->
			<div style="background-image:url(image/user.png); background-position:center center; background-size:100%;"  class="avatar"></div>
		</div>
	</div>
    </div>

    <div class="inputcontainer">
		<label for="username"><b>Username</b></label>
		<input class="username" type="text" placeholder="Enter Username" name="username">
		<label for="password"><b>Password</b></label>
		<input class="password" type="password" placeholder="Enter Password" name="password">
		<button class="login" type="submit">Login</button>
		<span class="psw" style="visibility:hidden;"><a href="#">Forgot password?</a></span>
		<!--span class="switchtab"><a onclick="switchtab('toadmin')">Switch to admin</a></span-->
    </div>
	
  </form>
  
  <form class="modal-content animate admintab" action="admin_login.php" method="post">
    <div class="imgcontainer">
		<span onclick="closeform()" class="close" title="Close Modal">&times;</span>
		<div>
		<div class="avataricon">
			<div class="adminborder avatarborder"></div>
			<!--img src="image/admin.png" alt="Avatar" class="avatar"-->
			<div style="background-image:url(image/admin.png); background-position:center center; background-size:100%;"  class="avatar"></div>
		</div>
		</div>
    </div>

    <div class="inputcontainer">
		<label for="username"><b>Username</b></label>
		<input class="username" type="text" placeholder="Enter Username" name="username">
		<label for="password"><b>Password</b></label>
		<input class="password" type="password" placeholder="Enter Password" name="password">
		<button class="login adminlogin" type="submit">Admin Login</button>
		<span class="psw" style="visibility:hidden;">Forgot <a href="#">password?</a></span>
		<span class="switchtab"> <a onclick="switchtab('touser')">Switch to user</a></span>
    </div>
	
  </form>
</div>
<!--footer class="footer">
    <div class="footerContainer">
        <p class="copyright">© THE1998 2020</p>
    </div>
</footer-->
<!--Arrow to go top of the page-->
<a class="gototop" id="gototop" onclick="scrollpage('top')"><i class="fa fa-angle-up"></i></a>
</html>