<?php
  error_reporting(0); 
  include ("../conf/conn.php");
  $sql="select * from $login_table ";
  $res=mysqli_query($conn,$sql);
  $rows=mysqli_fetch_array($res);
  $username=$rows['username'];
  $password=$rows['password'];
  $id=$rows['id'];
  
  if ($bs==1 && $id){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password1=$_POST['password1'];
	
	$sql="select * from $login_table where id='$id'";
	$res=mysqli_query($conn,$sql);
	$rows=mysqli_fetch_array($res);
	
	$passworda=$rows['password'];
	if ($password==$passworda)
	{
      $sql="update $login_table set username='$username',password='$password1' where id='$id'";
	  $res1=mysqli_query($conn,$sql);
	}
	else
	{
	  echo "sorry";
      echo "<meta HTTP-EQUIV='REFRESH' CONTENT='2; URL=pasw.php'>";
	}
	if ($res1)
	{
	  echo "ok";
      echo "<meta HTTP-EQUIV='REFRESH' CONTENT='2; URL=pasw.php'>";
	}  
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="css/css.css" type=text/css rel=stylesheet>
</head>
<body>
<form name="form1" action="?bs=1&id=<?php echo $id?>" method="post">
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
  <tr><td height="40" align="center" bgcolor="#DCDCDC"><span style="color:#6D6D6D"><b>管理员密码修改</b></span></td>
  </tr>
  <tr>
    <td align="center"  bgcolor="#FFFFFF">
	<div style="margin:10px 0 10px 0">
	 <table width="60%" border="0" cellpadding="0" cellspacing="1" bgcolor="#333333">
      <tr>
        <td align="right" bgcolor="#E4E4E4"><b>用户名:</b></td>
        <td height="30" align="left" bgcolor="#FFFFFF">&nbsp;<input name="username" type="text" id="username"  value="<?php echo $username?>"/></td> </tr>
	  <tr>
        <td align="right" bgcolor="#E4E4E4"><b>旧密码:</b></td>
        <td height="30" align="left" bgcolor="#FFFFFF">&nbsp;<input name="password" type="password" id="password" /></td></tr>	  
	  <tr>
        <td align="right" bgcolor="#E4E4E4"><b>新密码:</b></td>
        <td height="30" align="left" bgcolor="#FFFFFF">&nbsp;<input name="password1" type="password" id="password1" /></td></tr>
	  <tr>
	    <td height="50" colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="确认修改" /></td>
	    </tr>
	 </table></div>
    </td>
  </tr>
  </table>
</form>
</body>
</html>
