<?php session_start(); ?>
<?php 
include_once('../includes/layout/header.php');
include_once('../includes/session.php');
include_once('../includes/functions.php');
include_once('../includes/cnnectdb.php');
login_check ();
if (isset($_POST["submit"])) {

	$menu =  checkEmpty(check_input($_POST["menu"]) ) ;
	$menu =   check_length($_POST["menu"] , 12, 4)   ;
	$optradio=  (int) $_POST["optradio"]  ;
	$rank=  (int) $_POST["rank"]  ;
	$menu2 =  mysqli_real_escape_string($conn , $menu) ;

	if (!empty($errors)) {
		
		 $_SESSION['errors']=$errors  ; 
		 redirect('create_menu.php');
	}
	
	
	
	$sql = " INSERT INTO `website_navbar`( `item_name`, `rank`, `visible` ) VALUES
	(    '{$menu2}'    ,  '{$rank}'    ,    {$optradio}     )     ";

	if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn)>0) {
		 $_SESSION['msg']=success_msg_menu();
       redirect ("manage_content.php");
 
	} else {
	 	 $_SESSION['msg']=error_msg_menu();
		redirect("create_menu.php");
		 }

}else{
redirect("create_menu.php");
}



 




