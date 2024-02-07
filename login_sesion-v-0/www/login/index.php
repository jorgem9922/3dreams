<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div class="form-wrap">
		<div class="tabs">
			<h3 class="signup-tab"><a class="active" href="#login-tab-content">login</a></h3>
			<h3 class="login-tab"><a href="#signup-tab-content">Sign Up</a></h3>
		</div><!--.tabs-->

		<div class="tabs-content">
			<div id="login-tab-content" class="active">
				<form class="signup-form" action="login.php" method="post">
					<input type="text" class="input" id="usuario" name="usuario" placeholder="Email or Username">
					<input type="password" class="input" id="contra" name="contra" placeholder="Password">
					<input type="checkbox" class="checkbox" id="remember_me">
					<label for="remember_me">Remember me</label>

					<input type="submit" class="button" value="Login">
				</form><!--.login-form-->
				<div class="help-text">
					<p>Forget your password?</a></p>
				</div><!--.help-text-->
			</div><!--.login-tab-content-->
			<div id="signup-tab-content" >
				<form class="signup-form" action="registrar.php" method="post">
					<input type="text" class="input" id="user_name" name="nombre" autocomplete="off" placeholder="Username">
					<input type="text" class="input" id="user_name" name="apellido" autocomplete="off" placeholder="apellido">
					<input type="email" class="input" id="user_email" name="correo" autocomplete="off" placeholder="Email">
					<input type="text" class="input" id="user_pass" name="contra" autocomplete="off" placeholder="Password">
					
					<input type="submit" class="button" value="Sign Up">
				</form><!--.login-form-->
				<div class="help-text">
					<p>By signing up, you agree to our</p>
					<p><a href="#">Terms of service</a></p>
				</div><!--.help-text-->
			</div><!--.signup-tab-content-->

			
		</div><!--.tabs-content-->
	</div><!--.form-wrap-->
</body>

 


</html>