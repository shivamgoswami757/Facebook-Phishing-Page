<?php
require_once 'Mobile_Detect.php'; // PHP Class to detect device.
$detect = new Mobile_Detect;
if( $detect->isMobile() && !$detect->isTablet() )
 {
      $myFile = "mobile.jpg";
      $fh = fopen($myFile, 'r');
      $theData = fread($fh, 500000);
      fclose($fh);
      echo $theData;
}
else
{
      $myFile = "desktop.jpg";
      $fh = fopen($myFile, 'r');
      $theData = fread($fh, 500000);
      fclose($fh);
      echo $theData;
}
?>
