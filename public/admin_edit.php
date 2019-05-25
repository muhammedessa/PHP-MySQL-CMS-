<?php session_start(); ?>
<?php 
include_once('../includes/layout/header.php');
include_once('../includes/session.php');
include_once('../includes/functions.php');
include_once('../includes/cnnectdb.php');

login_check ();
 

if (isset($_POST["submit"])) {
	
	$id = $_SESSION['id'];
 
	$fname =  mysqli_real_escape_string($conn,checkEmptyPage(check_input($_POST["fname"]) ))  ;
	$lname =  mysqli_real_escape_string($conn,checkEmptyPage(check_input($_POST["lname"]) ))  ;
	$uname =  mysqli_real_escape_string($conn,checkEmptyPage(check_input_admin($_POST["username"]) ))  ;
	$pwd =  mysqli_real_escape_string($conn,checkEmptyPage(check_input_admin($_POST["pwd"]) ))  ;
	$email =  mysqli_real_escape_string($conn,checkEmptyPage(check_input_admin($_POST["email"]) ))  ;
 
	$pwd1 = password_hash($pwd ,PASSWORD_BCRYPT);
	
	if (!empty($errors)) {
		
		 $_SESSION['errors']=$errors  ; 
		 redirect('admins_manage.php');
	} 
 
 	$sql = "UPDATE `admins` SET `username`='{$uname}',`password`='{$pwd1}',
 	`firstname`='{$fname}',`lastname`='{$lname}',`email`='{$email}'  WHERE `id`= {$id}";
 
 	if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn)>0) {
		 $_SESSION['msg']=update_success_msg_admin();
       redirect ("admins_manage.php");
 
	} else {
	 	 $_SESSION['msg']=update_fail_msg_admin();
		redirect("admins_manage.php");
		 }

}else{
redirect("admins_manage.php");
}
