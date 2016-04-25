<?php

require(__DIR__.'/bootstrap.php');

// did we get returned a code?
if (isset($_GET['token']) && $_GET['token'] <> "") {
	
	
	
		// we got back our access token, let's set some session data
		// and then redirect back to the main page
		$_SESSION['token']=$_GET['token'];
        //print_r($_SESSION);
		header('location:'.SECOND_PAGE);		
        
    
} else {
	echo "Nothing to do here, no code received.  Exiting.";
	
}
