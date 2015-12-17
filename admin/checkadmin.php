<?php 
   require "../conf/conn.php"; 
   if(empty($username) || empty($password)) 
   { 
      echo "<meta http-equiv=refresh content=0;url='login.php'>"; 
      exit; 
   } 
   else
      echo "<meta http-equiv=refresh content=2;url='index.php'>"; 
   $sql="select username,password from $login_table where username='$username' and password='$password' "; 
   $res=mysqli_query($conn,$sql);
   if(mysqli_num_rows($res)!=1)
   { 
      echo "error!"; 
      echo "<meta http-equiv=refresh content=2;url='login.php'>"; 
      exit; 
   } 
   else
      echo "<meta http-equiv=refresh content=10;url='index.php'>"; 
   unset($res); 
?> 