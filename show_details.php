<?php
include("conf/conn.php");
include("conf/function.php");
$sql="select * from $pro_table where id='$id'";
//echo $sql;
$res=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($res);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php  
if($rows['name']){echo $rows['name']."-";}
$last_nav=substr(strrchr($_SERVER["REQUEST_URI"], "/"), 1);
if ($pro_class)$jb_title1 =  name($nav_table,$pro_class);
echo $jb_title1;
?>-<?php if ($jb_title)echo $jb_title;else echo "梵谷视觉";?></title>
<style>
img{ float:left;}
html {
	SCROLLBAR-FACE-COLOR: #ffffff; SCROLLBAR-HIGHLIGHT-COLOR: #ffffff; SCROLLBAR-SHADOW-COLOR: #ffffff; SCROLLBAR-3DLIGHT-COLOR: #ffffff; SCROLLBAR-ARROW-COLOR: #000000; SCROLLBAR-TRACK-COLOR: #000000; SCROLLBAR-DARKSHADOW-COLOR: #000000; 
}
a{ color:#CCCCCC}
th{ text-align:right;}
</style>
</head>

<body style="background:#000000; color:#999999; margin:50px; font-size:12px;">
<!--
<div style="float:left; border:solid 2px #fff;width:250px;  margin-right:10px; line-height:22px; font-size:12px; text-align:right; padding-right:10px;"><?=$rows['cont1']?></div>
<div style="float:left;border:solid 2px #fff; width:600px; overflow:scroll">
<div id="pp" style="border:solid 0px #fff; float:right; width:600%; ">

<?=$rows['cont']?>
</div>

</div>

<div style="float:left; border:solid 0px #fff;width:250px; line-height:22px;   margin-right:10px; line-height:22px; font-size:12px; text-align:right; padding-right:10px;  z-index:10;writing-mode: tb-rl;"><?=$rows['cont']?></div>
-->
<div style="float:left; border:solid 0px #fff;width:250px; line-height:22px;   margin-right:10px; line-height:22px; font-size:14px; text-align:right; padding-right:10px;  z-index:10;"><?=$rows['cont']?></div>

<div style="border:solid 0px #fff; float:left; position:absolute">
<TABLE cellSpacing=1 cellPadding=0 border=0 width="100%">
  <TBODY>
  <TR>
 <!--<TD ><?=$rows['cont']?></TD> -->
<?php
//echo "img".$rows['img'];
$img_arr=explode('/',$rows['img']);
$img_count=count($img_arr)-1;
for($i=1;$i<=$img_count-1;$i++){
$img_url="img/".$img_arr[$i];
?>  
   <!-- <TD rowSpan=2><a href="<?=$img_url?>" rel="lightbox[plants]" title="<?=$rows['name']?>"><img src="<?=$img_url?>" onload="javascript:DrawImage(this,600,390)" border="0"></a></TD>-->
    <TD ><img src="<?=$img_url?>" border="0"></TD>
<?php }?>	
  </TD></TR></TBODY></TABLE>
</div>
<!--
        <div id="div" style="border:solid 0px #fff; float:left;width:600%; overflow:scroll;overflow-x:hidden;overflow-y:hidden; position:absolute">
          <?=$rows['cont']?>
        </div>
		-->
</body>
</html>
