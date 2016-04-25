<?php
  session_start();
  ob_start();
?>

<div id="map"></div>
   <div id="detailWindowOpen" class="detailWindow">
        <span id="concertDetailWindow" style="color: #000"></span>
   </div>
</div>

<div class="reveal" id="detailModal" data-reveal>
  <span aria-hidden="true">&times;</span>
</div>
<div class="reveal" id="favouriteModal" data-reveal>
</div>

    <script src="../js/moment.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script>
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>

<?php

$dbcon = mysql_connect("localhost", "ixd2586_gmaps", "Chucy123");  
mysql_select_db("ixd2586_googlemaps", $dbcon);

$favouriteSql = mysql_query("SELECT * FROM favourites WHERE username = '".$_SESSION["username"]."' ", $dbcon);  

$favouriteArray = array();
while ($row = mysql_fetch_assoc($favouriteSql)) {
  array_push($favouriteArray, $row['eventId']);
}

// $favouriteStatement = json_encode($favouriteSql, true);
echo "<script>var favourites = ".json_encode($favouriteArray) ." </script>";

 
require(__DIR__.'../../bootstrap.php');

$bandsintownBase = "http://api.bandsintown.com/events/search.json";
$bandsintownQueryParams = array(

  'api_version' => '1.0',
  'app_id' => 'GMAPSSITE',
  'location' => 'Toronto,ON',
  'date' => 'upcoming'
);

dump(getApiData($bandsintownBase, $bandsintownQueryParams));  

if (!$dbcon)
  {
    die('Could not connect: ' . mysql_error());
  }


echo "<script>var favouriteList;
var userFavourites = '';
</script>";


echo "<script>

    // favouriteStar = ".json_encode($favouriteStars)."
    // favouriteArray = ".json_encode($favouritesObject) ."
    favouriteVenue = ".json_encode($favouritesVenueArray) ."
    favouriteDateTime = ".json_encode($favouritesDateTime) ."
    favouriteId = ".json_encode($favouritesId) ."
    favouriteArtist = ".json_encode($favouriteArtistsArray) ."
    </script>"; 

echo "<script>function showWindow(concertDetail) {
    $('#detailModal').foundation('open');
    document.getElementById('detailModal').innerHTML = concertDetail;
  }

  function favUpdate() {
    var userFavourites = '';
    $.get( 'favouriteEvent.php', function( userFavourites ) {
      for (i = 0; i < favouriteArray.length; i++) { 
      userFavourites += 
      '<p>' + favouriteArtist[i].name + 
      '<br>' + favouriteVenue[i].name + 
      '<br>' + moment(favouriteDateTime[i]).format('MMMM Do YYYY h:mm a') + 
      '</span></p>' ;
     }
     $( '#favouriteModal' ).empty();
     $( '#favouriteModal' ).html( '<h3>Favourites</h3><hr>' + userFavourites );
    });
  }

  </script>";

function getApiData($base, $queryParams){
$concerts = json_decode(cGet(buildUrlProper($base, $queryParams)) );

$dbcon = mysql_connect("localhost", "ixd2586_gmaps", "Chucy123");  
mysql_select_db("ixd2586_googlemaps", $dbcon); 

foreach($concerts as $concert) {
$serializedEvents = serialize($concert);

$sql = "INSERT INTO `events`(`string`, `eventID`) 
VALUES ('".mysql_real_escape_string($serializedEvents)."', '".mysql_real_escape_string($concert->id)."')";

if (!mysql_query($sql, $dbcon))
        {
        //  die('Error: ' . mysql_error());
        // } else {
        //   echo "yay";
        }

  $first = True;
  foreach($concert->artists as $artist) {
    if ( $first )
    {
        $concertsArtistsArray[] = json_decode(json_encode($artist), true);
        $first = False;
    }
    else
    {
        // do something
    }
  }
  $concertsVenueArray[] = json_decode(json_encode($concert->venue),true);
  $concertsVenueLatitude[] = json_decode(json_encode($concert->venue->latitude),true);
  $concertsVenueLongitude[] = json_decode(json_encode($concert->venue->longitude),true);
  $concertsObject[] = json_decode(json_encode($concert), true);
  $concertsDateTime[] = json_decode(json_encode($concert->datetime), true);
  $concertsId[] = json_decode(json_encode($concert->id), true);
}

  // $favouriteStars = json_encode($favouriteText, true);

  echo "
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCKnnXmVq11AUoi4N3Wzny8phbRFa5Hlqw&libraries=visualization&callback=initMap'
    async defer></script>
  <script>

       var concertArtist = ".json_encode($concertsArtistsArray) ."
       var concertVenue = ".json_encode($concertsVenueArray) ." 
       var concertObject = ".json_encode($concertsObject) ."
       var concertLatitude = ".json_encode($concertsVenueLatitude) ."
       var concertLongitude = ".json_encode($concertsVenueLongitude) ."
       var concertDateTime = ".json_encode($concertsDateTime) ."
       var concertId = ".json_encode($concertsId) ."

      var favouriteStar = ".json_encode($favouriteStars).";

      function favouriteConcert(concertID){
        $.get('favourite.php?concertId='+concertID, function(){
          var concertIndex = concertId.findIndex(function(concert){
            return concert === concertID;
          });
          var star = $('#star');
          if (star.hasClass('fa-star')) {
            var spliceIndex = favourites.findIndex(function(favourite){
              return favourite === concertID;
            });
            favourites.splice(1, spliceIndex);
            console.log('removed:'+concertID);
            $('#star').removeClass('fa-star').addClass('fa-star-o');
          } else {
            favourites.push(concertID);
            console.log('added:'+concertID);
            $('#star').removeClass('fa-star-o').addClass('fa-star');
          }
          var concertThing = $('#concert_'+concertID);
          var test = getStuff(concertIndex);
          test = test.replace(/&quot;/g, '\"');
          concertThing.attr('onclick', 'showWindow(\'' + test + '\')');

          console.log('FAVOURITED:' +concertID);
          favUpdate();
        });
      }

      //isFavourite is a boolean whether the concert is favourited or not
      function getFavouriteHtml(favouriteStar) {

        var starClass;
          if (favouriteStar == true) {
            starClass = 'fa-star';
          } else {
            starClass = 'fa-star-o';
          }
        // var starClass = favouriteStar ?  'fa-star-o' : 'fa-star';
        return '<i class=&quot;fa ' + starClass + '&quot; aria-hidden=&quot;true&quot; id=&quot;star&quot;></i> Favourite';
      }

      function initMap() {
        var styles = [
        {
          stylers: [
            { hue: '#06bebd' },
            { saturation: '-65' }
          ]
        },{
          featureType: 'road',
          elementType: 'geometry',
          stylers: [
            { lightness: 100 },
            { visibility: 'simplified' }
          ]
        },{
          featureType: 'landscape',
          stylers: [
            { visibility: 'Off' }
          ]
        },{
          featureType: 'point of interest',
          stylers: [
            { visibility: 'Off' }
          ]
        }
      ];

    var styledMap = new google.maps.StyledMapType(styles,
    {name: 'Styled Map'});

   var mapOptions = {
    zoom: 13,
    center: new google.maps.LatLng(43.6532, 79.3832),
    mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
    }
  };
  var map = new google.maps.Map(document.getElementById('map'),
    mapOptions);

  map.mapTypes.set('map_style', styledMap);
  map.setMapTypeId('map_style');

      var heatmap;
      var concertHeatMap = [];
        heatmap = new google.maps.visualization.HeatmapLayer({
          data: getPoints(),
          map: map,
          radius: 50
        });

          function toggleHeatmap() {
            heatmap.setMap(heatmap.getMap() ? null : map);
          }

          function changeGradient() {
            var gradient = [
              'rgba(0, 255, 255, 0)',
              'rgba(6, 190, 189, 1)',
              'rgba(0, 191, 255, 1)',
              'rgba(0, 127, 255, 1)',
              'rgba(0, 63, 255, 1)',
              'rgba(0, 0, 255, 1)',
              'rgba(0, 0, 223, 1)',
              'rgba(0, 0, 191, 1)',
              'rgba(0, 0, 159, 1)',
              'rgba(0, 0, 127, 1)',
              'rgba(63, 0, 91, 1)',
              'rgba(127, 0, 63, 1)',
              'rgba(191, 0, 31, 1)',
              'rgba(255, 0, 0, 1)'
            ]
            heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
          }

          function changeRadius() {
            heatmap.set('radius', heatmap.get('radius') ? null : 50);
          }

          function changeOpacity() {
            heatmap.set('opacity', heatmap.get('opacity') ? null : 1);
          }

          function getPoints() {
              for (i = 0; i < concertLatitude.length; i++) { 
                  concertHeatMap.push(new google.maps.LatLng(concertLatitude[i], concertLongitude[i]) );
              }
              return concertHeatMap;
          }

        var infoWindow = new google.maps.InfoWindow({map: map});

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            var marker = new google.maps.Marker({
            position: pos,
            map: map,
            title: 'Current Location!'
          });

        var infowindow = new google.maps.InfoWindow({
          content: ''
        });

        for (i = 0; i < concertVenue.length; i++) {  
          var eventMarker = new google.maps.Marker({
            position: new google.maps.LatLng(concertVenue[i].latitude, concertVenue[i].longitude),
            map: map,
            icon:'../images/icon.png'
          });

        var contentString = 
        '<strong>' + concertArtist[i].name + '</strong><br>' + concertVenue[i].name + '<br>' + moment(concertDateTime[i]).format('MMMM Do YYYY') + ', ' + moment(concertDateTime[i]).format('h:mm a') +
        
        '<br>' + '<div id=\"concert_' + concertId[i] + '\" onclick=\"showWindow(\''+ getStuff(i) +'\')\">More Info</div>';

        (function(useMarker, useInfo, useContent) {
          useMarker.addListener('click', function() {
            useInfo.open(map, this);
            useInfo.setContent(useContent);
          });
        })(eventMarker, infowindow, contentString);
        }

        map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function getStuff(i){
        console.log('doing stuff for: ' + i);
        var foundFavourite = favourites.find(function(favourite){
          return favourite == concertId[i];
        });
        console.log(favourites);
        console.log(foundFavourite);
        var isFavourite = !!foundFavourite;

        return '<h3>' + concertArtist[i].name + 
        '<br><hr></h3><h5>' + concertVenue[i].name + 
        '<br></h5>' + moment(concertDateTime[i]).format('MMMM Do YYYY') +
        ' at ' + moment(concertDateTime[i]).format('h:mm a') +
        '<br>' + concertVenue[i].city + ', ' + concertVenue[i].region +
        '<hr>Ticket Status: ' + concertObject[i].ticket_status + 
        '<br><span onClick=&quot;favouriteConcert('+concertId[i]+')&quot;>' + getFavouriteHtml(isFavourite) + '</span>' +
        '<br><br><a href=&quot;' + concertObject[i].url + '&quot target=&quot_blank&quot class=&quot;btn darktealBtn white btnPad loginBtn&quot;>Buy Ticket</a>';
      }

  </script>";
}

function buildUrlProper($base, $queryParams) {
  return $base . '?' . http_build_query($queryParams);
}

function dump($v,$t=""){
  echo "<h2>".$t."</h2>";
  echo "<pre>";
  print_r($v);
  echo "</pre>";
}

function cGet($u){
  // create curl resource 
  $ch = curl_init(); 
  
  // set url 
  curl_setopt($ch, CURLOPT_URL, $u); 
  
  //return the transfer as a string 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  
  // $output contains the output string 
  $output = curl_exec($ch); 
  
  // close curl resource to free up system resources 
  curl_close($ch);      

  return $output; 
}

if (!$dbcon)
  {
    die('Could not connect: ' . mysql_error());
  }
  ?>
