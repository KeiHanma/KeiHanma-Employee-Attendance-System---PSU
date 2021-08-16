<!DOCTYPE html>
<html lang = "eng">
	<head>
		<title>Employee Attendance Record System</title>
		<meta charset = "utf-8" />
		<link rel = "stylesheet" type = "text/css" href = "assets/css/bootstrap.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "assets/css/style.css" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "admin/css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "admin/css/style.css" />
	<script src = "assets/js/jquery-3.5.1.min.js"></script>
	<script src = "assets/js/bootstrap.min.js"></script>
	</head>
	<body>
	<nav class = "navbar navbar-inverse navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<img src = "admin/images/logo.png" width = "500px" height = "110px"/>
				</div>
			</div>
		</nav>
		<div id="main" class="bg-info">
		<div class = "container-fluid admin2">
			<div class="attendance_log_field">
				
				<div class="col-md-4 offset-md-4">
					<div class="card">
						<div class="card-title">
						</div>
						<div class="card-body">
							<div class="text-center">
								<h4>ATTENDANCE SYSTEM<br><?php echo date('F d,Y') ?> <span id="now"></span></h4>
							</div>
							<div class="col-md-12">
								<div class="text-center mb-4" id="log_display"></div>
									<form action="" id="att-log-frm" >
										<div class="form-group">
											<label for="eno" class="control-label">Enter the Employee Number:</label>
											<input type="text" id="eno" name="eno" class="form-control col-sm-12">
										</div>
										<center>
											<button type="button" class='btn btn-sm btn-primary log_now col-sm-3' data-id="1">IN AM</button>
											<button type="button" class='btn btn-sm btn-primary log_now col-sm-3' data-id="2">OUT AM</button>
											<button type="button" class='btn btn-sm btn-primary log_now col-sm-3' data-id="3">IN PM</button>
											<button type="button" class='btn btn-sm btn-primary log_now col-sm-3' data-id="4">OUT PM</button>
										</center>
										<div class="loading" style="display: none"><center>Please wait...</center></div>
										
									</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</body>
	<script>
		$(document).ready(function()
		{
			setInterval(function()
			{
				var time = new Date();
				var now = time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true })
				$('#now').html(now)
			},500)
			console.log()

			$('.log_now').each(function()
			{
				$(this).click(function()
				{
					var _this = $(this)
					var eno = $('[name="eno"]').val()
					if(eno == '')
					{
						alert("Please enter your employee number");
					}else
					{
						$('.log_now').hide()		
						$('.loading').show()
						$.ajax(
							{
							url:'./admin/time_log.php',
							method:'POST',
							data:{type:_this.attr('data-id'),eno:$('[name="eno"]').val()
							},
							error:err=>console.log(err),
							success:function(resp)
							{
								if(typeof resp != undefined)
								{
									resp = JSON.parse(resp)

									if(resp.status == 1)
									{
										$('[name="eno"]').val('')
										$('#log_display').html(resp.msg)
										$('.log_now').show()		
										$('.loading').hide()
										setTimeout(function()
										{
											$('#log_display').html('')
										},5000)
									}
									else
									{
										alert(resp.msg)
										$('.log_now').show()		
										$('.loading').hide()
									}
								}
							}
						})		
					}
				})
			})
		})
	</script>
</html>