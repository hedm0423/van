<?php
error_reporting(0);
include ('../conf/conn.php');
include ('../conf/function.php');
$table="product";
if ($id){
  $sql_cx="select * from $table where id='$id'";
  $res_cx=mysqli_query($conn,$sql_cx);
  $rows_cx=mysqli_fetch_array($res_cx);
  $bs='mnews';
}
else{
  $bs='addnews';
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
<!--<body onload="document.all.name.focus()">-->
<body onload="document.all.name.focus()">
<?php
if ($bs1=='addnews'){
  if ($pro_class==""){echo "<script>alert('请选择作品分类');history.go(-1);</script>";}
  else{
  $cont=$_POST['FCKeditor1'];
  $img=$_POST['pp'];
  $uptime=date("Y-m-d"." "."h:i:s");
  $pro_class_arr=explode(',',$pro_class);
  if ($pro_class_arr[1]=='')
    $pro_class_arr[1]=$pro_class_arr[0];


$str1="'";
$str2='＇';
$name=str_replace($str1,$str2,$name);
$cont=str_replace($str1,$str2,$cont);

 
  $sql_add="insert into $table (id,pro_class,pro_class1,type1,name,cont,img,uptime,cont1,num_pro,price1,price2,size,index_show)  values(null,'$pro_class_arr[0]','$pro_class_arr[1]','','$name','$cont','$img','$uptime','$cont1','$num_pro','$price1','$price2','$size','$index_show')";
  $res_add=mysqli_query($sql_add);
  //echo $sql_add;
 //echo mysql_error();
  if ($res_add){
    echo "成功!";
    //echo "<meta HTTP-EQUIV='REFRESH' CONTENT='1; URL=".$table.".php'>";
    echo "<meta HTTP-EQUIV='REFRESH' CONTENT='1; URL=add3.php'>";
  } 
  } 
}
else if ($bs1=='mnews'){
  $cont=$_POST['FCKeditor1'];
  $img=$_POST['pp'];
$str1="'";
$str2='＇';
$name=str_replace($str1,$str2,$name);
$cont=str_replace($str1,$str2,$cont);  
  if ($bs2==1){
    $pro_class_arr=explode(',',$pro_class);
    $sql_modify="update $table set pro_class='$pro_class_arr[0]',pro_class1='$pro_class_arr[1]',name='$name',cont='$cont',cont1='$cont1',img='$img',num_pro='$num_pro',price1='$price1',price2='$price2',size='$size',index_show='$index_show' where id='$id'";
  }
  else
    $sql_modify="update $table set name='$name',cont='$cont',img='$img',cont1='$cont1',num_pro='$num_pro',price1='$price1',price2='$price2',size='$size',index_show='$index_show' where id='$id'";
  $res_modify=mysqli_query($conn,$sql_modify);
  if ($res_modify){
    echo "成功!";
    echo "<meta HTTP-EQUIV='REFRESH' CONTENT='1; URL=".$table.".php'>";
  }  
}
?>
<div id="add_pp" style="display:none">
<iframe name="uppic" src="pp.php?id=<?=$rows_cx['id']?>&table=<?=$table?>" width="600" height="300"></iframe><a href="#" onclick="document.getElementById('add_pp').style.display='none';"><img src="images/closelabel.gif" border="0" /></a>
</div>
<form name="form1" method="post" action="add3.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">
      <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#94C1EF">
        <tr>
		  <td height="25" colspan="3" align="center" bgcolor="#8BB9F8" class="font_2">
		    <span style="color:#FFFFFF; font-weight:bold">作品添加</span></td></tr>
        <tr>
          <td width="17%" height="25" align="right" bgcolor="#FFFFFF" class="font_2">所属系列&nbsp;</td>
          <td colspan="2" bgcolor="#FFFFFF">
<?php if ($id){?>
<b><?php echo name("nav",$rows_cx['pro_class'])?></b>&nbsp;&nbsp;
<input name='m_nav' value='修改' type=button onclick="document.getElementById('class_sele').style.display='block';document.getElementById('bs2').value='1';">
<?php }?>
<div id="class_sele" <?php if($id){echo "style='display:none'";}?>><?php include ("pro_class_select2.php");?></div>		  </td></tr>
        <tr>
          <td height="25" align="right" bgcolor="#FFFFFF" class="font_2">作品名称&nbsp;</td>
          <td width="43%" bgcolor="#FFFFFF"><input name="name" type="text" id="name"  value="<?php if ($rows_cx['name'])echo $rows_cx['name'];else echo "";?>"/></td>
          <td height="25" align="left" bgcolor="#FFFFFF" class="font_2" style="padding-left:8px;"><!--市场价&nbsp;
            <input name="price1" type="text" id="price1" value="<?php if ($rows_cx['price1'])echo $rows_cx['price1'];else echo "0.00";?>" size="6" maxlength="10" />--></td>
          </tr>
		<tr>
          <td height="25" align="right" bgcolor="#FFFFFF" class="font_2">缩略图和图片集</td>
          <td bgcolor="#FFFFFF">
          <input name="pp" type="text" id="pp" value="<?php echo $rows_cx['img']?>" />
          <input type="button" name="ppsub" value="上传图片" onclick="document.getElementById('add_pp').style.display='block';" />          </td>
          <td bgcolor="#FFFFFF" style="padding-left:8px;">&nbsp;</td>
          </tr>
		<tr>
          <td height="25" align="right" bgcolor="#FFFFFF" class="font_2">作品说明&nbsp;</td>
          <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        

		<tr>
		  <td colspan="3">
<?php 
/**/
if ($rows_cx['cont'])
  $cont=$rows_cx['cont'];
else
  $cont;
if ($cont){
include('fckeditor/fckeditor.php') ;  
$sBasePath = $_SERVER['PHP_SELF'] ; 
$sBasePath = dirname($sBasePath).'/fckeditor/';  
$oFCKeditor = new FCKeditor('FCKeditor1') ; 
$oFCKeditor->BasePath   = $sBasePath ; 
$oFCKeditor->Value  = $cont; 
$oFCKeditor->Create(); 
}else{include ('editor.php');}

?>		  </td>
		</tr>
		
		<tr>
		  <td colspan="3">
		    <input name="bs1" type="hidden" id="bs1"  value="<?php echo $bs?>"/>
		    <input name="bs2" type="hidden" id="bs2"  value=""/>
		    <input name="id" type="hidden" id="id"  value="<?php echo $id?>"/>
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