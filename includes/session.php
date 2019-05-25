<?php 
if (!isset($_SESSION)) {
	session_start();
} 


function msg() {
	if (isset($_SESSION['msg'])) {
		$mmsg = $_SESSION['msg'];
		 
 	$_SESSION['msg']=null;
		return $mmsg;
	} 
}
function err() {
	if (isset($_SESSION['errors'])) {
		$mmsg = $_SESSION['errors'];
		 
 	$_SESSION['errors']=null;
		return $mmsg;
	} 
}




?>
