<?php 
  $dbcon = mysql_connect("localhost", "ixd2586_gmaps", "Chucy123");  
  mysql_select_db("ixd2586_googlemaps", $dbcon);  

if (!$dbcon)
  {
  die('Could not connect: ' . mysql_error());
  }
 
if (  ( isset($_POST['regUsername']) ) && ( isset($_POST['regPassword']) ) )
{
    $regName = mysql_real_escape_string($_POST['regName']);      
    $regEmail = mysql_real_escape_string($_POST['regEmail']);
    $regUsername = mysql_real_escape_string($_POST['regUsername']);
    $regPassword = mysql_real_escape_string($_POST['regPassword']);

	$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
	$saltedPW =  $regPassword . $salt;
	$hashedPW = hash('sha256', $saltedPW);

    $sql = "INSERT INTO `users`(`ID`, `name`, `email`, `username`, `password`, `salt`, `posted_date`) 
    VALUES ('null','$regName','$regEmail','$regUsername','$hashedPW', '$salt', now());";

//mysqli_query($sql, $dbcon);
  
  if (!mysql_query($sql, $dbcon))
    {
     die('Error: ' . mysql_error());
    } else {
      // echo "<div class='row'>
      //     <div class='large-6 columns large-offset-3'>
      //       <div class='successBox text-center'>
      //         You've successfully registered!
      //       </div>
      //     </div>
      //   </div>";
      modal();
      // redirect();
  }
}
 // header("Location: index.php");

function modal() {
    echo '<script language="javascript">';
    echo 'alert("Registration Successful");';
    echo 'window.location.href="http://phoenix.sheridanc.on.ca/~ixd2586/project3_googlemaps/index.php"';
    echo '</script>';
}

// function redirect() {
//     header("Location: login.php");
// }

?>

         

