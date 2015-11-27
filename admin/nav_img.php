<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/css.css" rel="stylesheet" type="text/css"> 
<script type="text/javascript">
function outHTML() {
  var getValue=document.getElementById("textContent").value;
  var endValue=((getValue.replace(/<(.+?)>/gi,"&lt;$1&gt;")).replace(/ /gi,"&nbsp;")).replace(/\n/gi,"<br>");
  document.form6.nav_cont.value=endValue;
  form6.submit();
}
</script>
</head>

<body>
<?php
  error_reporting(0);
  include ("../conf/conn.php");
  include ("../conf/function.php");
  $table=$nav_table;
  
$fold='img/';
$filepath="../$fold"; //上载文件存放路径

if ($bs==1){
  $upfile1=$_FILES['upfile1']['tmp_name']; 
  $upfilename1=$_FILES['upfile1']['name']; 
  $hz1=substr(strrchr($upfilename1, "."), 1);
  if ($hz1)
    $img1=date("Ymdhis").".".$hz1;
  if(copy($upfile1,$filepath.$img1)){
    $sql="update $table set img_b='$img1' where id='$id'";
	$res=mysql_query($sql);
	echo "OK";
    //echo mysql_error();
  }
  if ($b_link){
    $sql="update $table set b_link='$b_link' where id='$id'";
	$res=mysql_query($sql);
  }
}  
if ($bs==2){
  $upfile2=$_FILES['upfile2']['tmp_name']; 
  $upfilename2=$_FILES['upfile2']['name']; 
  $hz2=substr(strrchr($upfilename2, "."), 1);
  if ($hz2)
    $img2=date("Ymdhis").".".$hz2;
  if(copy($upfile2,$filepath.$img2)){
    $sql="update $table set img_s1='$img2',s_link='$s_link' where id='$id'";
    $res=mysql_query($sql);
	echo "OK";
  }
  if ($s_link){
    $sql="update $table set s_link='$s_link' where id='$id'";
	$res=mysql_query($sql);
  }
}  
elseif ($bs==3){
  $upfile3=$_FILES['upfile3']['tmp_name']; 
  $upfilename3=$_FILES['upfile3']['name']; 
  $hz3=substr(strrchr($upfilename3, "."), 1);
  if ($hz3)
    $img3=date("Ymdhis").".".$hz3;
  if(copy($upfile3,$filepath.$img3)){
    $sql="update $table set img_s2='$img3' where id='$id'";
    $res=mysql_query($sql);
	echo "OK";
  }
} 
elseif ($bs==4){
  $upfile4=$_FILES['upfile4']['tmp_name']; 
  $upfilename4=$_FILES['upfile4']['name']; 
  $hz4=substr(strrchr($upfilename4, "."), 1);
  if ($hz4)
    $img4=date("Ymdhis").".".$hz4;
  if(copy($upfile4,$filepath.$img4)){
    $sql="update $table set img_nav='$img4' where id='$id'";
    $res=mysql_query($sql);
	echo "OK";
  }
}
elseif ($bs==5){
    $sql="update $table set nav_title='$nav_title' where id='$id'";
    $res=mysql_query($sql);
	echo "OK";
}   
elseif ($bs==6){
    $sql="update $table set nav_cont='$nav_cont' where id='$id'";
    $res=mysql_query($sql);
	echo "OK";
}   
elseif ($bs=='dele' && $bs1){
    $sql="update $table set $bs1='' where id='$id'";
    $res=mysql_query($sql);
	echo "OK";
} 
    $sql="select * from $table where id='$id' ";
    $res=mysql_query($sql);
	$rows=mysql_fetch_array($res);  
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#666666">
    <td height="40" align="center" bgcolor="#DCDCDC"><span style="color:#6D6D6D"><b><?php echo name($id)." "?>栏目图片管理</b></span></td>
  </tr>
  <tr>
    <td>
	
	<form action="?bs=1&id=<?=$id?>" method="post" enctype="multipart/form-data" name="form1" id="form1" style="margin:0">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
        <tr>
          <td width="15%" height="30" align="center" bgcolor="#E4E4E4"><?php if ($rows['img_b']){?><img src="<?php echo $filepath.$rows['img_b']?>" width="50" height="50" /><br /><?php }?><b>顶部大图:</b></td>
          <td align="center" bgcolor="#FFFFFF">&nbsp;
            &nbsp;
            <input name="upfile1" type="file"  size="23" value="" /><br />顶部大图链接：
			<input name="b_link" type="text"  size="23" value="<?php if ($rows['b_link'])echo $rows['b_link'];else{echo "http://";}?>"  />
			</td>
          <td width="15%" align="center" bgcolor="#E4E4E4"><input type="submit" name="Submit1" value="<?php if ($rows['img_b']){echo "修改";}else{echo "保存";}?>" />
            <input type="button" name="dele1" value="刪除" onclick="window.location.href='?bs=dele&id=<?=$id?>&bs1=img_b'" /></td>
        </tr>
      </table>
    </form>
	
	<form action="?bs=2&id=<?=$id?>" method="post" enctype="multipart/form-data" name="form2" id="form2" style="margin:0">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
        <tr>
          <td width="15%" height="30" align="center" bgcolor="#E4E4E4"><?php if ($rows['img_s1']){?><img src="<?php echo $filepath.$rows['img_s1']?>" width="50" height="50" /><br /><?php }?><b>顶部小图:</b></td>
          <td align="center" bgcolor="#FFFFFF">&nbsp;
            &nbsp;
            <input name="upfile2" type="file"  size="23" value="" />
			<br />顶部小图链接：
			<input name="s_link" type="text"  size="23" value="<?php if ($rows['s_link'])echo $rows['s_link'];else{echo "http://";}?>" />
			</td>
          <td width="15%" align="center" bgcolor="#E4E4E4"><input type="submit" name="Submit2" value="<?php if ($rows['img_s1']){echo "修改";}else{echo "保存";}?>" />
            <input type="button" name="dele2" value="刪除" onclick="window.location.href='?bs=dele&id=<?=$id?>&bs1=img_s1'"/></td>
        </tr>
      </table>
    </form>

	<form action="?bs=3&id=<?=$id?>" method="post" enctype="multipart/form-data" name="form3" id="form3" style="margin:0">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
        <tr>
          <td width="15%" height="30" align="center" bgcolor="#E4E4E4"><?php if ($rows['img_s2']){?><img src="<?php echo $filepath.$rows['img_s2']?>" width="50" height="50" /><br /><?php }?><b>顶部小图变换:</b></td>
          <td align="center" bgcolor="#FFFFFF">&nbsp;
            &nbsp;
            <input name="upfile3" type="file"  size="23" value="" /></td>
          <td width="15%" align="center" bgcolor="#E4E4E4"><input type="submit" name="Submit3" value="<?php if ($rows['img_s2']){echo "修改";}else{echo "保存";}?>"/>
            <input type="button" name="dele3" value="刪除" onclick="window.location.href='?bs=dele&id=<?=$id?>&bs1=img_s2'"/></td>
        </tr>
      </table>
    </form>

	<form action="?bs=4&id=<?=$id?>" method="post" enctype="multipart/form-data" name="form4" id="form4" style="margin:0">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
        <tr>
          <td width="15%" height="30" align="center" bgcolor="#E4E4E4"><?php if ($rows['img_nav']){?><img src="<?php echo $filepath.$rows['img_nav']?>" width="50" height="50" /><br /><?php }?><b>栏目小图:</b></td>
          <td align="center" bgcolor="#FFFFFF">&nbsp;
            &nbsp;
            <input name="upfile4" type="file"  size="23" value="" /></td>
          <td width="15%" align="center" bgcolor="#E4E4E4"><input type="submit" name="Submit4" value="<?php if ($rows['img_nav']){echo "修改";}else{echo "保存";}?>" />
            <input type="button" name="dele4" value="刪除" onclick="window.location.href='?bs=dele&id=<?=$id?>&bs1=img_nav'"/></td>
        </tr>
      </table>
    </form>

	<form action="?bs=5&id=<?=$id?>" method="post" enctype="multipart/form-data" name="form5" id="form5" style="margin:0">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
        <tr>
          <td width="15%" height="30" align="center" bgcolor="#E4E4E4"><b>栏目简介 小标题:</b></td>
          <td align="left" bgcolor="#FFFFFF">&nbsp;
            <input name="nav_title" type="text" id="nav_title" value="<?=$rows['nav_title']?>" />            
            &nbsp;
            &nbsp;</td>
          <td width="15%" align="center" bgcolor="#E4E4E4"><input type="submit" name="Submit5" value="<?php if ($rows['nav_title']){echo "修改";}else{echo "保存";}?>" /></td>
        </tr>
      </table>
    </form>

	<form action="?bs=6&id=<?=$id?>" method="post" enctype="multipart/form-data" name="form6" id="form6" style="margin:0">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
        <tr>
          <td width="15%" height="30" align="center" bgcolor="#E4E4E4"><b>栏目简介 内容:</b></td>
          <td align="left" bgcolor="#FFFFFF">&nbsp;
            <textarea name="textContent" cols="30" rows="5" id="textContent"><?=$rows['nav_cont']?></textarea>
			<input name="nav_cont" type="hidden" id="nav_cont"/>
            &nbsp;</td>
          <td width="15%" align="center" bgcolor="#E4E4E4"><input type="button" name="Submit6" value="<?php if ($rows['nav_cont']){echo "修改";}else{echo "保存";}?>" onclick="outHTML(); "/></td>
        </tr>
      </table>
    </form>

	</td>
  </tr>
</table>  
<div style="text-align:right; margin-top:20px; padding-right:50px;"><a href="nav.php"><span style="font-family:'黑体'"><< </span>返回</a></div>
</body>
</html>
