<?php session_start(); ?>
<?php 
include_once('../includes/layout/header.php');
include_once('../includes/session.php');
include_once('../includes/functions.php');
include_once('../includes/cnnectdb.php');

login_check ();



$id_menu = mysqli_real_escape_string($conn , $_GET["menu"]);
 
		$query1 = "SELECT * FROM `pages`  WHERE   `pages`.`item_name_id`= ".$id_menu;
		$result1 = mysqli_query($conn, $query1);
		
 	if (mysqli_num_rows($result1) > 0) {
 		
 		 	 $_SESSION['msg']=fail_delete_msg_menu();
		redirect("delete_menu.php");
 		
 	}else{
 		

	$id1=  (int) $id_menu  ;
 
	if (!empty($errors)) {
		
		 $_SESSION['errors']=$errors  ; 
		 redirect('delete_menu.php');
	}
 
	$sql = "DELETE FROM `website_navbar`  WHERE id= {$id1} LIMIT 1";
	
	
	
	$result = mysqli_query($conn, $sql);
	if ($result && mysqli_affected_rows($conn)>0) {
		
		$_SESSION['msg']=success_delete_msg_menu();
       redirect ("manage_content.php");
 
	} else {
	 	 $_SESSION['msg']=fail_delete_msg_menu();
		redirect("delete_menu.php");
		 }
}

 	 
 
  
 ?>
 












