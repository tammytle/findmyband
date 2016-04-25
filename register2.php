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
	<title>Find My Band - Register</title>
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

.successBox {
	  background: #A3D6B1;
	  padding: 15px;
	  color: #005C27;
	  border-radius: 10px;
	  margin-top: 10px;
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

[type=text], [type=password], [type=date], [type=datetime], [type=datetime-local], [type=month], [type=week], [type=email], [type=tel], [type=time], [type=url], [type=color], [type=number], [type=search], textarea {
   border-radius: 2px;
  height:70px;
  font-size: 20px;
  font-family: 'Roboto', Arial, serif;
  font-weight: 700;
  text-align: center;
    margin-bottom: 0;
}

.menu a, .menu button, .menu input {
  border-radius: 2px;
  height:70px;
  font-size: 20px;
  font-family: 'Roboto', Arial, serif;
  font-weight: 700;
  text-align: center;
    margin-bottom: 0;
}



</style>
<img src="images/toronto_large_blur.jpg" id="bg" alt="">

<div class="row  large-4 columns text-center">
	<nav class="tealBg">
		<nav class="top-bar" data-topbar role="navigation">
  			<ul class="title-area">
    			<li class="name">
      				<!-- <h1>The 6ix Finder</h1> -->
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
					<!-- <img src="images/logo_small.png"> -->
						<img src="images/logo_final.png">
						<div class="break"></div>
		  <form id="register" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
		    <h5 class="white"><input type="text" name="regName" placeholder="Name" /></h5>
		    <h5 class="white">  <input type="text" name="regEmail" placeholder="Email" /></h5>
		    <h5 class="white">  <input type="text" name="regUsername" placeholder="Username" /></h5>
		    <h5 class="white">  <input type="password" name="regPassword" placeholder="Password" ></h5>
		    <h4><input type="submit" class="btn darktealBtn white btnPad loginBtn" name="submitReg" value="SignUp!"/> </h4>
		  </form>
			<div class="text-center">
				<span class="white">Have an account?</span> <a href="index.php" class="whiteLink">Login here</a><span class="white">.</span>
		</div>
		</div>
	</div>
</div>
<div class="body-break"></div>
			<div class="row large-4 columns ">
				<nav class="tealBg">
					<nav class="footer-bar" data-topbar role="navigation">
						<!-- <title_description>Search The <green>6ix</green> For Upcoming Events!</title_description> -->
							</nav>
								</nav> 
									</div>
										
</body>

<footer>
	</footer>

	<?php include('footer.php'); ?>  

</html>
