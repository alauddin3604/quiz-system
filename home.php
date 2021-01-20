<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <link rel="icon" href="image/favicon.jpg" type="image/jpeg" sizes="16x16">
    <title>Quiz System</title>
	<link href="css/home.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/particles.css" />
	<script src='js/jquery-3.4.1.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<script src='js/home.js'></script>
</head>
<?php
	
	$error_message="";
	if (isset($_GET['mess'])){
		if ($_GET['mess']==1){
			$error_message="Incorrect Username or Password. Try again!";
		}
		echo "<script>$(function() {showform();});</script>";
	}
?>
	<body>
	<div class="typewriter">
		<h1><strong>Welcome to Quiz system</strong></h1>
	</div>
    <div class="buttonrow">
		<button onclick="showform();" class="button">LOGIN</button>
	</div>
	<div id="loginform" class="modal">
	  <form class="modal-content animate usertab" action="login.php" method="post">
		<div class="imgcontainer">
		<span onclick="closeform()" class="close" title="Close Modal">&times;</span>
		<div>
			<div class="avataricon">
				<div class="userborder avatarborder"></div>
				<div style="background-image:url(image/user.png); background-position:center center; background-size:100%;"  class="avatar"></div>
			</div>
		</div>
		</div>

		<div class="inputcontainer">
			<label for="userID"><b>User ID</b></label>
			<input class="username" type="text" placeholder="Enter user id" name="userID" required
			oninvalid="this.setCustomValidity('Please input your user id!'); $('.userID').css('border','1px solid red');"
			oninput="this.setCustomValidity(''); $('.id').removeAttr('style');">
			<label for="password"><b>Password</b></label>
			<input class="password" type="password" placeholder="Enter Password" name="password" required
			oninvalid="this.setCustomValidity('Please input your password!'); $('.password').css('border','1px solid red');"
			oninput="this.setCustomValidity(''); $('.password').removeAttr('style');">
			<!--label for="position"><b>Login as</b></label-->
			<!--div class="radio-toolbar"> 
				<input type="radio" class="position" id="radioStudent" name="position" value="student" 
				oninvalid="this.setCustomValidity('Please choose your position!'); $('.radio-toolbar label').css('border','2px dashed red');"
				onclick="$('.position')[0].setCustomValidity(''); $('.radio-toolbar label').removeAttr('style');" required/>
				<label for="radioStudent">Student</label>
				<input type="radio" class="position" id="radioLecturer" name="position" 
				onclick="$('.position')[0].setCustomValidity(''); $('.radio-toolbar label').removeAttr('style');" value="lecturer" required/>
				<label for="radioLecturer">Lecturer</label>
				<input type="radio" class="position" id="radioAdmin" name="position" 
				onclick="$('.position')[0].setCustomValidity(''); $('.radio-toolbar label').removeAttr('style');" value="admin" required/>
				<label for="radioAdmin">Admin</label> 
			</div-->
			<span id="errormessage" style="color:red;font-weight:bold"><?=$error_message;?></span>
			<button class="login" type="submit" onclick="showform();">Login</button>
		</div>
	  </form>
	</div>
	</body>
</html>

<script src='js/anime.min.js'></script>
<script src='js/particles.js'></script>
<script>
	$(".button").show()
</script>