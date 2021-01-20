<?php require 'connection.php';?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change password</title>
<!--getting all js script files, including jquery and self defined js file-->
<script src="js/jquery-3.4.1.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="js/changepassword.js"></script>
<!---->

<!--getting all css files, including css library and self defined css file-->
<link rel="stylesheet" href="css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/changepassword.css">

<!--transfer to local when done>

<!---->
</head>
<body>


<div class="signup-container">
	
	<hr>
	<div>
	<div class="row">
		<form class="signupbox animate" action="updatepassword.php" method="post" onsubmit="checkpassword(event);">
	<h3 class="div-heading text-center">Welcome <?php echo $_SESSION['username'];?><br> For first login, you are required to change your password</h3>
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
		<td>
		<input required class="signup-username" type="text" placeholder="Enter Username" name="username" value="<?=$_SESSION['username']?>" readonly></label></td>
		
	</tr>
	<tr>
		<td><label for="signup-password"><b>Password</b></label></td>
	</tr>
	<tr>
		<td><input required class="signup-password" type="password" placeholder="Enter Password" name="password">
		<!--span class="password_reminder reminder">Password must be 7 characters or above</span-->
		</td>
		
	</tr>
	<tr>
		<td><label for="signup-confirmpassword"><b>Confirm Password</b></label>
		</td>
	</tr>
	<tr>
		<td><input class="signup-confirmpassword" type="password" placeholder="Reconfirm Your Password" name="confirmpassword">
		<span class="confirmpassword_reminder reminder">Enter the same password as above</span>
		</td>
	</tr>
	<tr>
	<td colspan='2'>
	<button class="login"  type="submit">Change Password</button>
	</td>
	</tr>
	</table>
    </div>

    
	
  </form>
		</div>
			
	</div>
</div>
</body>
</html>