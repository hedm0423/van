<?php
error_reporting(0);
include ('../conf/conn.php');
include ('../conf/function.php');
$table=$pro_table;

  $sql_cx="select * from $table where pro_class1='' and pro_class='' order by id desc limit 0,1";
  $res_cx=mysql_query($sql_cx);
  $rows_cx=mysql_fetch_array($res_cx);
  $rows_cx_num=mysql_num_rows($res_cx);
  if ($rows_cx_num)
    $bs='mnews';
  else{
    $bs='addnews';
  }

  
if ($bs1=='addnews'){
  $cont=$_POST['FCKeditor1'];
  $uptime=date("Y-m-d"." "."h:i:s");
  $sql_add="insert into $table (id,pro_class,pro_class1,type1,name,cont,img,uptime)  values(null,'','','','','$cont','$img','$uptime')";
  $res_add=mysql_query($sql_add);
  //echo  $sql_add;
  //echo mysql_error();
  if ($res_add){
    echo "成功!";
    echo "<meta HTTP-EQUIV='REFRESH' CONTENT='1; URL=pro_banner_add.php'>";
  }  
}
else if ($bs1=='mnews'){
  $uptime=date("Y-m-d"." "."h:i:s");
  $cont=$_POST['FCKeditor1'];
  $sql_modify="update $table set cont='$cont',uptime='$uptime' where pro_class1='' and pro_class=''";
  // echo  $sql_modify;
 $res_modify=mysql_query($sql_modify);
  if ($res_modify){
    echo "成功!";
    echo "<meta HTTP-EQUIV='REFRESH' CONTENT='1; URL=pro_banner_add.php'>";
  }  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/css.css" type="text/css"> 
</head>
<body>

<form name="form1" method="post" action="pro_banner_add.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">
      <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#94C1EF">
        <tr>
		  <td width="100%" height="25" align="center" bgcolor="#8BB9F8" class="font_2">
		    <span style="color:#FFFFFF; font-weight:bold">产品banner(图片尺寸：666 × 133)</span></td>
        </tr>

		<tr>
		  <td>
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
		  <td>
		    <input name="bs1" type="hidden" id="bs1"  value="<?php echo $bs?>"/>
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