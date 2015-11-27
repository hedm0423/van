<?php
  //error_reporting(0);
  include ("../conf/conn.php");
  include ("../conf/fy.php");
  if ($bs==1)
  {
    $query="delete from down where id='$id' "; 
    $res=mysql_query($query, $conn);
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/css.css" rel="stylesheet" type="text/css"> 
<style type="text/css">
<!--
.STYLE1 {color: #FFFFFF}
-->
</style>
<script type="text/javascript" src="../js/fun.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr><td height="40" align="center" bgcolor="#DCDCDC"><span style="color:#6D6D6D"><b>下载管理</b></span></td>
  </tr>
  <tr>
    <td align="left" class="table_2"><input type="button"  class="add_button1" name="sc" value="上传文件"  onclick="refresh_now('upload.php')" /></td></tr>
	</table>
  <tr><td  bgcolor="#FFFFFF"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
    <tr bgcolor="#E4E4E4">
      <td width="30%" height="25" align="center" bgcolor="#E4E4E4"><b>标题名称</b></td>
      <td width="10%" align="center"><b>上传日期</b></td>
      <td width="41%" align="center"><b>文件名称</b></td>
      <td width="19%" align="center" bgcolor="#E4E4E4"><b>操作</b></td>
    </tr>
<?php
  $sql="select * from down";
  $res=mysql_query($sql,$conn);
  $total=mysql_num_rows($res);
  pageft($total,6);
  $sql="select * from down order by id desc limit $firstcount,$displaypg ";
  $res=mysql_query($sql,$conn);
  if (strlen($res)==0)
    echo "NO DATE";
  else	
   
  while ($rows=mysql_fetch_array($res))
  {
    $id = $rows['id'];
?>
    <tr>
      <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rows['title']?></a></td>
      <td align="center" bgcolor="#FFFFFF"><?php echo $rows['uptime']?></td>
      <td align="center" bgcolor="#FFFFFF"><?php echo $rows['upname']?></td>
	
      <td align="center" bgcolor="#E4E4E4"> 
	  <a href="upload.php?id=<?php echo $id?>" class="mycolor2"><img src="images/edit.gif" title="点击修改" /></a>
      <a id="dele" oonclick="dele('down.php',<?php echo $rows['id']?>)"	href="#"  class="mycolor2"><img src="images/del.gif" title="点击删除" /></a> </td>
    </tr>
    <?php }?>
  </table></td></tr></table>
<table align="center"><tr><td><?php  echo $pagenav;?></td></tr></table>
</body>
</html>