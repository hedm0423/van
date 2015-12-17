<?php
  error_reporting(0);
  include ("../conf/conn.php");
  include ("../conf/function.php");
  $table=$nav_table;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/css.css" rel="stylesheet" type="text/css"> 
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="30" align="center" bgcolor="#DCDCDC"><span style="color:#6D6D6D"><b>产品分类</b></span></td>
  </tr>
  <tr>
    <td align="left"  bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_2">
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:26px;">
<?php
$sql_1="select * from $table where level='1' and (type1='news' or type1='pro') and id<>'1' order by sx,id asc";
$res_1=mysqli_query($conn,$sql_1);
while($rows_1=mysqli_fetch_array($res_1)){
?>
  <tr>
	<td align="left" width="100%" style="border-bottom:solid 1px #000; padding-left:15px;"><?php echo $rows_1['name']?><a href="add5.php?news_class=<?=$rows_1['id']?>" style="color:#000000; margin-left:15px;">编辑</a></td>
  </tr>
<?php }?>  
</table>
<iframe name="navframe"  style="display:none;"></iframe>
</body>
</html>
