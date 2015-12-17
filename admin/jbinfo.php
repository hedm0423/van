<?php
  error_reporting(0);
  include ("../conf/conn.php");
  
if ($bs=="add"){
$sql_s="select * from $jbinfo_table";
$res_s=mysqli_query($conn,$sql_s);
$total=mysqli_num_rows($res_s);
if ($total==0){
  $sql="insert into $jbinfo_table (id,title,gjz,ms,notice,link) values(null,'$title','$gjz','$ms','$notice','link')";
  //echo $sql;
  $res=mysqli_query($conn,$sql);
}
else{
  $sql="update $jbinfo_table set title='$title',gjz='$gjz',ms='$ms',notice='$notice',link='$link' ";
  //echo $sql;
  $res=mysqli_query($conn,$sql);
}
}  
  
  
$sql_jb="select * from $jbinfo_table order by id desc limit 0 ,10";
$res_jb=mysqli_query($conn,$sql_jb);
$rows_jb= mysqli_fetch_array($res_jb);
$title_index=$rows_jb['title'];  
$gjz=$rows_jb['gjz'];  
$ms=$rows_jb['ms']; 
$notice=$rows_jb['notice']; 
$link=$rows_jb['link']; 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/css.css" rel="stylesheet" type="text/css"> 
<script type="text/javascript" src="../js/fun.js"></script>
</head>

<body style="margin:0; font-size:12px;">
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr><td height="40" align="center" bgcolor="#DCDCDC"><span style="color:#6D6D6D"><b>基本信息</b></span></td></tr>
  
</table>
<form name="form1" action="?bs=add" method="post">
<table width="100%" border="0" cellpadding="0" cellspacing="0" >			
  <tr><td bgcolor="#FFFFFF"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999">
    <tr bgcolor="#E4E4E4">
      <td width="16%" height="25" align="center" bgcolor="#E4E4E4"><b>网站名称</b></td>
      <td colspan="2" bgcolor="#FFFFFF"><input name="title" type="text" id="title" style="width:300px;"  value="<?=$title_index?>"/></td>
      </tr>
	  
	  <tr bgcolor="#E4E4E4">
      <td width="16%" height="25" align="center" bgcolor="#E4E4E4"><b>关键字</b></td>
      <td colspan="2" valign="top" bgcolor="#FFFFFF"><textarea name="gjz" cols="50" rows="3" id="gjz" style="width:300px;"><?=$gjz?></textarea>(关键字请用 "|" 来间隔)</td>
      </tr>
	  <tr bgcolor="#E4E4E4">
      <td width="16%" height="25" align="center" bgcolor="#E4E4E4"><b>描述</b></td>
      <td colspan="2" bgcolor="#FFFFFF"><textarea name="ms" cols="50" rows="5" id="ms" style="width:300px;"><?=$ms?></textarea></td>
      </tr>
	  
	  <!--
	  <tr bgcolor="#E4E4E4">
      <td width="16%" height="25" align="center" bgcolor="#E4E4E4"><b>网站公告</b></td>
      <td width="33%" valign="top" bgcolor="#FFFFFF"><textarea name="notice" cols="50" rows="5" id="notice" style="width:300px;"><?=$notice?></textarea></td>
      <td width="51%" valign="middle" bgcolor="#FFFFFF">公告链接
        <input name="link" type="text" id="link" value="<?=$link?>" /></td>
	  </tr>
	  -->
	  
	  <tr bgcolor="#E4E4E4">
	    <td height="25" align="center" bgcolor="#FFFFFF">&nbsp;</td>
	    <td colspan="2" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="提交" /></td>
	    </tr>
</table></td></tr></table></form>
</body>
</html>