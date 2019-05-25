<?php session_start(); 
 
 
?>
<?php 
include_once('../includes/session.php');
include_once('../includes/functions.php');
include_once('../includes/cnnectdb.php');

login_check ();
 

if (isset($_GET["menu"])) {
	$menu_id_selected = $_GET["menu"];
	$page_id_selected = null;
	 
}elseif (isset($_GET["page"])){
	$page_id_selected = $_GET["page"];
	$menu_id_selected = null;
	
}else{
	$menu_id_selected = null;
	$page_id_selected = null;
}



include_once('../includes/layout/header.php');


?>
 <style>

ul {
  list-style-type: none;
}
 

</style>
 
 
<body>

<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">





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
           ?>

<li >
<a href="manage_content.php?menu=<?php echo   mysqli_real_escape_string($conn,$row["id"]);  ?> "><?php echo  mysqli_real_escape_string($conn,$row["item_name"]);   ?> </a>
 
 
 
 
 
             <?php 
$query1 = "SELECT * FROM `pages`  WHERE visible=1 AND `pages`.`item_name_id`= ".mysqli_real_escape_string($conn,$row["id"]);
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) > 0) {

          while($row1 = mysqli_fetch_assoc($result1)) {
           ?>
 <ul   >
               
            <li><a href="manage_content.php?page=<?php echo   mysqli_real_escape_string($conn,$row1["id"]);  ?> "><h3><?php echo  mysqli_real_escape_string($conn,$row1["page_name"]);   ?> </h3></a></li>
           
             
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
        <!-- /#sidebar-wrapper -->
        










  </div>
</div>

 
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; NAVBAR</span>

<script>
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
</script>











 



 
 
 
 

 




                 




  <div class="container">
  <div class="row">
    <div class="col-sm-2">
    
    
</div>
    <div class="col-sm-10">
<?php  echo   msg(); ?> 
<?php  $errors = err(); ?> 
<?php  error_function($errors); ?> 
    
</div>
</div>
</div>



  <div class="container">
  <div class="row">
    <div class="col-sm-2">

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  
  
  
  <?php 
$query = "SELECT * FROM `website_navbar`  ";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) {
?>
  
  
  
  
  
  
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php   echo   mysqli_real_escape_string($conn,$row["id"]);   ?>"  aria-controls="collapseOne">
          <?php echo mysqli_real_escape_string($conn,$row["item_name"])   . "  ". " ("  .  mysqli_real_escape_string($conn,$row["id"])  . ")"  ;  ?>
        </a>
      </h4>
    </div>
    <div id="collapseOne<?php echo   $row["id"];  ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">

<a href="manage_content.php?menu=<?php echo   mysqli_real_escape_string($conn,$row["id"]);   ?> "><h4><?php echo   mysqli_real_escape_string($conn,$row["item_name"]) ;  ?></h4> </a>
 
 <?php 
$query1 = "SELECT * FROM `pages`  WHERE   `pages`.`item_name_id`= ".$row["id"];
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) > 0) {
while($row1 = mysqli_fetch_assoc($result1)) {
?>

<ul   >
<li><a href="manage_content.php?page=<?php echo   mysqli_real_escape_string($conn,$row1["id"]);  ?> "><h5><?php echo    mysqli_real_escape_string($conn,$row1["page_name"]) ;  ?> </h5></a></li>
</ul>

<?php
 }  }
   ?>
 
</li>
      </div>
    </div>
  </div>
   <?php
  }  }
  mysqli_free_result($result);
  ?>
   
</div>
</div>

<div class="col-sm-10">
   
 <div class="panel panel-danger">
  <div class="panel-heading">Create new Menu</div>
  <div class="panel-body">

  <form method="post" action="menu_submit.php">
  <div class="form-group">
  <label for="text">Menu name:</label>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="text" type="text" class="form-control" name="menu" placeholder="menu">
  </div>
  </div>
 
  <div class="form-group">
<div class="radio">
  <label for="text">Visible : </label>
  <label><input type="radio" name="optradio" value="1">Yes</label>
 
  <label><input type="radio" name="optradio"  value="0">No</label>
</div>
  </div>
 
  <div class="form-group">
  <label for="sel1">Rank : </label>
  <select class="form-control" id="sel1" name="rank">
  
    <?php 
$query = "SELECT rank FROM `website_navbar`  ";
$result = mysqli_query($conn, $query);
$row_cnt = mysqli_num_rows($result);
 
 for ($i =1; $i <= $row_cnt+1 ; $i++) {
	

?>
   
<option  value="<?php  echo $i ; ?>">  <?php  echo $i ; ?>  </option>
 
 
 <?php    } ?>
    

  </select>
</div>
 
 
   
  <button type="submit" class="btn btn-default" name="submit" data-toggle="modal" data-target="#myModal">Submit</button>
</form>




  </div>
</div>
  
  
  

</div>


</div>
</div>


 









 
          
        
  
  
 
  </body>
</html>
 
 
 

 
 <?php  
include("../includes/layout/footer.php");

?>