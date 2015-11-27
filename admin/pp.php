<?php
error_reporting(0); 
include ("../conf/conn.php");
include ('../conf/function.php'); 
function deldir($dir,$file) {
  $dh=opendir($dir);
  $fullpath=$dir.$file; 
  unlink($fullpath);
  closedir($dh);
  
} 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/css.css" type="text/css">
</head>
<body>
<?php
    $allow_hz1="jpg";
    $allow_hz2="png";
    $allow_hz3="gif";
    $allow_hz4="JPG";
    $allow_hz5="PNG";
    $allow_hz6="GIF";
    $allow_hz7="JPEG";
    $allow_hz8="jpeg";

/*if ($id){
  if ($dt){
    $table=$dt;
  }*/
  $sql="select * from $table where id='$id'";
  $res=mysql_query($sql,$conn);
  $rows=mysql_fetch_array($res);
  if($rows['img'])
    $imgx=$rows['img'];
  else
    $imgx=$pp;
//echo "imgx:".$imgx;
  
  $fold='img/';
  if ($bs==2){
    $dir="../img/";
    $upfile1=$_FILES['upfile1']['tmp_name']; 
    $upfilename1=$_FILES['upfile1']['name']; 
    $filepath="../$fold"; //上载文件存放路径
    $img1=$upfilename1; 	  
    $hz1=substr(strrchr($img1, "."), 1);
    if ($hz1==$allow_hz1 || $hz1==$allow_hz2 || $hz1==$allow_hz3 || $hz1==$allow_hz4 || $hz1==$allow_hz5 || $hz1==$allow_hz6){
      $img1=date("Ymdhis").'.'.$hz1;
    }
    else{
      $img1="";
    } 
    $th1_arr=explode('/',$imgx);
    $th1=$th1_arr[$sx].'/';
    $th2=$img1.'/';
    $imgx=str_replace($th1,$th2,trim($imgx));
	//echo "imgx:".$imgx;
    copy($upfile1,$dir.$img1);
	if($id){
      $query="update $table set img='$imgx' where id='$id' "; 
      $res=mysql_query($query, $conn);
	}	
	 echo "<script>parent.document.form1.pp.value='$imgx';window.close();</script>"; 
  }
  elseif ($bs==3){
    $dir="../img/";
    deldir($dir,$file);
    $imgx=str_replace($file.'/',"",trim($imgx));
    $query="update $table set img='$imgx' where id='$id' "; 
    $res=mysql_query($query, $conn);
    if ($res)
      echo "<script>parent.document.form1.pp.value='$imgx';window.close();</script>";
    }
//}

if ($bs==1){
echo 555555;
  $fold='img/';
  $pp=$_POST['pp'];
  $upfile1=$_FILES['upfile1']['tmp_name']; 
  $upfilename1=$_FILES['upfile1']['name']; 
  $filepath="../$fold"; //上载文件存放路径
  $img1=$upfilename1; 	  
  $hz1=substr(strrchr($img1, "."), 1);
  if ($hz1==$allow_hz1 || $hz1==$allow_hz2 || $hz1==$allow_hz3 || $hz1==$allow_hz4 || $hz1==$allow_hz5 || $hz1==$allow_hz6){
     $img1=date("Ymdhis").'.'.$hz1;
  }
  if ($pp){
    $imgx=$pp.$img1.'/';
  }
  else {
    $imgx=$img1.'/';
  }	 
  $arr=getimagesize("../$img1");
  $strarr=explode("\"",$arr[3]);
  $big=$filepath.$img1;
  //$small=$filepath.date("Ymdhis").'s.'.$hz1;
  if(copy($upfile1,$filepath.$img1)){
    //makethumb($big,$small,"150","150");
    copy($upfile1,$filepath.$img1);
    echo "<script>parent.document.form1.pp.value='$imgx';</script>";
    echo "图片上传成功!";
  }
}
?>

<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#B7D5F4">
  <tr bgcolor="#EAF8FD" class="font_1">
    <td height="30" align="center" background="images/bg_table.jpg" class="font_2" ><strong>图片上传</strong></td>
  </tr>
</table>
<form name="form1" action="pp.php" method="post" enctype="multipart/form-data" style="margin:0; padding:0;">
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#B7D5F4">
  <tr bgcolor="#C4E2FB" class="font_1">
    <td height="30" colspan="2" align="left" bgcolor="#FFFFFF" >&nbsp;
      <input name="bs" type="hidden" value="1">
	  <input name="id" type="hidden" value="<?=$id?>">
	  <input name="sx" type="hidden" value="">
	  <input name="dt" type="hidden" value="<?=$table?>">
	  <input name="upfile1" type="file"  size="23">
      <input name="Submit" type="submit" class="input1" value="上传" />
      <input type="hiddenx" name="pp" value="<?php echo $imgx?>" />
      <input type="hidden" name="fold" value="<?php echo $fold?>" /></td></tr>
  <tr bgcolor="#C4E2FB">
    <td height="40" colspan="2" align="left" bgcolor="#FFFFFF">&nbsp;允许上传类型：jpg | jpeg | gif | png | bmp <br />&nbsp;允许上传大小：1 MB</td></tr>
<?php
if ($imgx){
 $imgx_arr=explode('/',$imgx);
 $xh=count($imgx_arr)-1;
 for($i=0;$i<=$xh-1;++$i){
   $img_src=$fold.$imgx_arr[$i];
   $arr=getimagesize("../$img_src");
   $strarr=explode("\"",$arr[3]);
?>  
  <tr bgcolor="#C4E2FB" class="font_1">
    <td width="100"  align="center" bgcolor="#FFFFFF"><img src="../<?php echo $img_src?>"  width="100" height="100" style=" padding:10px;"/><a href="#" class="mycolor3"></a></td>
    <td width="281" align="left" valign="top" bgcolor="#FFFFFF"><a href="#" class="mycolor3"></a>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="font_2">
        <tr><td height="30" style="padding-left:10px;">文件名：<?php echo $imgx_arr[$i]?></td></tr>
        <tr><td height="30" style="padding-left:10px;">大小：<?php echo $arr[0].'×'.$arr[1]?></td></tr>
       <!-- <tr><td height="30" style="padding-left:10px;">位置：<?php echo $ym.$img_src?></td></tr>-->
        <tr>
          <td height="30" style="padding-left:10px;">
		     <span onclick="document.form1.bs.value='2';document.form1.sx.value='<?=$i?>';document.all('upfile1').focus();" style="cursor:pointer"><b>修改</b></span>&nbsp;
		   <a href="?bs=3&id=<?=$id?>&file=<?=$imgx_arr[$i]?>&imgx=<?php echo $imgx?>&table=<?=$table?>" class="mycolor3"><b>删除此图片</b></a></td></tr>
      </table></td>
  </tr>
<?php }}?>  
</table>

</form>
</body>
</html>