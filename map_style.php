<head>
		<meta charset="utf-8" />
		<title>The 6IX</title>
		
		<!-- Attach our CSS -->
	  	<link rel="stylesheet" href="css/reveal.css">	
	  	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/app.css" />
	<link rel="stylesheet" href="css/base.css" />

	<link rel="stylesheet" href="font-awesome-4.6.1/css/font-awesome.min.css">
	  	
		<!-- Attach necessary scripts -->
		<!-- <script type="text/javascript" src="jquery-1.4.4.min.js"></script> -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
		<script type="text/javascript" src="js/vendor/jquery.reveal.js"></script>
		<script src="js/vendor/jquery.min.js"></script>
	  <script src="js/foundation.min.js"></script>
	  <script src="js/vendor/what-input.min.js"></script>
	  <script src="js/foundation.min.js"></script>
	  <script src="js/app.js"></script>
		
		<style type="text/css">
			body { font-family: "HelveticaNeue","Helvetica-Neue", "Helvetica", "Arial", sans-serif; }
			.big-link { display:block; margin-top: 100px; text-align: center; font-size: 70px; color: #06f; }


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



#img{
	max-height: 1000px;
}

	</style>
</head>

<body class="tealBg">
<div class="top-bar">
	<div class="top-bar-left">
		<div class="heading-logo">
			<img src="images/logo_header.png">
		</div>
			<ul class="dropdown menu"data-dropdown-menu>
				<li class="has-form"></li>
					<li class="menu-text"></li>
					<li><a href="#" class="btn darktealBtn white btnPad loginBtn" data-reveal-id="myModal2" data-animation="fade"> Filter Event </a>
				</h4></li>
				<li><a href="#" class="btn darktealBtn white btnPad loginBtn" data-reveal-id="myModal"data-animation="none"> Filter Venue </a>
				</h4></li>
				<li><a href="#" class="btn darktealBtn white btnPad loginBtn" data-reveal-id="myModal"data-animation="fade"> Favourites
				</h4>   <i class="fa fa-star fa-lg" aria-hidden="true"></i></a></li>
			</ul>
	</div>
	<div class="top-bar-right">
		<ul class="menu">
			<li class="has-form">
		  		<div class="row collapse">
			   		<div class="large-8 small-9 columns">
			      		<h5><input type="text" placeholder="Search"></h5>
			    	</div>
				</div>
			</li>
		</ul>
	</div>
</div>

<div class="mapBreak"></div>

<!-- Favourites Modal -->


		<div id="myModal2" class="reveal-modal" >
			<h1>Event</h1>
			<hr>
			<p><artistTitle>Artist Name</artistTitle></p>
			<p><h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum maiores alias ea sunt facilis impedit fuga dignissimos illo quaerat iure in nobis id quos, eaque nostrum! Unde, voluptates suscipit repudiandae!</p></h5>
			<a class="close-reveal-modal">&#215;</a>

			<hr>
			<p><h6>June 23</h6></p>
			<p><h5>Massey Hall</h5></p>
			<p><h5>178 Victoria St. Toronto, On</h5></p>
		</div>

		<div id="myModal" class="reveal-modal" >
			<h1>Favourites</h1>
	<hr>
			<p><artistTitle>AWOLNATION</artistTitle></p>
			<p><h6>June 23</h6></p>
			<p><h5>Massey Hall</h5></p>
			<p><h5>178 Victoria St. Toronto, On</h5></p>
	
			<a class="close-reveal-modal">&#215;</a>

			
		</div>

		<!-- Footer -->

		<footer class="footer">
	  <div class="row full-width">
	    <div class="small-12 medium-3 large-4 columns">
	      	<i class="fi-laptop"></i>
	     		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum maiores alias ea sunt facilis impedit fuga dignissimos illo quaerat iure in nobis id quos, eaque nostrum! Unde, voluptates suscipit repudiandae!</p>
	    </div>

	    <div class="small-12 medium-3 large-4 columns text-center">
	     	<i class="fi-html5"></i>
	      		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit impedit consequuntur at! Amet sed itaque nostrum, distinctio eveniet odio, id ipsam fuga quam minima cumque nobis veniam voluptates deserunt!</p>
	    </div>
	     
	     <div class="small-12 medium-3 large-4 columns text-center">
	     	<i class="fi-html5"></i>
	      		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit impedit consequuntur at! Amet sed itaque nostrum, distinctio eveniet odio, id ipsam fuga quam minima cumque nobis veniam voluptates deserunt!</p>
	    </div>
</footer>

	<script>
	$(document).foundation();
	</script>

</body>
</html>
