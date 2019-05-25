<?php session_start(); ?>
<?php 
include_once('../includes/layout/header.php');
include_once('../includes/session.php');
include_once('../includes/functions.php');
include_once('../includes/cnnectdb.php');

 
if (empty($errors)) {

 




if (isset($_POST["submit"])) {
	
	
	

	
	
 
	$username =  htmlentities($_POST["username"]) ;
	$pass =  htmlentities($_POST["password"] ) ;
 
	$username1 =  mysqli_real_escape_string($conn , $username) ;
	$pass1 =  mysqli_real_escape_string($conn , $pass) ;
	
 	
	$sql = "SELECT  id, `username`,`password`  FROM `admins` WHERE `username`= '{$username1}'  LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if ($result && mysqli_affected_rows($conn)>0) {
		
		$_SESSION['admin_id'] = $row['id'];
		$_SESSION['admin_username'] = $row['username'];
		
 	
	if (password_verify($pass1, $row['password'])) {
		
		 
		$_SESSION['msg']=login_success_msg();
		redirect ("admin.php");
	}else {
	 	 $_SESSION['msg']=login_fail_msg();
		redirect("login.php");
		 }
	 
       
 	} 
else {
	 	 $_SESSION['msg']=login_fail_msg();
		redirect("login.php");
		 }

}else{
redirect("login.php");
}
}