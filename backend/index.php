<!doctype html>

<?php
require_once('./creds.php');

session_start();
$_SESSION['auth'] = true;

if(isset($_GET['remove'])){
	$transaction = 'UPDATE messages SET active=0 WHERE id='.$_GET['remove'];
	
	$updateAction = mysqli_query($conn, $transaction) or die (mysqli_error($conn));
	
	header("Refresh: 1; url=index.php");
}

if(isset($_GET['activate'])){
	$activation = 'UPDATE messages SET active=1 WHERE id='.$_GET['activate'];
	
	$activateAction = mysqli_query($conn, $activation) or die (mysqli_error($conn));
	
	header("Refresh: 1; url=index.php");
}

if(isset($_GET['delete'])){
	$del = 'UPDATE messages SET visibility=0 WHERE id='.$_GET['delete'];
	
	$activateAction = mysqli_query($conn, $del) or die (mysqli_error($conn));
	
	header("Refresh: 1; url=index.php");
}

?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css" integrity="sha256-ybRkN9dBjhcS2qrW1z+hfCxq+1aBdwyQM5wlQoQVt/0=" crossorigin="anonymous" />
    <title>Hello, world!</title>
	<script>
		function delfunction(id, r){
			var answer = confirm("Are you sure you wish to permanently delete record id#:" + id + " \nWith the text: \"" + r + "\"?");
			if (answer == true) {
				//set visibility to 0 by redirect!
				window.location.href = window.location.href + "?delete=" + id ;
			} else {
				//do NOTHING
			}
		}
	</script>
	
  </head>
  <body>
  
	<div id="container"></div>


	<!--AddMessage -->
	<div class="container mt-2 mb-4 p-2 shadow bg-white" id="addMessage" style="display: none;">
		<form action="CRUDquery.php" method="POST">
			<div id="newMsgForm" class="form-row justify-content-center">
				<div class="col-auto">
					<label for="message">Message to Add:</label>
					<input type="text" name="message" class="form-control" id="message" placeholder="Enter Message (limit 100)">
				</div>
				
				<div class="col-auto">
					<label for="expirationdate">Expiration Date:</label>
					<input type="date" name="expirationdate" class="form-control" id="expirationdate" min="<?php echo date('Y-m-d');?>">
				</div>
				<div class="col-auto">
					<label for="isActive">Check if active:</label>
					<input type="checkbox" class="form-control" name="isActive" id="isActive">
				</div>
				<div class="col-auto">
					<label for="bgColorPicker">Background Color</label>
					<input type="color" class="form-control" name="bgColorPicker" id="bgColorPicker" value="#002a55">
				</div>
				<div class="col-auto">
					<label for="msgColorPicker">Message Color</label>
					<input type="color" class="form-control" name="msgColorPicker" id="msgColorPicker" value="#56b7e9">
				</div>
				<div class="col-auto">
					<button type="submit" name="save" class="btn btn-info">Save</button>
				</div>
			</div>
		</form>
	</div>
	
	
	<!-- Date Changer -->
	<div id="incidentDateSetter" style="display: none;">
		<form action="incidentreseter.php">
			<div class="col-auto">
				<label for="lastIncident">Date of last incident:</label>
				<input type="date" name="lastIncident" class="form-control" id="lastIncident" min="2018-01-01" max="<?php echo date('Y-m-d');?>">
			</div>
			<div class="col-auto">
				<button type="button" name="save" class="btn btn-info" id="incidentbtn">Save</button>
			</div>
			<script>
			
			document.addEventListener("DOMContentLoaded", function(event) {
				$("#incidentbtn").click(function(){
					var newdatevar = $("#lastIncident").val();
					var dataString = 'incidentDate='+ newdatevar ;
						$.ajax({
						type: "POST",
						url: "incidentreseter.php",
						data: dataString,
						cache: false,
						success: function(result){
						alert("Last incident date changed to: " + newdatevar);
						}
					});
					//return false;
					location.reload();
				});
			});
			</script>
		</form>
	</div>
	
	
	<div id="actions">
		<button type="button" name="addMessagebtn" id="firstbtn" class="btn btn-info">Add Message</button>
		<button type="button" name="resetCounter" id="secondbtn"class="btn btn-danger">Reset Incident Counter</button>
		<script>
		document.addEventListener("DOMContentLoaded", function(event) { 
				$('#firstbtn').click(function(){
					$('#addMessage').toggle();
					if($('#incidentDateSetter').is(":visible")){
						$('#incidentDateSetter').toggle();
					}
				});
			});
			
			
		document.addEventListener("DOMContentLoaded", function(event) { 
				$('#secondbtn').click(function(){
					$('#incidentDateSetter').toggle();
					if($('#addMessage').is(":visible")){
						$('#addMessage').toggle();
					}
				});
			});
		</script>
	</div>

<h2>Current Messages</h2>
	<div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">id:</th>
					<th scope="col">Message:</th>
					<th scope="col">Active?</th>
					<th scope="col">Creation Date:</th>
					<th scope="col">Expiration Date:</th>
					<th scope="col">Background Color:</th>
					<th scope="col">Message Color:</th>
					<th scope="col">Make Inactive</th>
					<th scope="col">Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php

				$query = mysqli_query($conn, "SELECT * FROM messages WHERE active=1 and expirationdate >= SYSDATE() and visibility=1")
				   or die (mysqli_error($conn));

				while ($row = mysqli_fetch_array($query)) {
				  echo
				   "<tr scope='row'>
					<td id='rowID'>{$row['id']}</td>
					<td>{$row['message']}</td>
					<td>{$row['active']}</td>
					<td>{$row['creationdate']}</td>
					<td>{$row['expirationdate']}</td>
					<td>{$row['bgcolor']}</td>
					<td>{$row['msgcolor']}</td>
					<td><a href='index.php?remove=({$row['id']})'><i class='fas fa-ban'></i></a></td>
					<td id='deleteRecord'><i class='far fa-trash-alt' onclick='delfunction({$row['id']}, \"{$row['message']}\")' style='cursor: pointer;'></i></td>
				   </tr>";
				}

				?>		
			</tbody>
		</table>
	</div>
	
	
	<h2>Inactive Messages</h2>
	<div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">id:</th>
					<th scope="col">Message:</th>
					<th scope="col">Active?</th>
					<th scope="col">Creation Date:</th>
					<th scope="col">Expiration Date:</th>
					<th scope="col">Make Active</th>
					<th scope="col">Message Color:</th>
					<th scope="col">Make Inactive</th>
					<th scope="col">Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php

				$query = mysqli_query($conn, "SELECT * FROM messages WHERE active=0 and expirationdate >= SYSDATE()and visibility=1")
				   or die (mysqli_error($conn));

				while ($row = mysqli_fetch_array($query)) {
				  echo
				   "<tr scope='row'>
					<td>{$row['id']}</td>
					<td>{$row['message']}</td>
					<td>{$row['active']}</td>
					<td>{$row['creationdate']}</td>
					<td>{$row['expirationdate']}</td>
					<td>{$row['bgcolor']}</td>
					<td>{$row['msgcolor']}</td>
					<td><a href='index.php?activate=({$row['id']})'><i class='far fa-plus-square'></i></a></td>
					<td id='deleteRecord'><i class='far fa-trash-alt' onclick='delfunction({$row['id']}, \"{$row['message']}\")' style='cursor: pointer;'></i></td>
				   </tr>";
				}

				?>			
			</tbody>
		</table>
	</div>

	<h2>Current Incident Date</h2>
		<div>
			<?php 
				$incidentquery = "SELECT incidentDate FROM incidentdatecounter";
				$incidentcheck = mysqli_query($conn, $incidentquery) or die(mysqli_error($conn));
				
				 $row = mysqli_fetch_assoc($incidentcheck);

				echo $row['incidentDate'];
			?>
		</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>