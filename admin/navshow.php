<?php
  include ("../conf/conn.php");
  if ($bs=="show" && $sid){
   $table=$nav_table;
   $sql_show="update $table set show1='$show' where id='$sid'";
   echo $sql_show;
	$res_show=mysql_query($sql_show);
  }

?>