<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Front Desk Dashboard</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Arimo&display=swap" rel="stylesheet">
<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('time').innerHTML =
  "The current time is: " + h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
<style>


/* Sticky footer styles
-------------------------------------------------- */
html {
  position: relative;
  min-height: 100%;
}
body {
  margin-top: 90px;
  margin-bottom: 60px; /* Margin bottom by footer height */
  font-family: 'Arimo', sans-serif !important;
  text-shadow: 0px 0px 2px rgba(138, 164, 191, 0.78);
  overflow:hidden;
}

/* <header> */
header nav {
	background-image: url("KNLogo.png");
	background-size: contain;
	background-repeat: no-repeat;
	background-position: center;
	box-shadow: 0px 1px 3px grey;	
	display: flex !important;
	flex-direction: row !important;
	justify-content: space-between !important;
}

.navbar
  .navbar-inner {
    background-color: white;
  }

/* Here be the timer */
header nav div {
	//padding-top: .5rem;
	text-shadow: 0px 0px 2px rgba(138, 164, 191, 0.78);
}
/* </header> */


/* <main> */
main {
	width: 100%
	display: flex;
	//margin: 0px 0px 20px 0px;
	flex-direction: row important!;
	align-items: center;
	//justify-content: center important!;
	//background-color: black;
	//overflow: auto;
	//text-align: center;
	//overflow: hidden;
}

#demo {
	margin-top: -50px;
	width: 70%;
	height: auto;
	//margin-left: 30%;
	//left: 50%;
	//transform: translate(-50%,0);
	//overflow: hidden;
}

.carousel-item img{
	width: 100%;
	height: auto;
	
}

.caption-text {
	text-align: center;
	width:100%
	text-shadow: 0px 0px 2px rgba(138, 164, 191, 0.78);
}

/* </main> */

.centered {
	text-align:center;
	text-shadow: 0px 0px 2px rgba(138, 164, 191, 0.78);
}

/* <footer> */
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 98px; /* Set the fixed height of the footer here */
  line-height: 60px; /* Vertically center the text there */
  background-color: white;
  box-shadow: 0px -1px 3px grey;
  //background-color: #f5f5f5;
}
/* </footer> */



#alerts {
  position: fixed;
  left: 0;
  bottom: 15%;
  width: 100%;
  height: 45px; /* Set the fixed height of the footer here */
  line-height: 45px; /* Vertically center the text there */
  //overflow: hidden;
  font-size: 1.5rem;
}

.text {
	padding-left: 10px;
	background-color: rgba(200,200,200,.3);
	width: 100%;
	color: black;
}

.carousel-indicators {
	position: static;
	bottom: 10%;
}

.display-4 {
	font-size: 2.1rem;
}

</style>
</head>

<body onload="startTime()">

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md  fixed-top .navbar-inner">
		<div id="time"></div>
		<div class="righty">Accident Free: 157 Days!</div>
      </nav>
    </header>

    <!-- Begin page content -->
	<main class="d-flex flex-column justify-content-center">	
			<div id="demo" class="carousel slide" data-ride="carousel">

			  <!-- Indicators -->
			  <ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
				<li data-target="#demo" data-slide-to="3"></li>
				<li data-target="#demo" data-slide-to="4"></li>
			  </ul>

			  <!-- The slideshow -->
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img src="knbd.png" alt="KN Building">
				  <div class="caption-text">
					<h3 class="display-4 text">Welcome to Kuehne+Nagel Inc!</h3>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="knOLD.png" alt="Historic KN Vehicle">
				  <div class="caption-text">
					<h3 class="display-4 text">Providing 125 years of logistics!</h3>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="knSea.png" alt="Shipping by sea at night">
				  <div class="caption-text">
					<h3 class="display-4 text">You have the assets, we have the logistics.</h3>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="knNew.png" alt="Modern KN Vehicle">
				  <div class="caption-text">
					<h3 class="display-4 text">Land. Sea. Air. Kuehne+Nagel can get it there.</h3>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="knpeople.png" alt="KN Employees">
				  <div class="caption-text">
					<h3 class="display-4 text">Kuehne+Nagel - Our customer service makes the difference.</h3>
				  </div>
				</div>
			  </div>
			</div>
		
		
		<!-- Special Messages Here -->
		
		<div id="alerts" class="carousel slide d-flex flex-column" data-ride="carousel" data-interval="10000" >
			<div class="coursel-inner">
				<div class="alert alert-success centered carousel-item active">
					<strong>Happy Birthday</strong> Can anyone guess how old Isaac is today?
				</div>
				<div class="alert alert-success centered carousel-item">
					<strong>こんにちは</strong> Welcome our guest all the way from <mark>Japan</mark>!
				</div>
			</div>
		</div>
		
		
    </main>

    <footer class="footer">
      <div class="container">
        <a class="weatherwidget-io" href="https://forecast7.com/en/31d76n106d49/el-paso/?unit=us" data-label_1="EL PASO" data-label_2="WEATHER" data-font="Arimo" data-icons="Climacons Animated" data-theme="mountains" data-shadow="rgba(138, 164, 191, 0.78)" data-accent="rgba(61, 178, 231, 0.51)" data-textcolor="#3d3d3d" data-highcolor="#ff0000" data-lowcolor="#000fff" >EL PASO WEATHER</a>
			<script>
				!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
			</script>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script>



</body>
</html>
