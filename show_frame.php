<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0043)http://www.zackimage.com/pic.ifr.asp?id=469 -->
<HTML><HEAD><TITLE></TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META http-equiv=pragma content=no-cache>


<META content="MSHTML 6.00.2900.3676" name=GENERATOR></HEAD>
<BODY bgColor=#000000 leftMargin=0 topMargin=0>
<STYLE>BODY {
	SCROLLBAR-FACE-COLOR: #ffffff; SCROLLBAR-HIGHLIGHT-COLOR: #ffffff; SCROLLBAR-SHADOW-COLOR: #ffffff; SCROLLBAR-3DLIGHT-COLOR: #ffffff; SCROLLBAR-ARROW-COLOR: #000000; SCROLLBAR-TRACK-COLOR: #000000; SCROLLBAR-DARKSHADOW-COLOR: #000000
}
</STYLE>
<link rel="stylesheet" href="js/lightbox_img/lightbox.css" type="text/css" media="screen" />
<script src="js/lightbox_img/prototype.js" type="text/javascript"></script>
<script src="js/lightbox_img/scriptaculous.js?load=effects" type="text/javascript"></script>
<script src="js/lightbox_img/lightbox.js" type="text/javascript"></script>
<script language="JavaScript">
<!--
//图片按比例缩放
var flag=false;
function DrawImage(ImgD,iwidth,iheight){
//参数(图片,允许的宽度,允许的高度)
var image=new Image();
image.src=ImgD.src;
if(image.width>0 && image.height>0){
flag=true;
if(image.width/image.height>= iwidth/iheight){
if(image.width>iwidth){ 
ImgD.width=iwidth;
ImgD.height=(image.height*iwidth)/image.width;
}else{
ImgD.width=image.width; 
ImgD.height=image.height;
}
ImgD.alt=image.width+"×"+image.height;
}
else{
if(image.height>iheight){ 
ImgD.height=iheight;
ImgD.width=(image.width*iheight)/image.height; 
}else{
ImgD.width=image.width; 
ImgD.height=image.height;
}
ImgD.alt=image.width+"×"+image.height;
}
}
} 
//-->
</script>
<TABLE cellSpacing=1 cellPadding=0 border=0 width="100%">
  <TBODY>
  <TR>
<?php
include ("conf/conn.php");
$sql="select * from $pro_table where id='$id'";
$res=mysql_query($sql);
$rows=mysql_fetch_array($res);
$img_arr=explode('/',$rows['img']);
$img_count=count($img_arr)-1;
for($i=0;$i<=$img_count-1;$i++){
$img_url="img/".$img_arr[$i];
?>  
   <!-- <TD rowSpan=2><a href="<?=$img_url?>" rel="lightbox[plants]" title="<?=$rows['name']?>"><img src="<?=$img_url?>" onload="javascript:DrawImage(this,600,390)" border="0"></a></TD>-->
    <TD rowSpan=2><img src="<?=$img_url?>" border="0"></TD>
<?php }?>	
  </TD></TR></TBODY></TABLE></BODY></HTML>
