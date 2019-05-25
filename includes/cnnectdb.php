 <?php
 
define("HOSTNAME" , "localhost");
define("HOST_USER" , "muhammed");
define("HOST_PASS" , "muhammed");
define("DB_NAME" , "website");


 
$conn = mysqli_connect(HOSTNAME, HOST_USER, HOST_PASS, DB_NAME);
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() .  "Error NO: " . mysqli_connect_errno());
}else{
	// echo "Connected";
}
?>








