<!--
<link rel="stylesheet" href="js/lightbox_img/lightbox.css" type="text/css" media="screen" />
<script src="js/lightbox_img/prototype.js" type="text/javascript"></script>
<script src="js/lightbox_img/scriptaculous.js?load=effects" type="text/javascript"></script>
<script src="js/lightbox_img/lightbox.js" type="text/javascript"></script>
-->
<?php
/*
$sql="select * from $pro_table where id='$id'";
$res=mysql_query($sql);
$rows=mysql_fetch_array($res);
$img_arr=explode('/',$rows['img']);
$img_url="img/".$img_arr[0];
$cont=$rows['cont'];
$str1='href="img';
$str2='rel="lightbox[plants]" title="'.$rows['name'].'" href="img';
$cont=str_replace($str1,$str2,$cont);
*/
?>
<!--
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin:10px 0 0 0">
  <tr>
    <td width="60%" align="left" valign="top"><a href="<?=$img_url?>" rel="lightbox[plants]" title="<?=$rows['name']?>"><img src="<?=$img_url?>"></a></td>
    <td width="40%" align="left" valign="top"><?=$rows['cont1']?></td>
  </tr>
  <tr>
    <td valign="top" style="padding-top:30px; padding-right:25px;"><?=$cont?></td>
  </tr>
</table>
-->

<TABLE cellSpacing=0 cellPadding=0 width=960 align=center border=0>
  <TBODY>
  <TR>
    <TD width=77>&nbsp;</TD>
    <TD><IFRAME src="show_frame.php?id=<?=$id?>" frameBorder=0 
      noResize width=804 height=400></IFRAME></TD>
    <TD width=79>&nbsp;</TD></TR>
  <TR>
    <TD>&nbsp;</TD>
    <TD height=23>&nbsp;</TD>
    <TD>&nbsp;</TD></TR></TBODY></TABLE>
