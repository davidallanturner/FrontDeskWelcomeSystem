<?PHP

//SECURE DATABASE DATA//
$host="localhost"; //Host Name
$username="root"; //Mysql username
$password=""; //MySQL password
$db_name="frontDesk"; //Database Name
$tbl_name="messages"; //Table name

//SECURITY PASSWORD DATA//
//$securityPassword="kn1";

$conn = new mysqli($host, $username, $password, $db_name);

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
?>