<?php

session_start();
ob_start();

$dbcon = mysql_connect("localhost", "ixd2586_gmaps", "Chucy123");  
mysql_select_db("ixd2586_googlemaps", $dbcon); 

  if (!$dbcon)
    {
    die('Could not connect: ' . mysql_error());
    }

  if (  ( isset($_GET['concertId']) ) )
  {

    // $sql = mysql_query("SELECT * FROM events WHERE eventId = '".$_GET['concertId']."' ", $dbcon);
    $favouriteSql = mysql_query("SELECT * FROM favourites WHERE eventId = '".$_GET['concertId']."' AND username = '".$_SESSION["username"]."' ", $dbcon);

    if(mysql_num_rows($favouriteSql) > 0) {
        $favouriteText = true;
    }

    // if ( ( isset($_POST['concertId']) ) ) {
      if(mysql_num_rows($favouriteSql)) {
        // Has favourite, remove favourite
        mysql_query("DELETE FROM favourites WHERE eventId = '".$_GET['concertId']."' AND username = '".$_SESSION["username"]."'", $dbcon);
        $favouriteText = false;
      } else {
        // No favourite, add favourite 
        mysql_query("INSERT INTO favourites (`username`, `eventId`) VALUES ('".$_SESSION["username"]."', '".$_GET['concertId']."')", $dbcon);
        $favouriteText = true;
         // echo "<script>favouriteStar = '<i class=&quot;fa fa-star&quot; aria-hidden=&quot;true&quot;></i> Favourite';<script>";
      }

    } 

?> 