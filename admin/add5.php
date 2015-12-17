<?php
error_reporting(0);
include ('../conf/conn.php');
include ('../conf/function.php');
$table=$pro_table;
if ($pro_class){
  $sql_cx="select * from $table where pro_class='$pro_class' and pro_class1=''";
  //echo $sql_cx;
  $res_cx=mysqli_query($conn,$sql_cx);
  $rows_cx=mysqli_fetch_array($res_cx);
  $hs=mysqli_num_rows($res_cx);
  if ($hs){
    $bs='mnews';
  }
  else{
    $bs='addnews';
  }
}
elseif ($pro_class1=='' && $pro_class==''){
  $sql_cx="select * from $table where pro_class='' and pro_class1='' order by id desc limit 0,1";
  $res_cx=mysqli_query($conn,$sql_cx);
  $rows_cx=mysqli_fetch_array($res_cx);
  $hs=mysqli_num_rows($res_cx);
  if ($hs){
    $bs='mnews';
  }
  else{
    $bs='addnews';
  }
}
  
if ($bs1=='addnews'){
  $cont=$_POST['FCKeditor1'];
  $uptime=date("Y-m-d"." "."h:i:s");
  $img=$_POST['pp'];
  $sql_add="insert into $table (id,pro_class,pro_class1,name,cont,img,uptime)  values(null,'$pro_class','','','','$img','$uptime')";
  $res_add=mysqli_query($conn,$sql_add);
  echo $sql_add;
  echo mysqli_error();
  if ($res_add){
    echo "添加成功!";
    echo "<meta HTTP-EQUIV='REFRESH' CONTENT='1; URL=pro_class.php'>";
  }  
}
else if ($bs1=='mnews'){
  $cont=$_POST['FCKeditor1'];
  $img=$_POST['pp'];
  $sql_modify="update $table set img='$img' where  pro_class='$pro_class' and pro_class1=''";
  echo $sql_modify;
 $res_modify=mysqli_query($conn,$sql_modify);
  if ($res_modify){
    echo "修改成功!";
    echo "<meta HTTP-EQUIV='REFRESH' CONTENT='1; URL=pro_class.php'>";
  }  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/css.css" type="text/css"> 
<style type="text/css">
<!--
#add_pp {
	position:absolute;
	left:50px;
	top:130px;
	width:800px;
	height:213px;
	z-index:1;
	display:none;
}
-->
</style>
</head>
<body>
<div id="add_pp" style="display:none">
<iframe name="uppic" src="pp.php?id=<?=$rows_cx['id']?>" width="600" height="300"></iframe><a href="#" onclick="document.getElementById('add_pp').style.display='none';"><img src="images/closelabel.gif" border="0" /></a>
</div>

<form name="form1" method="post" action="add5.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">
      <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#94C1EF">
        <tr>
		  <td height="25" colspan="4" align="center" bgcolor="#8BB9F8" class="font_2">
		    <span style="color:#FFFFFF; font-weight:bold">产品添加</span></td></tr>
        <tr>
          <td width="17%" height="25" align="right" bgcolor="#FFFFFF" class="font_2">所属系列&nbsp;</td>
          <td width="83%"  colspan="3"bgcolor="#FFFFFF"><?=name($nav_table,$pro_class)?></td>
        </tr>
        <tr>
          <td height="25" align="right" bgcolor="#FFFFFF" class="font_2">缩略图和图片集</td>
          <td bgcolor="#FFFFFF">
          <input name="pp" type="text" id="pp" value="<?php echo $rows_cx['img']?>" />
          <input type="button" name="ppsub" value="上传图片" onclick="document.getElementById('add_pp').style.display='block';" />
          <span class="font_2" style="padding-left:50px;">&nbsp;(BANNER尺寸为666×130)</span> </td>
        </tr>
        
		
		<tr>
		  <td colspan="4">
		    <input name="bs1" type="hidden" id="bs1"  value="<?php echo $bs?>"/>
		    <input name="pro_class" type="hidden" id="pro_class"  value="<?php echo $pro_class?>"/>
		    <div style=" margin:0;padding:1px; background:#E8E8E8;border:solid 1px #ccc; text-align:right; width:100%;">
		      <input type="submit" name="Submit" value="确认添加" />&nbsp;
		      <input type="button" name="cancel" value="取消" onclick='history.go(-1)'/>
		    </div></td></tr>		
      </table>
    </td>
  </tr>
</table>
</form>
</body>
</html>