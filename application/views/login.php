<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link href= "<?php echo base_url('images/icons/favicon.ico') ?>" rel="stylesheet">
<!--===============================================================================================-->
	<link href= "<?php echo base_url ('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
	<link href= "<?php echo base_url ('fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
	<link href= "<?php echo base_url ('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
	<link href= "<?php echo base_url ('assets/animate/animate.css') ?>" rel="stylesheet">
<!--===============================================================================================-->	
	<link href= "<?php echo base_url ('assets/css-hamburgers/hamburgers.min.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
	<link href= "<?php echo base_url ('assets/animsition/css/animsition.min.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
	<link href= "<?php echo base_url ('assets/select2/select2.min.css') ?>" rel="stylesheet">
<!--===============================================================================================-->	
	<link href= "<?php echo base_url ('assets/daterangepicker/daterangepicker.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
	<link href= "<?php echo base_url ('css/util.css') ?>" rel="stylesheet">
	<link href= "<?php echo base_url ('css/main.css') ?>" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
					<img src="<?php base_url('assets/logo.png')?>">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-33">
						Account Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Sign in
						</button>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2 hov1">
							Username / Password?
						</a>
					</div>

					<div class="text-center">
						<span class="txt1">
							Create an account?
						</span>

						<a href="#" class="txt2 hov1">
							Sign up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/jquery/jquery-3.2.1.min.js') ?>"> </script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/animsition/js/animsition.min.js') ?>"> </script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/bootstrap/js/popper.js') ?>"> </script>
	<script src="<?php echo base_url ('assets/bootstrap/js/bootstrap.min.js') ?>"> </script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/select2/select2.min.js') ?>"> </script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/daterangepicker/moment.min.js') ?>"> </script>
	<script src="<?php echo base_url ('assets/daterangepicker/daterangepicker.js') ?>"> </script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/countdowntime/countdowntime.js') ?>"> </script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('js/main.js') ?>"> </script>

</body>
</html>