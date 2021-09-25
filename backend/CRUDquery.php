<?php
	require_once('./creds.php'); 
	session_start();
	
		
	if($_SESSION['auth'] == true){
		if(isset($_POST)){
			
			var_dump($_POST);
			
			foreach( $_POST as $stuff ) {
				if( is_array( $stuff ) ) {
					foreach( $stuff as $thing ) {
						echo $thing.'<br>';
						}
				} else {
					echo $stuff.'<br>';
				}
			}
			
		//Sanitize your data DUMMY!
		$message = addslashes($_POST['message']);
		echo($message . '<br>');
		
		if($_POST['isActive'] == 'on'){
			$checkbox = 1;
		}else if($_POST['isActive'] == 0){
			$checkbox = 0;
		}else if(!isset($_POST['isActive'])){
			$checkbox = 0;
		}else{
			die("We will catch you hacking boy. We are anon. We don't forget, we don't forgive!");
		}
		echo($checkbox.'<br>');
		
		
			
		$transaction = 'INSERT INTO messages(message, active, expirationdate,bgcolor,msgcolor) VALUES (
		"'.$message.'",
		"'.$checkbox.'",
		"'.$bgColorPicker.'",
		"'.$msgColorPicker.'",
		"'.$_POST['expirationdate'].'")';
		
		$action = mysqli_query($conn, $transaction) or die (mysqli_error($conn));
		header("Location: index.php");	
			
		}else{
			die("LIAR! We'll catch you, DON'T THINK WE WON'T!");
		}
		
	} else {
		header("Location: index.php");
		//die("Login Required");
	}
?>