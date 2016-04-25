<?php require('scripts/login.inc.php'); ?>   
<?php include('dbconnect.php'); ?>    
<?php include('footer.php'); ?>    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Find My Band</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/foundation.min.css" />
	<link rel="stylesheet" href="css/app.css" />
	<link rel="stylesheet" href="css/jordan.css" />
</head>

<body class="tealBg">
	<div class="row loginSection">
		<div class="large-4 large-offset-4 columns">
			<h2 class="white">Login</h2>
			<form id="frmLogin" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
				<p><h5 class="white">Username</span> <input type="text" name="username" maxlength="20" /></h5>
				<p><h5 class="white">Password</span>  <input type="password" name="password" maxlength="10" /></h5>
				<p class="error"><?php echo $loginError ?></p>  
					<h5><input type="submit" class="btn white btnPad loginBtn" value="Login" /></h5>
			</form>
			<hr>
			<div class="text-center">
				<span class="white">Don't have an account?</span> <a href="register.php" class="whiteLink">Register here</a><span class="white">.</span>
			</div>
		</div>
	</div>
</body>
</html>
