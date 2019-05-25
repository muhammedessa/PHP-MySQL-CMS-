<?php session_start(); ?>
<?php 
include_once('../includes/layout/header.php');
include_once('../includes/session.php');
include_once('../includes/functions.php');
include_once('../includes/cnnectdb.php');

login_check ();

if (isset($_GET["admin"])) {
	$admin_id_selected = $_GET["admin"];
 

}else{
	$admin_id_selected = null;
	 
}


?>




<style>
<!--
.mypad{
padding-top : 5px;
padding-right : 80px;
padding-left : 80px;
}
.mypad1{
padding-top : 10px;
padding-right : 80px;
padding-left : 120px;
}
-->
</style> 
  <h3 class="text mypad1">Manage Admins </h3>
 
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
  
 <div class="container-fluid mypad">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
       
<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Admins</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Add admin</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Edit Admin</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Delete admin</a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
      <h2>Admins information</h2>
  <p>admins information according to database:</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>User name</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
 <?php 
$sql = "SELECT * FROM `admins` ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    	?> 

      <tr>
        <td><?php echo htmlentities($row["username"]);  ?></td>
        <td><?php echo htmlentities($row["firstname"]);  ?></td>
        <td><?php echo htmlentities($row["lastname"]);  ?></td>
        <td><?php echo htmlentities($row["email"]);  ?></td>
        <td><?php echo htmlentities($row["date"]);  ?></td>
       
      </tr> 
       <?php
    }
}
?>  
    </tbody>
  </table>

</div>
    <div role="tabpanel" class="tab-pane" id="profile">
 
<div class="container-fluid mypad">
 <form action='admin_new.php' method='post'>
  <div class="form-group">
    <label  >First name:</label>
    <input type="text" class="form-control" name="fname">
  </div>
  <div class="form-group">
    <label  >Last name:</label>
    <input type="text" class="form-control" name="lname">
  </div>
  <div class="form-group">
    <label  >Username:</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email">
  </div>
 
  <button type="submit" class="btn btn-info" name="submit">Submit</button>
</form>
</div>
</div>
<br> 
    <div role="tabpanel" class="tab-pane" id="messages">


<div class="container">
  <div class="row">
    <div class="col-sm-2">
  

<?php 
$query1 = "SELECT * FROM `admins` ";
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) > 0) {
 while($row1 = mysqli_fetch_assoc($result1)) {?>
 <ul  class="list-group" >
 <li class="list-group-item list-group-item-warning"><a href="admins_manage.php?admin=<?php echo   mysqli_real_escape_string($conn,$row1["id"]);  ?> "><?php echo  mysqli_real_escape_string($conn,$row1["username"]);   ?></a></li>
  </ul>
<?php }}?>  
    
</div>
    <div class="col-sm-10">
<?php 
 
if ($admin_id_selected) {

	$_SESSION['id'] = $admin_id_selected;

$sql = "SELECT * FROM `admins`  WHERE id = ".$admin_id_selected;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    	?> 
<div class="container-fluid mypad">
 <form method='post'  action='admin_edit.php'>
  <div class="form-group">
    <label  >First name:</label>
    <input type="text" class="form-control" name="fname"  value='<?php echo htmlentities($row["firstname"]);  ?>'>
  </div>
  <div class="form-group">
    <label  >Last name:</label>
    <input type="text" class="form-control" name="lname"  value='<?php echo htmlentities($row["lastname"]);  ?>'>
  </div>
  <div class="form-group">
    <label for="pwd">Username:</label>
    <input type="text" class="form-control" name="username" value='<?php echo htmlentities($row["username"]);  ?>'>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="text" class="form-control" name="pwd" value='<?php echo htmlentities($row["password"]);  ?>'>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" value='<?php echo htmlentities($row["email"]);  ?>'>
  </div>
 
  <button type="submit" class="btn btn-info" name="submit">Submit</button>
</form>
</div>
<br><br>
<?php
    }
}}
?> 
    
</div>
</div>
</div>







    
 



</div>
    <div role="tabpanel" class="tab-pane" id="settings">
  <h2>Admins Delete</h2>
  <p>This area to delete admins :</p>            
  <table class="table table-bordered">
    <thead>
     <tr>
        <th>User name</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
<?php 
$sql = "SELECT * FROM `admins` ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    	?> 

      <tr>
        <td><?php echo htmlentities($row["username"]);  ?></td>
        <td><?php echo htmlentities($row["firstname"]);  ?></td>
        <td><?php echo htmlentities($row["lastname"]);  ?></td>
        <td><?php echo htmlentities($row["email"]);  ?></td>
        <td><?php echo htmlentities($row["date"]);  ?></td>
        <td><a type="button" class="btn btn-danger"    href="admin_delete.php?id=<?php echo   mysqli_real_escape_string($conn,$row["id"]);   ?> ">Delete</td>
      </tr> 
    
<?php
    }
}
?> 
</tbody>
  </table>


</div>
  </div>
</div>
 
      </div>
      </div>
 

 
 











 
 <?php  
include("../includes/layout/footer.php");

?>



