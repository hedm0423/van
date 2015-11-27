<?php
error_reporting(0); 
require ("../conf/conn.php");
require ("imgup.php");
$fold='img/';
$filepath="../$fold"; //上载文件存放路径

if ($bs==1){
/*echo "<script>alert(1);</script>";*/
  $upfile1=$_FILES['upfile1']['tmp_name']; 
  $upfilename1=$_FILES['upfile1']['name']; 
  $hz1=substr(strrchr($upfilename1, "."), 1);
  $t=date("Ymdhis");
  if ($hz1){
    $img1=$t.'1.'.$hz1;
  }
  copy($upfile1,$filepath.$img1);
  $small=$filepath."s".$img1;
  makethumb($filepath.$img1,$small,"74","42");
  copy($upfile1,$filepath.$img1);
  $sql="select * from $jd_table ";
  $res=mysql_query($sql);
  $a=mysql_num_rows($res);#行数
  if ($a==0){
    $sql="insert into $jd_table (id,pic1,pic2,pic3,pic4,pic5,pic6,dz1,dz2,dz3,dz4,dz5,dz6)  values(null,'$img1','','','','','','$dz1','','','','','') ";
  }
  else{ 
   if ($img1){
     $sql="update $jd_table set  pic1='$img1',dz1='$dz1' ";
   }
   else
    $sql="update $jd_table set  dz1='$dz1' ";
  } 
  $res=mysql_query($sql);
  //echo mysql_error();
}
elseif ($bs==2){
  $upfile2=$_FILES['upfile2']['tmp_name']; 
  $upfilename2=$_FILES['upfile2']['name']; 
  $hz2=substr(strrchr($upfilename2, "."), 1);
  $t=date("Ymdhis");
  if ($hz2)
    $img2=date("Ymdhis").'2.'.$hz2;
	
  copy($upfile2,$filepath.$img2);
  $small=$filepath."s".$img2;
  makethumb($filepath.$img2,$small,"74","42");
  copy($upfile2,$filepath.$img2);

  $sql="select * from $jd_table ";
  $res=mysql_query($sql);
  $a=mysql_num_rows($res);#行数
  if ($a==0){
    $sql="insert into $jd_table (id,pic1,pic2,pic3,pic4,pic5,pic6,dz1,dz2,dz3,dz4,dz5,dz6)  values(null,'','$img2','','','','','','$dz2','','','','') ";
  }
  else{ 
    if ($img2){
      $sql="update $jd_table set  pic2='$img2',dz2='$dz2' ";
	}
	else
      $sql="update $jd_table set  dz2='$dz2' ";
  } 
  $res=mysql_query($sql);
}
elseif ($bs==3){
  $upfile3=$_FILES['upfile3']['tmp_name']; 
  $upfilename3=$_FILES['upfile3']['name']; 
  $hz3=substr(strrchr($upfilename3, "."), 1);
  $t=date("Ymdhis");
  if ($hz3)
    $img3=date("Ymdhis").'3.'.$hz3;
  copy($upfile3,$filepath.$img3);
  $small=$filepath."s".$img3;
  makethumb($filepath.$img3,$small,"74","42");
  copy($upfile3,$filepath.$img3);
  $sql="select * from $jd_table ";
  $res=mysql_query($sql);
  $a=mysql_num_rows($res);#行数
  if ($a==0){
    $sql="insert into $jd_table (id,pic1,pic2,pic3,pic4,pic5,pic6,dz1,dz2,dz3,dz4,dz5,dz6)  values(null,'','','$img3','','','','','','$dz3','','','') ";
  }
  else{ 
    if ($img3)
      $sql="update $jd_table set  pic3='$img3',dz3='$dz3' ";
    else
      $sql="update $jd_table set dz3='$dz3' ";
  } 
  $res=mysql_query($sql);
}
elseif ($bs==4){
  $upfile4=$_FILES['upfile4']['tmp_name']; 
  $upfilename4=$_FILES['upfile4']['name']; 
  $hz4=substr(strrchr($upfilename4, "."), 1);
  $t=date("Ymdhis");
  if ($hz4)
    $img4=date("Ymdhis").'3.'.$hz4;
  copy($upfile4,$filepath.$img4);
  $small=$filepath."s".$img4;
  makethumb($filepath.$img4,$small,"74","42");
  copy($upfile4,$filepath.$img4);
  $sql="select * from $jd_table ";
  $res=mysql_query($sql);
  $a=mysql_num_rows($res);#行数
  if ($a==0){
    $sql="insert into $jd_table (id,pic1,pic2,pic3,pic4,pic5,pic6,dz1,dz2,dz3,dz4,dz5,dz6)  values(null,'','','','$img4','','','','','','$dz4','','') ";
  }
  else{ 
    if ($img4)
      $sql="update $jd_table set  pic4='$img4',dz4='$dz4' ";
    else
      $sql="update $jd_table set dz4='$dz4' ";
  } 
  $res=mysql_query($sql);
}  
    $sql="select * from $jd_table ";
    $res=mysql_query($sql);
	$rows=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="css/css.css" type=text/css rel=stylesheet>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#666666">
    <td height="40" align="center" bgcolor="#DCDCDC"><span style="color:#6D6D6D"><b>圖片輪換管理 (图片尺寸：697×150)</b></span></td>
  </tr>
  <tr>
    <td>
	
	<form action="?bs=1" method="post" enctype="multipart/form-data" name="form1" id="form1" style="margin:0">
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000">
        <tr>
          <td width="15%" height="30" align="center" bgcolor="#E4E4E4"><?php if ($rows['pic1']){?><img src="<?php echo $filepath."s".$rows['pic1']?>" width="74" height="42" /><br /><?php }?><b>圖片1:</b></td>
          <td bgcolor="#FFFFFF">&nbsp;<br />
            &nbsp;<input name="upfile1" type="file"  size="23" value="" /></td>
          <td width="15%" align="center" bgcolor="#E4E4E4"><b>鏈接地址1:</b></td>
          <td bgcolor="#FFFFFF">&nbsp;<input name="dz1" type="text" id="dz1"  value="<?php echo $rows['dz1']?>" /></td>
          <td width="10%" align="center" bgcolor="#E4E4E4"><input type="submit" name="Submit1" value="<?php if ($rows['pic1']){echo "修改";}else{echo "保存";}?>" />
              <input type="button" name="dele1" value="刪除" /></td>
        </tr>
      </table>
    </form>
	
	<form action="?bs=2" method="post" enctype="multipart/form-data" name="form2" id="form2" style="margin:0">
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000">
        <tr>
          <td width="15%" height="30" align="center" bgcolor="#E4E4E4"><?php if ($rows['pic2']){?><img src="<?php echo $filepath."s".$rows['pic2']?>" width="74" height="42" /><br /><?php }?><b>圖片2:</b></td>
          <td bgcolor="#FFFFFF">&nbsp;<br />
            &nbsp;<input name="upfile2" type="file"  size="23" value="" /></td>
          <td width="15%" align="center" bgcolor="#E4E4E4"><b>鏈接地址2:</b></td>
          <td bgcolor="#FFFFFF">&nbsp;<input name="dz2" type="text" id="dz2" value="<?php echo $rows['dz2']?>" /></td>
          <td width="10%" align="center" bgcolor="#E4E4E4"><input type="submit" name="Submit2" value="<?php if ($rows['pic2']){echo "修改";}else{echo "保存";}?>" />
            <input type="button" name="dele2" value="刪除" /></td>
        </tr>
      </table>
    </form>

	<form action="?bs=3" method="post" enctype="multipart/form-data" name="form3" id="form3" style="margin:0">
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000">
        <tr>
          <td width="15%" height="30" align="center" bgcolor="#E4E4E4"><?php if ($rows['pic3']){?><img src="<?php echo $filepath."s".$rows['pic3']?>" width="74" height="42" /><br /><?php }?><b>圖片3:</b></td>
          <td bgcolor="#FFFFFF">&nbsp;<br />
            &nbsp;<input name="upfile3" type="file"  size="23" value="" /></td>
          <td width="15%" align="center" bgcolor="#E4E4E4"><b>鏈接地址3:</b></td>
          <td bgcolor="#FFFFFF">&nbsp;<input name="dz3" type="text" id="dz3" value="<?php echo $rows['dz3']?>" /></td>
          <td width="10%" align="center" bgcolor="#E4E4E4"><input type="submit" name="Submit3" value="<?php if ($rows['pic3']){echo "修改";}else{echo "保存";}?>"/>
            <input type="button" name="dele3" value="刪除" /></td>
        </tr>
      </table>
    </form>

	<form action="?bs=4" method="post" enctype="multipart/form-data" name="form4" id="form4" style="margin:0">
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000">
        <tr>
          <td width="15%" height="30" align="center" bgcolor="#E4E4E4"><?php if ($rows['pic4']){?><img src="<?php echo $filepath."s".$rows['pic4']?>" width="74" height="42" /><br /><?php }?><b>圖片4:</b></td>
          <td bgcolor="#FFFFFF">&nbsp;<br />
            &nbsp;<input name="upfile4" type="file"  size="23" value="" /></td>
          <td width="15%" align="center" bgcolor="#E4E4E4"><b>鏈接地址4:</b></td>
          <td bgcolor="#FFFFFF">&nbsp;<input name="dz4" type="text" id="dz4" value="<?php echo $rows['dz4']?>" /></td>
          <td width="10%" align="center" bgcolor="#E4E4E4"><input type="submit" name="Submit4" value="<?php if ($rows['pic4']){echo "修改";}else{echo "保存";}?>"/>
            <input type="button" name="dele4" value="刪除" /></td>
        </tr>
      </table>
    </form>

	</td>
  </tr>
</table>
</body>
</html>
