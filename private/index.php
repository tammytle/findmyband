<?php 
  ob_start();
	session_start();
  require('../bootstrap.php');
	require('../dbconnect.php');
	require('scripts/protectedPage.inc.php');   
	require('scripts/regUser.inc.php'); ?>  
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Find My Band</title>
  <link rel="stylesheet" href="../css/foundation.css" />
  <link rel="stylesheet" href="../css/foundation.min.css" />
  <link rel="stylesheet" href="../css/app.css" />
  <link rel="stylesheet" href="../css/base.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      body
      .big-link { display:block; margin-top: 100px; text-align: center; font-size: 70px; color: #06f; }

      #map {
        height: 100%;
      }
      .button{
        text-align: center;
        margin: 0 1rem 1rem 0;
      }

      .btn.darktealBtn.white.btnPad.loginBtn
      {
        text-align: center;
        margin:10px;
        margin-top: 5px;
        height:50px;
        width:250px;
        font-size: 18;
        background: #32BCBB;
        color: #fff;
        border-radius: 10px;
        border: 0;
      }

      .btn.darktealBtn.white.btnPad.loginBtn:hover
      {
        color: #fff;
        background: #333;
        
      }

      .menu{
        margin-left: 200px;
        position: relative;
      }
    </style>
</head>  
<body>
  <?php include('../header.php'); ?> 

  <div class="content">

    <?php 
    include 'favourite.php';
    include('favouriteEvent.php');
    include('map.php');
    ?>
  </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<!--   // <script src="../js/vendor/jquery-1.4.4.min.js"></script> -->
  <script src="../js/vendor/what-input.js"></script>
  <script src="../js/vendor/foundation.min.js"></script>
  <script src="../js/app.js"></script>
  <script src="../js/moment.js"></script>
</body>
</html>
