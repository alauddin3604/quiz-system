<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign up</title>
<!--getting all js script files, including jquery and self defined js file-->
<script src="js/jquery-3.4.1.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="js/signup.js"></script>
<!---->

<!--getting all css files, including css library and self defined css file-->
<link rel="stylesheet" href="css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/layout.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/home.css">
<!--transfer to local when done>

<!---->
</head>
<body>
<a id="top"/>
<nav class="navbar navbar-inverse sticky" >
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand"  href="homepage.php"><i class="fa fa-arrow-left"></i>  Back</a>
		</div>
		<ul class="nav navbar-nav">
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<!--li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li-->
			<li><a onclick="showform()"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		</ul>
	</div>
</nav>


<div class="signup-container" style="margin:0px auto; width:80%;">
	
	<hr>
	<div>
	<div class="row">
		<form class="signupbox animate" action="register.php" method="post">
	<h2 class="div-heading text-center">Sign up</h2>
    <div class="imgcontainer">
    
	<div>
		<div class="avataricon">
			<div class="userborder avatarborder"></div>
			<!--img src="image/user.png" alt="Avatar" class="avatar"-->
			<div style="background-image:url(image/user.png); background-position:center center; background-size:100%;"  class="avatar"></div>
		</div>
	</div>
    </div>

    <div class="inputcontainer">
	<table class="signupform">
	
	<tr>
		<td><label for="signup-username"><b>Username</b></label></td>
	</tr>
	<tr>
		<td style="width:60%">
		<input class="signup-username" type="text" placeholder="Enter Username" name="username"></td>
		<td style="width:40%">&nbsp;&nbsp;&nbsp;
		<span class="username_reminder reminder">Username must be 12 characters or above</span>
		</td>
	</tr>
	<tr>
		<td><label for="signup-password"><b>Password</b></label></td>
	</tr>
	<tr>
		<td style="width:60%"><input class="signup-password" type="password" placeholder="Enter Password" name="password"></td>
		<td style="width:40%">&nbsp;&nbsp;&nbsp;
		<span class="password_reminder reminder">Password must be 12 characters or above</span>
		</td>
	</tr>
	<tr>
		<td><label for="signup-confirmpassword"><b>Confirm Password</b></label></td>
	</tr>
	<tr>
		<td style="width:60%"><input class="signup-confirmpassword" type="password" placeholder="Reconfirm Your Password" name="confirmpassword"></td>
		<td style="width:40%">&nbsp;&nbsp;&nbsp;
		<span class="confirmpassword_reminder reminder">Enter the same password as above</span>
		</td>
	</tr>
	<!--tr>
		<td style="width:70%"><label for="signup-address"><b>Address</b></label></td>
	</tr>
	<tr>
		<td><textarea id="address" class="signup-address" placeholder="Enter Address" name="address"></textarea></td>
		<td style="width:30%">
		<span class="address_reminder reminder">Enter the address</span>
		</td>
	</tr>
	<tr>
		<td style="width:70%"><label for="signup-contactno"><b>Contact Number</b></label></td>
	</tr>
	<tr>
		<td><input class="signup-contactno" type="text" placeholder="Enter Contact Number" name="contactno"></td>
		<td style="width:30%">
		<span class="contactno_reminder reminder">Enter the contact number</span>
		</td>
	</tr-->
	<tr>
	<td colspan='2'>
	<button class="login"  type="submit">Sign up</button>
	</td>
	</tr>
	</table>
    </div>

  </form>
		</div>
			
	</div>
</div>
</body>


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
		<label for="email"><b>Email</b></label>
		<input class="email" type="text" placeholder="Enter Email" name="email">
		<label for="password"><b>Password</b></label>
		<input class="password" type="password" placeholder="Enter Password" name="password">
		<button class="login adminlogin" type="submit">Admin Login</button>
		<span class="psw" style="visibility:hidden;">Forgot <a href="#">password?</a></span>
		<!--span class="switchtab"><a onclick="switchtab('touser')">Switch to user</a></span-->
    </div>
  </form>
</div>

<!--Arrow to go top of the page-->
<a class="gototop" id="gototop" onclick="scrollpage('top')"><i class="fa fa-angle-up"></i></a>
<footer class="footer">
    <div class="footerContainer">
        <p class="copyright">© Quiz system <?php echo date("Y");?></p>
    </div>
</footer>
</html>