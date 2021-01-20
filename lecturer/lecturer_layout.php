<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$pagetitle?></title>
<!--getting all js script files, including jquery and self defined js file-->
<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="../js/sidebaradmin.js"></script>
<!---->

<!--getting all css files, including css library and self defined css file-->
<link rel="stylesheet" href="../css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


<link rel="stylesheet" href="../css/sidebar.css">
<link rel="stylesheet" href="../css/datatable.css">
<link rel="stylesheet" href="../css/mainlayout.css">
<link rel="stylesheet" href="../css/footer.css">
<!--transfer to local when done>

<!---->
</head>
<body>

<nav class="navbar navbar-inverse sticky" >
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li class="menuicon">
				<i class="fa fa-bars navmenu" aria-hidden="true"></i>
			</li>
			<li>
			<img class="logo" src="image/favicon.jpg"></img>
			</li>
			<li>
			<a class="navbar-brand" href="#">
			&nbsp&nbsp&nbsp
			<?=$systemname;?></a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href=""><span class="glyphicon glyphicon-user"></span> Hi <?=$_SESSION['username']?></a></li>
			<li><a onclick="return confirm('Are you sure to logout?')" href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		</ul>
	</div>
</nav>

<div id="mySidenav" class="sidenav">
	<a href="lecturer_subjectView.php" id="orderlist" ><i class="fa fa-list-ul" aria-hidden="true"></i> Subject list</a>
	
</div>

<?php require $page_content;?>
<?php require $footer;?>

