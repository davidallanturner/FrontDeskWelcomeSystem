<!DOCTYPE html>
<?php 
	require_once('./backend/creds.php'); 
    $page = $_SERVER['PHP_SELF'];
     $sec = "3600";
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
	<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
	<title>Front Desk Digital Signage</title>
	
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
	
	<link rel="stylesheet" href="./assets/bootstrap4/css/bootstrap.min.css">
	<script src="./assets/jquery/jquery-3.4.1.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-rss/3.3.0/jquery.rss.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Exo+2|Galada&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Arimo&display=swap" rel="stylesheet">


  <script>
  document.addEventListener("DOMContentLoaded", function(event) {
    jQuery(function($) {
      $("#rss-feeds").rss(["http://feeds.foxnews.com/foxnews/latest","https://news.google.com/news/rss/headlines/section/topic/TECHNOLOGY", "https://news.google.com/news/rss/headlines/section/topic/SPORTS"],
      {
		limit: 5,
        entryTemplate:'<li style="display:inline-block; padding: 10px;"><a class="rss-text" href="{url}">{title}</a></li>'
      })
    })
  });	
  </script>
  
  
  <style>
.parent {
display: grid;
grid-template-columns: 1248px 333px 333px;
grid-template-rows: 99px 119px 250px 360px 249px;
grid-column-gap: 5px;
grid-row-gap: 5px;
}

.div1 { grid-area: 1 / 1 / 2 / 4; }
.div2 { grid-area: 2 / 1 / 5 / 2; }
.div3 { grid-area: 2 / 2 / 3 / 4; }
.div4 { grid-area: 3 / 2 / 4 / 3; }
.div5 { grid-area: 3 / 3 / 4 / 4; }
.div6 { grid-area: 4 / 2 / 5 / 4; }
.div7 { grid-area: 5 / 1 / 6 / 4; }
  

  

#incidentCounter {
	word-wrap: break-word;
	text-align: center;
	padding: 5px;
	
}


.parent > div {
  text-align: center;

}

.div2 {
	font-family: 'Galada', cursive;
	font-size: 5em;
  display: flex;
  align-items: center;
  justify-content: center;
  color: red;
  text-align: center;

  border: 5px solid black;
}


#incidentCounter > #countOfDays {
	font-family: 'Share Tech Mono', monospace;
    color: black;
	letter-spacing: 0.1em;
	text-align: center;
	font-size: 40px;
}


#clock {
	position: relative;
	background: white;
}

#headerLogo {
	text-align: center;
}

#headerLogo img {
	width:85%;
}

body {
 background: white;
}
  
  
  
  
 /*CLOCK BE HERE! */
 

#clock {
    font-family: 'Share Tech Mono', monospace;
	font-weight: bold;
    text-align: center;
    color: #black;
}

	#clock1 {
		font-size: 45px;
		padding-right: 10px;

	}

	#clock3 {
		font-size: 45px;
		padding-right: 10px;
	
	}
 
 /*CLOCK ENDS HERE!!!! */
  


#weather > a {
	width: 661px;
	height: auto;
	padding-top: 5px;
}

#weather {
	margin-right: 9px;
	float: left;
}

.div1 {
	/*background: red;*/
	  border: 5px solid black;
}

.div2 {
	background: orange;
}

.div3 {
	/*background: yellow;*/
	padding-right: 5px;
	border: 5px solid black;
	padding-top: 5px;
}

.div4 {
	/*background: pink;*/
	border: 5px solid black;
}

.div5 {
	/*text-align: center;*/
	border: 5px solid black;
}

.div6 {
	background: black;
	border: 5px solid black;
	position:relative;
	padding-top: 20px;
	#ls_embed_1581450730 {
		position: absolute;
		bottom: 0;
		left: 0;
	}
}

.div7 {
	padding-top: 30px;
	overflow: hidden;
	background: purple;
	  border: 5px solid black;
}


a.rss-text {
	margin-left: 150px;
}

a.rss-text:link {
	 
		color: black;
		font-size: 45px;
		letter-spacing: 0.1em;
		font-family: 'Share Tech Mono', monospace;
}
  
  
#sideWidgets {
	  border: 5px solid black !important;
}
  
  
  
  </style>
	

</head>
<!-- scroll="no" style="overflow: hidden;" -->
<body  onload="startTime()">

<div class="parent">
	
		<div id="headerLogo" class="div1" style="float: left;">
				<img src="./KNLogo.png" alt="">
		


		</div>
		
		

	<div id="mainContainer" class="div2">
		
		
		<div id="myCarousel" class="carousel slide" data-ride="carousel">

			  
			  <!-- The slideshow -->
			  <div class="carousel-inner">
			  
					<?php 
						$GetIT = 'SELECT message, bgcolor, msgcolor FROM messages WHERE active=1 and expirationdate >= sysdate() and visibility=1';
						
						$result = mysqli_query($conn, $GetIT) or die (mysqli_error($conn));

						if(isset($result)){
							$row_cnt = mysqli_num_rows($result);
								$i=$row_cnt;
								while ($row = $result->fetch_assoc()) {
									if($i>1){
										echo "<div class='carousel-item' id='". $i ."' >".$row['message']."</div>";
										$i--;
									}else{
										echo "<div class='carousel-item active' id='". $i ."'>".$row['message']."</div>";
									}
								}

						}else{
							echo "<div class='carousel'>Welcome to the Cordis GRC -- Proudly maintained by Kuehne-Nagel</div>";
						}
					?>

			  </div>
			  

		</div>

	</div>			

		
		
		
		<!-- <weatherwidget>
		
		<a class="weatherwidget-io" href="https://forecast7.com/en/31d76n106d49/el-paso/?unit=us" data-label_1="EL PASO" data-label_2="WEATHER" data-font="Arimo" data-icons="Climacons Animated" data-theme="mountains" data-shadow="rgba(138, 164, 191, 0.78)" data-accent="rgba(61, 178, 231, 0.51)" data-textcolor="#3d3d3d" data-highcolor="#ff0000" data-lowcolor="#000fff" >EL PASO WEATHER</a>
			<script>
				!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
			</script>
		</div>
						
						
						<round2?>
						
						
						<a class="weatherwidget-io" href="https://forecast7.com/en/31d76n106d49/el-paso/?unit=us" data-label_1="EL PASO" data-label_2="WEATHER" data-days="3" data-font="Arial Black" data-theme="mountains" data-shadow="rgba(168, 185, 193, 0.75)" data-textcolor="#000000" data-highcolor="#ff0000" data-lowcolor="#0000ff" data-suncolor="#ffe65b" data-mooncolor="#fffcc7" data-cloudcolor="rgba(255, 255, 255, 0.8)" data-cloudfill="rgba(255, 255, 255, 0.8)" data-raincolor="#61d4ff" >EL PASO WEATHER</a>
				<script>
					!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
				</script>
				
				
				<round 3 failed>
								<div id="cont_ca38eef2e84a5726d23fa116947fa75b">
					<script type="text/javascript" async src="https://www.theweather.com/wid_loader/ca38eef2e84a5726d23fa116947fa75b"></script>
				</div>
				
				
		<!-- alt weatherwidget -->
		
		<!--<div id="sideWidgets" class="div3"> -->
			<div id="weather" class="div3">
				<a class="weatherwidget-io" href="https://forecast7.com/en/31d76n106d49/el-paso/?unit=us" data-label_1="EL PASO" data-label_2="WEATHER" data-days="3" data-font="Arial Black" data-theme="mountains" data-shadow="rgba(168, 185, 193, 0.75)" data-textcolor="#000000" data-highcolor="#ff0000" data-lowcolor="#0000ff" data-suncolor="#ffe65b" data-mooncolor="#fffcc7" data-cloudcolor="rgba(255, 255, 255, 0.8)" data-cloudfill="rgba(255, 255, 255, 0.8)" data-raincolor="#61d4ff" >EL PASO WEATHER</a>
				<script>
					!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
				</script>
			</div>
		
		
			<div id="incidentCounter" class="div4">
			<p id="countOfDays">Days since last accident: 
			
				<?php 
					$incidentquery = "SELECT DATEDIFF(SYSDATE(),incidentDate) as deltaDate FROM incidentdatecounter";
					$incidentcheck = mysqli_query($conn, $incidentquery) or die(mysqli_error($conn));
					
					 $row = mysqli_fetch_assoc($incidentcheck);
					
					if($row['deltaDate'] <= 30) {
						$dateColor = "red";
					} else if (($row['deltaDate'] >= 30) && ($row['deltaDate'] <= 60)) {
						$dateColor = "orange";
					} else {
						$dateColor = "green";
					}
					
					echo "</div><div class='div5'>";
					echo "<span style='font-size: 150px; color: ". $dateColor ."'>" .$row['deltaDate'] ."</span>";
				?>
			</p>
		
			
		</div>
		<!-- </sidewidget> -->
		
		
	
		
		
		<!-- was width="650" height="364" // 662 is full fill.   -->
		<div id="TV" class="div6">
			<iframe id="ls_embed_1581450730" src="https://livestream.com/accounts/18241891/events/4996378/player?width=560&height=315&enableInfoAndActivity=false&defaultDrawer=&autoPlay=true&mute=true" width="662" height="315" frameborder="0" scrolling="no" allowfullscreen> </iframe>
		</div>


   
	<div class="div7"> 
	  <!-- <rssfeedwidget> -->
		<marquee behavior="scroll" direction="left" scrollamount="40"><div id="rss-feeds"></div></marquee>
	  <!-- </rssfeedwidget> -->
	  
	  			<div id="clock">

				<script>
				function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('clock3').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}

				</script>
					<span id='clock1'>The current time is: </span>
					<span class='time' id='clock3'></</span>
			</div>
	  
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	


</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="./assets/bootstrap4/js/bootstrap.min.js"></script>



</body>
</html>
