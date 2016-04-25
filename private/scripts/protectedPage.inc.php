<?php 
// protectedpage.inc.php
// This page MUST be included by ALL protected pages.
// Otherwise you won't check the session to make sure they
// are authorized.

// You must "start" the session before you can use it.


// Verify they are validated users:
if (! $_SESSION["isLoggedIn"] == true)
{
    // Not a valid user, kick them out!
    session_destroy();
    session_unset();
    header("Location: ../index.php");
    exit();
}

//Check to see if they want to logout:
if (isset($_GET['logout']))
{
    // Not a valid user, kick them out!
    session_destroy();
    session_unset();
    header("Location: ../index.php");
    exit();
}

// If we didn't just log them out, they must be valid users. 
// Increment the page counter:
$_SESSION["pageCount"] += 1;


function GetUserName()
{
    return ($_SESSION["username"]);
}

function GetPageCount()
{
    return ($_SESSION["pageCount"]);
}
 ?>
