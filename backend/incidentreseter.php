<?php
	require_once('./creds.php'); 
	session_start();
	
		
	if($_SESSION['auth'] == true){
		//perform action
		if(isset($_POST['incidentDate'])){
			$query = "UPDATE incidentdatecounter SET incidentDate='{$_POST['incidentDate']}'";
			
			$transaction = mysqli_query($conn, $query) or die (mysqli_error($conn));
			header("Location: index.php");
		}else{
			header("Location: index.php");
		}
	}else{
		header("Location: index.php");	
	}
	
?>