<?php
  error_reporting(0);
  include ("../conf/conn.php");
  include ("../conf/function.php");
  include ("../conf/fy1.php");
  $table=$nav_table;
  if ($bs=="dele" && $did){
    $query="delete from $table where id='$did' "; 
    $res=mysql_query($query, $conn);
  }
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
  <tr><td width="15%"><b>一级分类：产品介绍</b></td>
  <td colspan="2" align="left"><a href="add5.php?pro_class1=&pro_class=" style="color:#000000;">编辑</a></td>
  </tr>
<?php
$sql_1="select * from $table where level='2' and type1='pro' order by sx,id asc";
$res_1=mysql_query($sql_1);
$i=1;
$k=1;
$j=1;
while($rows_1=mysql_fetch_array($res_1)){
?>
  <tr>
    <td width="10%" height="26" align="center"  style="border-top:solid 1px #000;border-bottom:solid 1px #000"><b>产品大类：</b></td>
	<td width="3%" align="left"  style="border-top:solid 1px #000;;border-bottom:solid 1px #000"><img id="closed<?=$i?>" src="images/closed.gif" onclick="document.getElementById('pro<?=$i?>').style.display='block';document.getElementById('opened<?=$i?>').style.display='block';this.style.display='none';" /><img style="display:none" id="opened<?=$i?>" src="images/opened.gif" onclick="document.getElementById('pro<?=$i?>').style.display='none';document.getElementById('closed<?=$i?>').style.display='block';this.style.display='none';" /></td>
	<td align="left" width="87%" style="border-top:solid 1px #000;border-bottom:solid 1px #000"><?php echo $rows_1['name']?><a href="add5.php?pro_class=<?=$rows_1['id']?>" style="color:#000000; margin-left:15px;">编辑</a></td>
  </tr>
  <tr>
    <td colspan="3" id="pro<?=$i?>" style="display:none;" align="left">
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
$sql_2="select * from $table where level='3' and up_id='".$rows_1['id']."' order by sx,id asc";
$res_2=mysql_query($sql_2);
while($rows_2=mysql_fetch_array($res_2)){
?>
       <tr>
         <td width="10%" style="padding-left:100px;">&nbsp;</td>  
         <td width="90%" style="padding-left:10px;" align="left"><?php echo $rows_2['name']?> <a href="add5.php?pro_class=<?=$rows_2['id']?>" style="color:#000000; margin-left:15px;">编辑</a></td>
       </tr>
	   

<?php $k++;}?>  
     </table>
	</td>
  </tr>
<?php $i++;}?>  
</table>
<iframe name="navframe"  style="display:none;"></iframe>
</body>
</html>
