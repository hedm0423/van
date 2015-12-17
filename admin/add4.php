<?php
error_reporting(0);
include ('../conf/conn.php');
include ('../conf/function.php');
$table=$news_table;
if ($id){
  $sql_cx="select * from $table where news_class1='$id' or news_class='$id' order by id desc limit 0,1";
  $res_cx=mysqli_query($conn,$sql_cx);
  $rows_cx=mysqli_fetch_array($res_cx);
  $rows_cx_num=mysqli_num_rows($res_cx);
  if ($rows_cx_num)
    $bs='mnews';
  else{
    $bs='addnews';
  }
}
  
if ($bs1=='addnews'){
  $cont=$_POST['FCKeditor1'];
  $uptime=date("Y-m-d"." "."h:i:s");
  $img=$_POST['pp'];
  $news_class_arr=explode(',',$news_class);
  if ($news_class_arr[1]=='')
    $news_class_arr[1]=$news_class_arr[0];

  $sql_add="insert into $table (id,news_class,news_class1,title,title1,cont,cont1,auth,copyfrom,img,uptime,read_count)  values(null,'$id','','','','$cont','$cont1','','','$img','$uptime','')";
  $res_add=mysqli_query($conn,$sql_add);
  //echo  $sql_add;
  //echo mysql_error();
  if ($res_add){
    echo "成功!";
    echo "<meta HTTP-EQUIV='REFRESH' CONTENT='1; URL=news1.php'>";
  }  
}
else if ($bs1=='mnews'){
  $uptime=date("Y-m-d"." "."h:i:s");
  $img=$_POST['pp'];
  $cont=$_POST['FCKeditor1'];
  $sql_modify="update $table set cont='$cont',cont1='$cont1',uptime='$uptime',img='$img' where news_class='$id'";
  // echo  $sql_modify;
 $res_modify=mysqli_query($conn,$sql_modify);
  if ($res_modify){
    echo "成功!";
    echo "<meta HTTP-EQUIV='REFRESH' CONTENT='1; URL=news1.php'>";
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
<iframe name="uppic" src="pp.php?id=<?=$rows_cx['id']?>&table=<?=$table?>" width="600" height="300"></iframe><a href="#" onclick="document.getElementById('add_pp').style.display='none';"><img src="images/closelabel.gif" border="0" /></a>
</div>
<form name="form1" method="post" action="add4.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">
      <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#94C1EF">
        <tr>
		  <td height="25" colspan="2" align="center" bgcolor="#8BB9F8" class="font_2">
		    <span style="color:#FFFFFF; font-weight:bold">单页信息添加</span></td></tr>
        <tr>
          <td width="17%" height="25" align="right" bgcolor="#FFFFFF" class="font_2">栏目&nbsp;</td>
          <td width="83%" bgcolor="#FFFFFF"><?=name($nav_table,$id)?></td>
        </tr>
		<tr>
          <td height="25" align="right" bgcolor="#FFFFFF" class="font_2">信息简介</td>
          <td bgcolor="#FFFFFF">
            <textarea name="cont1" cols="50" rows="3" id="cont1"><?php echo $rows_cx['cont1']?></textarea>            </td></tr>					
		
        <tr>
          <td height="25" align="right" bgcolor="#FFFFFF" class="font_2">缩略图和图片集</td>
          <td bgcolor="#FFFFFF">
          <input name="pp" type="text" id="pp" value="<?php echo $rows_cx['img']?>" />
          <input type="button" name="ppsub" value="上传图片" onclick="document.getElementById('add_pp').style.display='block';" />
          <span class="font_2" style="padding-left:50px;">(大图宽度不能超过666)</span> </td>
        </tr>

		<tr>
		  <td colspan="2">
<?php 
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
}else{include ('editor.php');}?>		  </td>
		</tr>
		
		<tr>
		  <td colspan="2">
		    <input name="bs1" type="hidden" id="bs1"  value="<?php echo $bs?>"/>
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