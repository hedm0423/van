<?php
/*
  extract($_POST);
  extract($_GET);
  $db_user="root";
  $db_password="";
  $db_server="localhost";
  $db_name="sq_fgsj";
  $conn=mysql_pconnect($db_server,$db_user,$db_password); 
  mysql_query("SET NAMES 'utf8'");
  mysql_select_db($db_name) or die('could not select database '.$db_name);
  $url_this = "http://".$_SERVER ['SERVER_NAME']."";
  $url1="fgsj";
  require("table.php");
*/
  extract($_POST);
  extract($_GET);
  $db_user="kmlabcomcn";
  $db_password="3c567b3a11";
  $db_server="localhost";
  $db_name="kmlabcomcn";
  $conn=mysqli_connect($db_server,$db_user,$db_password); 
  mysqli_query($conn,"SET NAMES 'utf8'");
  mysqli_select_db($conn,$db_name) or die('could not select database '.$db_name);
  $url_this = "http://".$_SERVER ['SERVER_NAME']."";
  $url1="";
  require("table.php");
//echo 11111111;
?>