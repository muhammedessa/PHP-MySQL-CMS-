<?php
//PASSWORD_DEFAULT

// echo $default1 = password_hash("muhammed", PASSWORD_DEFAULT)."\n";
// echo " <br><br>";
// echo strlen($default1);
?>
<!-- <!-- <br><br><br><br><br> --> -->
  <?php
// $hash = '$2y$10$BCrbPHxmEQx4P0MJJzPYWedv2c0C8WyZP51TJ7zUNYTw76delvbE2';
// $hash1 = '$2y$10$DQLcg12qEmTntUtl.sPs5.38YHQp.qsFmTWeJmxYIw4hWko42aGgq';

// if (password_verify('muhammed', $hash1)) {
//     echo 'Password is valid!    PASSWORD_DEFAULT';
// } else {
//     echo 'Invalid password.';
// }
?>

  
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <?php
//PASSWORD_BCRYPT

// echo $bcrypt = password_hash("muhammed", PASSWORD_BCRYPT)."\n";
// echo " <br><br>";
// echo strlen($bcrypt);
//   ?>
<!-- <br><br><br><br><br> -->
 <?php
// $hash = '$2y$10$ug16c/7MhT7L8P/PDibgg.FY/dLDlyRp.EqVJYJwHUfGcZPGuIXFu';
// $hash1 = '$2y$10$IbeypmZ/2sIVofjle7F40.PUNATD5IuECyf2DL85PChH.YRBTbrNm';

// if (password_verify('muhammed', $hash1)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }
?>

  














  <?php
// $options = [
// 		'cost' => 12,
// ];
// echo $default2 = password_hash("muhammed", PASSWORD_DEFAULT,$options)."\n";
// echo " <br><br>";
// echo strlen($default2);
// // ?>
<!-- <br><br><br><br><br> -->
  <?php
// $hash = '$2y$12$p7sJ4VI36ZKky9Sbfkfxie32o2qomMoDCCp9rAud/YbrNeOSYhB46';

// if (password_verify('muhammed', $hash)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }
?>

 
 
 
 
 
 
 
  <?php
 
// $options = [
//     'cost' => 12,
// ];
// echo $btc = password_hash("muhammed", CRYPT_BLOWFISH, $options)."\n";
// echo " <br><br>";
// echo strlen($btc);
?>
<br><br>
 <?php
// $hash = '$2y$12$FTGR9NVCTbe7gBPZfWhWwegVNNnZktTdsO89vFkLFdJxXDoCqTXpC';

// if (password_verify('muhammed', $hash)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }
 ?>
 






 <?php  
 


echo "new hash";
echo " <br><br>";


$options = [
		'cost' => 12,
];
 
$mypassword = "muhammed";

 $mySalt = md5(uniqid(rand(), true));
	
 $paswdsalt = $mypassword . $mySalt;
	
 
 echo "mypassword : ". $mypassword;
   echo " <br><br>";
 echo  "salt : ".$mySalt;
   echo " <br><br>";
 echo  "mypass with salt : ".$paswdsalt;
   echo " <br><br>";
   
 $hashed_pass =  password_hash($paswdsalt , CRYPT_BLOWFISH,$options);

  echo "hashed pass  : ".$hashed_pass;
  echo " <br><br>";
  echo strlen($hashed_pass);

  echo " <br><br>";   echo " <br><br>";

  if (password_verify($paswdsalt, $hashed_pass)) {
  	echo 'Password is valid!';
  } else {
  	echo 'Invalid password.';
  }







  ?>






