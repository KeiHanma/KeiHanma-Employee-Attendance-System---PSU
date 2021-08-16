<!DOCTYPE html>
<?php
	session_start();
	if(ISSET($_SESSION['login_id'])){
		header('location: home.php');
	}
?>
<html lang = "eng">
	<head>
		<title>Admin-Employee Attendance Record System</title>
		<?php include 'header.php' ?>
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
	</head>
	<body>
	<nav class = "navbar navbar-inverse navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<img src = "images/logo.png" width = "500px" height = "110px"/>
				</div>
			</div>
		</nav>
		<div id ="main" class="bg-info">
		<div class = "container" >
			<div class = "col-lg-10">
			<div class = "row">
				<div class = "col-md-6 offset-md-3 ">
					<div class = "card login-field">
						<div class = "card-header">
							<h4>Admin Login:</h4>
						</div>
						<div class = "card-body">
							<form id = "login-frm">
								<div id = "" class = "form-group">
									<label class = "control-label" >Username:</label>
									<input type = "text" name = "username" class = "form-control" required/>
								</div>
								<div id = "" class = "form-group">
									<label class = "control-label">Password:</label>
									<input type = "password" maxlength = "20" name = "password" class = "form-control" required/>
								</div>
								<br />
								<button type = "submit" class = "btn btn-primary btn-block" >Login <i class="fa fa-arrow-right"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		</div>
	</body>
	<script src = "../assets/js/jquery.js"></script>
	<script src = "../assets/js/bootstrap.js"></script>

	<script>
		$(document).ready(function()
		{
			$('#login-frm').submit(function(e)
			{
				e.preventDefault();
				$.ajax(
					{
					url:'login.php',
					method:'POST',
					data:$(this).serialize(),
					error:err=>
					{
						console.log(err)
					},
					success:function(resp)
					{
						if(resp== true)
						{
							location.replace('home.php')
						}
					}
				})
			})
		})
	</script>
</html>