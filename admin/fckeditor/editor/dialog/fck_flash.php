<?php
error_reporting(0); 
define("ROOT_PATH","../../../../");
//echo constant("GREETING");
include (ROOT_PATH."conf/conn.php");
include (ROOT_PATH."conf/function.php"); 
if ($bs==1){
$fold=$url_this.$url1."/flash/";
	  $upfile1=$_FILES['upfile1']['tmp_name']; 
	  $upfilename1=$_FILES['upfile1']['name']; 
	  $filepath=ROOT_PATH."/flash/"; //上载文件存放路径
	  
      $allow_hz1="swf";
	 
	  $img1=$upfilename1; 	  
	  $hz1=substr(strrchr($img1, "."), 1);
      if ($hz1==$allow_hz1){
        $img1=date("Ymdhis").'.'.$hz1;
      }
	    $imgx=$img1;
		$imgx=$fold.$imgx;
	  if(copy($upfile1,$filepath.$img1)){
	    echo "<script>parent.document.getElementById('txtUrl').value='$imgx';</script>";
	 }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
</head>

<body style="margin:0; background:#F1F1E3">

<form name="form1" action="?bs=1" method="post" enctype="multipart/form-data">
<input name="upfile1" type="file"  size="23"><input name="Submit" type="submit" class="input1" value="上传" />
</form>
</body>
</html>

