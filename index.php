<?php require('scripts/login.inc.php'); ?>   
<?php include('dbconnect.php'); ?>    
<?php include('footer.php'); ?>    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Find My Band</title>
	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/foundation.min.css" />
	<link rel="stylesheet" href="css/app.css" />
	<link rel="stylesheet" href="css/jordan.css" />
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,700' rel='stylesheet' type='text/css'>
</head>

<style>

.top-bar{
	text-align: left;
  position: relative;
background: transparent;
}

.footer-bar{
	text-align: center;
  position: relative;
background: transparent;

}

.callout {
  z-index: 3;
  margin-right:auto;
  margin-left:auto;
  float: none;
  border: none;
  background: transparent;
  border-radius: 5px;
  text-align: center;
  height:700px;
  width: 350px;
  opacity: 1
}



</style>
<img src="images/toronto_large_blur.jpg" id="bg" alt="">

<div class="row  large-6-offest-4 columns text-center">
	<nav class="tealBg">
		<nav class="top-bar" data-topbar role="navigation">
  			<ul class="title-area">
    			<li class="name">
    			</li>
			</ul>
		</nav>
	</nav> 
</div>


<body class="tealBg">
	<!-- <div class="body-break"></div> -->
		<div class="row large-6 columns ">
			<div class="callout2">
				<div class="callout">
					<img src="images/logo_final.png">
					<div class="break"></div>

						<ul class="menu simple">
							<form id="frmLogin" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
									<p><h5><input type="text" name="username" maxlength="20" placeholder="Username"/></h5></p>			
										<p><h5> <input type="password" name="password" maxlength="10" placeholder="Password"/></h5></p>
											<p class="error"><?php echo $loginError ?></p>  
												<!-- <div class="break"></div> -->
													<h4><input type="submit" class="btn darktealBtn white btnPad loginBtn" value="Login" />
														</h4>
								</form>
							</ul>

								<div class="break-small"></div>
									
										<div class="break-small"></div>
											<div class="text-center">
				<span class="white">Dont have an account?</span> <a href="register2.php" class="whiteLink">Sign-up here!</a><span class="white"></span>
											</div>
		</div>
	</div>
</div>
<div class="body-break"></div>
			<div class="row large-6 columns ">
				<nav class="tealBg">
					<nav class="footer-bar" data-topbar role="navigation">
						<!-- <h3>Search Toronto For Upcoming Events!</h3> -->
							</nav>
								</nav> 
									</div>
										
</body>

<footer>
	</footer>

	<?php include('footer.php'); ?>  

</html>
