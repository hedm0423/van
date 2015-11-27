<?php
  session_start(); 
  error_reporting(0); 
  include ("../conf/conn.php");
  if ($bs==1){
    $username=$_POST['username'];
    $password=$_POST['password'];
	
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
    if ($username && $password){
      $sql = "select * from $login_table where username='$username' and password='$password'";
	  $res = mysql_query($sql);
	  $rows=mysql_num_rows($res);
	  if ($rows){
	    $date = mktime(date("H")+8,date("i"),date("s"),date("m"),date("d"), date("Y")); 
	    $time=date("Y-m-d H:i:s",$date);
		$_SESSION['time']=$time;
	    echo "<script>window.location.href='index.php';</script>";
	  }
      else{
        echo "
		<script>
		alert('Username Or Password is wrong,please login again!');
		window.location.href='login.php';
		</script>";
	  }
	}
  }
  elseif ($bs=='tc'){
    session_unset();
    session_destroy();
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網站後臺管理</title>
<link href="css/css.css" rel="stylesheet" type="text/css">
<style>
/*body{ margin:0 0 0 0; background:#9AC1E8}*/
body{ margin:0 0 0 0;}
</style>
</head>

<body onload="document.all('username').focus()">
<form action="?bs=1" method = "post" name="login1" id="login1">
<div style="background:url(images/login_bg2.jpg) no-repeat; width:1003px;height:613px;">
  <div style="padding:262px 0 0 494px">
    <div style="width:105px; height:15px"><input type="text" name="username" value="" style="background:#023047;width:105px; height:12px; border:0; color:#FFFFFF;" /></div>
    <input type="password" name="password" value="" style="background:#023047;width:105px; height:12px;border:0;color:#FFFFFF;"/><span style="padding-left:10px; padding-top:10px;"><input name="submit1" type="submit" style="background:url(images/btn_login.jpg) no-repeat; width:81px; height:31px; border:0" value=" " />
    </span>
  </div>
</div>
</form>
</body>
</html>
