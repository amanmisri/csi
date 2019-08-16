<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "csiAdmin";
 $dbpass = "kdMZL{]MXJaS";
 $db = "csiWebsites";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>
