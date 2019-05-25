<?php session_start(); ?>
<?php 
include_once('../includes/layout/header.php');
include_once('../includes/session.php');
include_once('../includes/functions.php');
include_once('../includes/cnnectdb.php');
login_check ();
  
if (isset($_POST["submit"])) {
	

	$id = $_SESSION['id'];
	$id1=  (int) $id  ;
	$menu =  checkEmpty(check_input($_POST["menu"]) ) ;
	$menu =   check_length($_POST["menu"] , 12, 4)   ;
	$optradio=  (int) $_POST["optradio"]  ;
	$rank=  (int) $_POST["rank"]  ;
	$menu2 =  mysqli_real_escape_string($conn , $menu) ;

	if (!empty($errors)) {
		
		 $_SESSION['errors']=$errors  ; 
		 redirect('edit_menu.php');
	}
	
	
	
	$sql = " UPDATE `website_navbar` SET  `item_name`='{$menu2}',`rank`='{$rank}' ,`visible`={$optradio}  WHERE id= {$id1}";

	if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn)>0) {
		
		$_SESSION['msg']=success_update_msg_menu();
       redirect ("manage_content.php");
 
	} else {
	 	 $_SESSION['msg']=fail_update_msg_menu();
		redirect("edit_menu.php");
		 }

}else{
redirect("edit_menu.php");
}
