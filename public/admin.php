<?php session_start(); ?>
<?php 
include_once('../includes/layout/header.php');
include_once('../includes/session.php');
include_once('../includes/functions.php');
include_once('../includes/cnnectdb.php');



login_check ();








?>
 
<style>

ul {
  list-style-type: none;
}
 
 
 .space1{
    
      margin-left : 240px;
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

<li class="active"><a href="admins.php"><?php echo   $row["item_name"];  ?> </a>

             <?php 
$query1 = "SELECT * FROM `pages`  WHERE visible=1 AND `pages`.`item_name_id`= ".$row["id"];
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) > 0) {

          while($row1 = mysqli_fetch_assoc($result1)) {
           ?>
 <ul  >
               
            <li><a href="admins.php"> <?php echo   $row1["page_name"];  ?>  </a></li>
           
             
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
 
 
 
 
 
 
 
 <div class="container-fluid   space1"   >
 
 
 
  <div class="container">
        <h1>Admin Area</h1>
        <p>Welcome <?php echo htmlentities($_SESSION['admin_username']); ?> in Control Panel ! </p> 
      <p>
        <a type="button" class="btn btn-lg btn-danger"   href="manage_content.php">manage content</a>
        <a type="button" class="btn btn-lg btn-primary"   href="admins_manage.php">Admins manage</a>
        <a type="button" class="btn btn-lg btn-success"   href="logout.php">logout</a>
 
      </p>          
      </div>
  
 
   </div>
 
 
 
 
 
  
 
  </body>
</html>

 
 <?php  
include("../includes/layout/footer.php");




?>