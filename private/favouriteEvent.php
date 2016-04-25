<?php

session_start();
ob_start();

$dbcon = mysql_connect("localhost", "ixd2586_gmaps", "Chucy123");  
mysql_select_db("ixd2586_googlemaps", $dbcon); 

  if (!$dbcon)
    {
    die('Could not connect: ' . mysql_error());
    }

$sqlStatement = "SELECT 
      favourites.username, 
      favourites.eventId, 
      events.string,
      events.eventID
      FROM favourites 
      INNER JOIN events
      ON favourites.eventId = events.eventID
      WHERE favourites.username = '" . $_SESSION['username'] . "'";


$sql = mysql_query($sqlStatement, $dbcon);
echo "<script>var favouriteArray = '';
var userFavourites = '';
</script>";

    while ($row = mysql_fetch_assoc($sql) ) {
    $favourite = unserialize($row['string']);

    $first = true;
    foreach($favourite->artists as $artist) {
      if ( $first )
      {
          $favouriteArtistsArray[] = json_decode(json_encode($artist), true);
          $first = false;
      }
      else
      {
          // do something
        }
    }

    $favouritesObject[] = json_decode(json_encode($favourite),true);
    $favouritesVenueArray[] = json_decode(json_encode($favourite->venue),true);
    $favouritesDateTime[] = json_decode(json_encode($favourite->datetime), true);
    $favouritesId[] = json_decode(json_encode($favourite->id), true);

    echo "<script>

    favouriteArray = ".json_encode($favouritesObject) ."
    favouriteVenue = ".json_encode($favouritesVenueArray) ."
    favouriteDateTime = ".json_encode($favouritesDateTime) ."
    favouriteId = ".json_encode($favouritesId) ."
    favouriteArtist = ".json_encode($favouriteArtistsArray) ."
    </script>"; 

  //     if (  ( isset($_GET['favouriteId']) ) )
  // {

  //   $favouriteSql = mysql_query("SELECT * FROM favourites WHERE eventId = '".$_GET['favouriteId']."' AND username = '".$_SESSION["username"]."' ", $dbcon);

    // if(mysql_num_rows($favouriteSql) > 0) {
    //     $favouriteText = true;
    // }

    // if ( ( isset($_POST['concertId']) ) ) {
    //   if($_GET['favouriteId'] == $_GET['concertId']) {
    //     // Has favourite, remove favourite
    //     $favouriteText = true;
    //   } else {
    //     // No favourite, add favourite 
    //     $favouriteText = false;
    //      // echo "<script>favouriteStar = '<i class=&quot;fa fa-star&quot; aria-hidden=&quot;true&quot;></i> Favourite';<script>";
    //   }
    // }
  }

  ?>