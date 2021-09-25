<?php 
	require_once('./backend/creds.php'); 
    $page = $_SERVER['PHP_SELF'];
     $sec = "3600";
?>

		<div id="mainContainer" class="div2">
			<p id="grid-item">
			<?php 
				$GetIT = 'SELECT message FROM messages WHERE active=1 and expirationdate >= sysdate() and visibility=1';
				
				$result = mysqli_query($conn, $GetIT) or die (mysqli_error($conn));

				if(isset($result)){
					echo $result;
				}else{
					echo "Welcome to the Cordis GRC -- Proudly maintained by Kuehne-Nagel";
				}
			?>
			</p>
		</div>	