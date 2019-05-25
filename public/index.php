<?php 
include_once('../includes/layout/public_theme/header.php');
include_once('../includes/session.php');
include_once('../includes/functions.php');
include_once('../includes/cnnectdb.php');
 

if (isset($_GET["menu"])) {
	$menu_id_selected = urlencode($_GET["menu"]);
	$page_id_selected = null;

	 
}elseif (isset($_GET["page"])){
	$page_id_selected = urlencode($_GET["page"]);
	$menu_id_selected = null;
	
}else{
	$menu_id_selected = null;
	$page_id_selected = null;
 
}





?>


<style>
<!--
.mycolor{
color : blue ;
}
-->
</style>









<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>



<ul  >
                <li  >
                    <a href="#">
                        CMS
                    </a>
                </li>
                 
                    <?php 
$query = "SELECT * FROM `website_navbar` WHERE visible=1";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {

          while($row = mysqli_fetch_assoc($result)) {
          	$query1 = "SELECT * FROM `pages`  WHERE visible=1 AND `pages`.`item_name_id`= ".mysqli_real_escape_string($conn,$row["id"]);
          	$result1 = mysqli_query($conn, $query1);
           ?>
<?php 
if (mysqli_num_rows($result1) > 0) {
	?>
<li >
<a  >
<?php echo  mysqli_real_escape_string($conn,$row["item_name"]);   ?> </a></li >
 <?php  }else{?>
 
 <a href="index.php?menu=<?php echo   mysqli_real_escape_string($conn,$row["id"]);  ?> ">
<?php echo  mysqli_real_escape_string($conn,$row["item_name"]);   ?> </a></li >
<?php  }?>
 
 
 
 
             <?php 

if (mysqli_num_rows($result1) > 0) {

          while($row1 = mysqli_fetch_assoc($result1)) {
           ?>
 <ul   >
               
            <li><a href="index.php?page=<?php echo   mysqli_real_escape_string($conn,$row1["id"]);  ?> "><h5><?php echo  mysqli_real_escape_string($conn,$row1["page_name"]);   ?> </h5></a></li>
           
             
              </ul>
<?php
          }
          }
 
          
          ?>


</li>

<?php
          }
          }
  mysqli_free_result($result);
          
          ?>

               
            </ul>









</div>

<div id="main">
   <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
</div>




  <div class="container">
  <div class="row">
      <div class="col-sm-2">
 

</div>


<div class="col-sm-10">





<?php  
if ($menu_id_selected) {
 
	 
	$query = "SELECT * FROM `website_navbar` WHERE visible=1 AND  id =  ".$menu_id_selected;
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		 
		while($row = mysqli_fetch_assoc($result)) {

			
			if ($row["item_name"] == "Home") {
				echo '	<div class="panel panel-danger">
	<div class="panel-heading">Home</div>
	<div class="panel-body">
	<p class="mycolor"> 
			PHP is a server-side scripting language designed primarily for web development but also used as a general-purpose programming language. Originally created by Rasmus Lerdorf in 1994,[5] the PHP reference implementation is now produced by The PHP Development Team.[6] PHP originally stood for Personal Home Page,[5] but it now stands for the recursive acronym PHP: Hypertext Preprocessor.[7]

PHP code may be embedded into HTML code, or it can be used in combination with various web template systems, web content management systems and web frameworks. PHP code is usually processed by a PHP interpreter implemented as a module in the web server or as a Common Gateway Interface (CGI) executable. The web server combines the results of the interpreted and executed PHP code, which may be any type of data, including images, with the generated web page. PHP code may also be executed with a command-line interface (CLI) and can be used to implement standalone graphical applications.[8]

The standard PHP interpreter, powered by the Zend Engine, is free software released under the PHP License. PHP has been widely ported and can be deployed on most web servers on almost every operating system and platform, free of charge.[9]
 </p>
 
	</div>
	</div>
	';
				echo '	<div class="panel panel-info">
	<div class="panel-heading">Home</div>
	<div class="panel-body">
	
          		<div class="container">
  
    <img class="img-responsive" src="static/img/php.png" alt="Chania" width="460" height="345"> 
</div>
 
	</div>
	</div>
	';
			}			elseif ($row["item_name"] == "About") {
				echo '	<div class="panel panel-warning">
	<div class="panel-heading">About</div>
	<div class="panel-body">
	<p class="mycolor"> 
	PHP development began in 1995 when Rasmus Lerdorf wrote several Common Gateway Interface (CGI) programs in C,[11][12][13] which he used to maintain his personal homepage. He extended them to work with web forms and to communicate with databases, and called this implementation "Personal Home Page/Forms Interpreter" or PHP/FI.

PHP/FI could help to build simple, dynamic web applications. To accelerate bug reporting and to improve the code, Lerdorf initially announced the release of PHP/FI as "Personal Home Page Tools (PHP Tools) version 1.0" on the Usenet discussion group comp.infosystems.www.authoring.cgi on June 8, 1995.[14][15] This release already had the basic functionality that PHP has as of 2013. This included Perl-like variables, form handling, and the ability to embed HTML. The syntax resembled that of Perl but was simpler, more limited and less consistent.[6]

Lerdorf did not intend the early PHP to become a new programming language, but it grew organically, with Lerdorf noting in retrospect: "I don’t know how to stop it, there was never any intent to write a programming language […] I have absolutely no idea how to write a programming language, I just kept adding the next logical step on the way."[16] A development team began to form and, after months of work and beta testing, officially released PHP/FI 2 in November 1997.

The fact that PHP lacked an original overall design but instead developed organically has led to inconsistent naming of functions and inconsistent ordering of their parameters.[17] In some cases, the function names were chosen to match the lower-level libraries which PHP was "wrapping",[18] while in some very early versions of PHP the length of the function names was used internally as a hash function, so names were chosen to improve the distribution of hash values.[19] </p>
 
	</div>
	</div>
	';
				echo '	<div class="panel panel-info">
	<div class="panel-heading">About</div>
	<div class="panel-body">
	
          		<div class="container">
  
    <img class="img-responsive" src="static/img/php2.png" alt="Chania" width="460" height="345"> 
</div>
 
	</div>
	</div>
	';
			}
			
			
			else{
				echo    htmlentities($row["item_name"])   ;
			}
			

}
	}
	
	
 

}elseif ($page_id_selected) {

		$query1 = "SELECT * FROM `pages`  WHERE visible=1 AND    id= " .$page_id_selected ;
		$result1 = mysqli_query($conn, $query1);

		if (mysqli_num_rows($result1) > 0) {
			echo"	<div class='panel panel-info'>";
			echo"	<div class='panel-heading'>	";
			while($row1 = mysqli_fetch_assoc($result1)) {
				echo  htmlentities($row1["page_name"]) ;

				echo"	</div>";
				?>
 
 
	
  <div class="panel-body">
  <?php echo  nl2br(htmlentities($row1["content"])) ; ?>  
  </div>
 <?php echo "</div> "; ?>  
  <?php 
  
  }
  }
	
	} 
 

  
	 
  ?>
  
  


</div>


</div>
</div>















     
</body>
</html> 












 <?php  
include("../includes/layout/public_theme/footer.php");

?>
