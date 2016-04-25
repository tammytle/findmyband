<?php 
  ob_start();
  session_start(); 
	include('footer.php');
	require('private/scripts/regUser.inc.php');  
?>   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>The 6IX</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/foundation.min.css" />
	<link rel="stylesheet" href="css/app.css" />
	<link rel="stylesheet" type="text/css" href="css/base.css">
	<style>
	
	.successBox {
	  background: #A3D6B1;
	  padding: 15px;
	  color: #005C27;
	  border-radius: 10px;
	  margin-top: 10px;
	}
	</style>
</head>

<body class="tealBg">
	<div class="break"></div>
	<div class="break"></div>
	<div class="row">
		<div class="large-4 large-offset-4 columns loginBg tealBg">
		<h1 class="white">Register</h1>
		  <form id="register" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
		    <h5 class="white"><input type="text" name="regName" placeholder="Name" /></h5>
		    <h5 class="white">  <input type="text" name="regEmail" placeholder="Email" /></h5>
		    <h5 class="white">  <input type="text" name="regUsername" placeholder="Username" /></h5>
		    <h5 class="white">  <input type="password" name="regPassword" placeholder="Password" ></h5>
		    <h3><input type="submit" class="btn darktealBtn white btnPad loginBtn" name="submitReg" value="Submit"/> </h3>
		  </form>
		  <hr>
			<div class="text-center">
				<span class="white">Have an account?</span> <a href="index.php" class="whiteLink">Login here</a><span class="white">.</span>
		</div>
	</div>
</body>
</html>
