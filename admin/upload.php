<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<HEAD> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/css.css" rel="stylesheet" type="text/css">
</HEAD> 
<BODY style="margin:0">

<TABLE width="99%" align="center" cellspacing="1" bgcolor="#CCCCCC" class="table3">
<?php 
error_reporting(0);
include ("../conf/conn.php");

if ($bs=="add"){
  $TimeLimit=60; 
  /*设置超时限制时间默认时间为 30s，设置为0时为不限时 */ 
  set_time_limit($TimeLimit); 
  $upfile=$_FILES['upfile']['tmp_name']; 
  $upfile_name=$_FILES['upfile']['name'];
  $upfile_size=$_FILES['upfile']['size'];
  
  if(($upfile != "none") && ($upfile != "")){ 
    $filepath="../down/"; //上载文件存放路径
    $fileName=$filepath.$upfile_name; 
	//上载文件大小
    if($upfile_size <1024){
	  $fileSize = (string)$upfile_size . "字节";
	} 
    elseif($upfile_size <(1024 * 1024)){
       $fileSize = number_format((double)($upfile_size / 1024), 1) . " KB";
    } 
    else{ 
      $fileSize = number_format((double)($upfile_size/(1024*1024)),1)."MB"; 
    } 
    if(!file_exists($fileName)) { 
      $uptime=date("Ymdhis");
      $hz=substr(strrchr($upfile_name, "."), 1);//取得后缀
      $up1_name=$uptime.".".$hz;
echo $up1_name;
      if(copy($upfile,$filepath.$up1_name)) {
        $sql_add="insert into down (id,title,uptime,upname,down_class) values(null,'$title','$uptime','$up1_name','$down_class')";
        $res_add=mysqli_query($conn,$sql_add);
        echo "1文件". $upfile_name." 已上载成功！";
        echo "<br><br>\n";
        echo "文件位置：$fileName";
        echo "<br><br>\n";
        echo "文件大小：$fileSize";
        echo "<br><br>\n";
	    if ($res_add){
		  if ($adding_id){
		    if ($adding_id=="blank")
	          echo "<meta HTTP-EQUIV='REFRESH' CONTENT='2; URL=add2.php'>";
			else
	          echo "<meta HTTP-EQUIV='REFRESH' CONTENT='2; URL=add2.php?id=$adding_id'>";
		  }
		  else
	        echo "<meta HTTP-EQUIV='REFRESH' CONTENT='2; URL=down.php'>";
		  unlink($upfile); 
	    }	
      } 
      else {echo "2文件 ". $upfile_name."上载失败！"; } 
    } 
    else {echo "3文件 ".$upfile_name."已经存在！"; } 
  } 
  else{echo "你没有选择任何文件上载！"; }
  set_time_limit(30); //恢复默认超时设置
}
elseif ($bs=="modify"){
  $TimeLimit=60; 
  set_time_limit($TimeLimit); 
  $upfile=$_FILES['upfile']['tmp_name']; 
  $upfile_name=$_FILES['upfile']['name'];
  $upfile_size=$_FILES['upfile']['size'];
  
  if($upfile_size <1024){
    $fileSize = (string)$upfile_size . "字节";
  } 
  elseif($upfile_size <(1024 * 1024)){
    $fileSize = number_format((double)($upfile_size / 1024), 1) . " KB";
  } 
  else{ 
    $fileSize = number_format((double)($upfile_size/(1024*1024)),1)."MB"; 
  } 
  
  if(($upfile != "none") && ($upfile != "")){ 
    $filepath="../down/"; 
    $fileName=$filepath.$upfile_name; 
    if(!file_exists($fileName)) { 
      if(copy($upfile,$filepath.$upfile_name)) {
        $sql_up="update down set title='$title',upname='$upfile_name',down_class='$down_class' where id='$id'";
        $res_up=mysqli_query($conn,$sql_up);
        //echo "sql_up1: ".$sql_up;
        echo "1文件". $upfile_name." 已上载成功！";
        echo "<br><br>\n";
        echo "文件位置：$fileName";
        echo "<br><br>\n";
        echo "文件大小：$fileSize";
        echo "<br><br>\n";
	    if ($res_up){
	      echo "<meta HTTP-EQUIV='REFRESH' CONTENT='2; URL=down.php'>";
		  unlink($upfile); 
	    }	
      } 
      else {echo "2文件 ". $upfile_name."上载失败！"; } 
    } 
    else {echo "3文件 ".$upfile_name."已经存在！"; } 
  } 
  else{
    $sql_up="update down set title='$title' where id='$id'";
    $res_up=mysqli_query($conn,$sql_up);
    //echo "sql_up2: ".$sql_up;
    if ($res_up){
      echo "<meta HTTP-EQUIV='REFRESH' CONTENT='2; URL=down.php'>";
    }	
  }
  set_time_limit(30); //恢复默认超时设置
}
?> 
<?php
if ($id){
  $sql="select * from down where id='$id'";
  $res=mysqli_query($conn,$sql);
  $rows=mysqli_fetch_array($res);
  $title=$rows['title'];
  $up1_name=$rows['upname'];
}
?>
<form ENCTYPE = "multipart/form-data" name = "Submitform" action = "upload.php" method = "POST"> 
 <input TYPE = "hidden" name = "MAX_fILE_SIZE" value ="15000000"> 
 <input TYPE = "hidden" name = "bs" value = "<?php if ($id){echo "modify";}else{echo "add";}?>"> 
 <input TYPE = "hidden" name = "id" value = "<?php echo $id?>"> 
<TR bgcolor="#FFFFFF"><TD height="40" align="center" valign="middle" bgcolor="#DCDCDC"><span style="color:#6D6D6D"><b>上传文件</b></span></TD></TR>
<TR bgcolor="#FFFFFF"><TD align="center">&nbsp;</TD></TR>
<TR bgcolor="#FFFFFF">
  <TD align="center"><br />
    <table width="50%" border="0" cellpadding="2" cellspacing="2" bgcolor="#CCCCCC">
      <tr>
        <td align="right" bgcolor="#DCDCDC"><strong>下载栏目：</strong></td>
        <td align="left" bgcolor="#FFFFFF">
		  <select name="down_class">
		    <option>--请选择下载栏目--</option>
<?php
$sql_1="select * from $nav_table where type1='down' and level='2'";
$res_1=mysqli_query($conn,$sql_1);
while($rows_1=mysqli_fetch_array($res_1)){
?>
		    <option value="<?=$rows_1['id']?>" <?php if($rows['down_class']==$rows_1['id'])echo "selected='selected'";?>><?=$rows_1['name']?></option>
<?php }?>
		  </select>
		</td>
        </tr>
		<tr>
        <td align="right" bgcolor="#DCDCDC"><strong>标题：</strong></td>
        <td align="left" bgcolor="#FFFFFF"><input type="text" name="title" size="15" value="<?=$title?>" /></td>
        </tr>
      <tr>
        <td align="right" bgcolor="#DCDCDC"><strong>上传文件：</strong></td>
        <td align="left" bgcolor="#FFFFFF">
		  <?php if ($id){?>
           <?php echo $up1_name?> &nbsp;<input name = "modify" style="height:20px;" value = "修改" type = "button" onclick="document.getElementById('updiv').style.display='block';">
          <?php }?>
          <input name = "upfile" type = "file" size = "30" id="updiv" <?php if ($id){?>style="display:none"<?php }?>></td>
        </tr>
    </table>
    <div id="updiv" <?php if ($id){?>style="display:none"<?php }?>></div></TD>
  </TR>
<TR bgcolor="#FFFFFF"><TD align="center">
  <input type="hidden" name="adding_id" value="<?=$adding_id?>" />
  <input name = "submit" value = "提交" type = "submit">
  <input type="button" name="back" value="取消" onClick="window.location.href='down.php'"></TD>
</TR></fORM></TABLE>
</BODY> 
</HTML>
