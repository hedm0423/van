<?php
include ("head_show.php");
?>
	  
	  
	  <div id="show">
<?php 
if ($id){
//echo "作品展示维护中...";
//include ("pro.php");
//include ("show_cont.php");
?>
<!--
<TABLE cellSpacing=0 cellPadding=0  align=center border=1 width="660">
  <TBODY>
  <TR>
    <TD><IFRAME src="show_frame.php?id=<?=$id?>" frameBorder=0 
      noResize width=100% height=420></IFRAME></TD>
    </TR>
</TBODY></TABLE>
-->
<STYLE>
#pp {
	SCROLLBAR-FACE-COLOR: #ffffff; SCROLLBAR-HIGHLIGHT-COLOR: #ffffff; SCROLLBAR-SHADOW-COLOR: #ffffff; SCROLLBAR-3DLIGHT-COLOR: #ffffff; SCROLLBAR-ARROW-COLOR: #000000; SCROLLBAR-TRACK-COLOR: #000000; SCROLLBAR-DARKSHADOW-COLOR: #000000
}
</STYLE>
<link rel="stylesheet" href="js/lightbox_img/lightbox.css" type="text/css" media="screen" />
<script src="js/lightbox_img/prototype.js" type="text/javascript"></script>
<script src="js/lightbox_img/scriptaculous.js?load=effects" type="text/javascript"></script>
<script src="js/lightbox_img/lightbox.js" type="text/javascript"></script>

<div id="pp" style=" width:100%; height:450px; border:solid 1px #000; overflow:scroll">
<ul>
<?php
$sql="select * from $pro_table where id='$id'";
$res=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($res);
$img_arr=explode('/',$rows['img']);
$img_count=count($img_arr)-1;
for($i=0;$i<=$img_count-1;$i++){
$img_url="img/".$img_arr[$i];
?>
<li style="float:left;"><a href="<?=$img_url?>" rel="lightbox[plants]" title="<?=$rows['name']?>"><img src="<?=$img_url?>" border="0"></a></li>
<?php }?>
</ul>
</div>


<?php
}else{
?>	  
	  
	    <ul>
<?php
if ($pro_class){$tj="where pro_class='$pro_class' order by id desc";}else{$tj="order by id desc";}
$sql="select * from $pro_table $tj ";
$res=mysqli_query($conn,$sql);
$total=mysqli_num_rows($res);
pageft($total,16);
$sql="select * from $pro_table $tj limit $firstcount,$displaypg";
//echo $sql;
$res=mysqli_query($conn,$sql);
while($rows=mysqli_fetch_assoc($res)){
$img_arr=explode('/',$rows['img']);
$img_url="img/".$img_arr[0];
?>		
		  <li><a href="show_details.php?id=<?=$rows['id']?>&pro_class=<?=$rows['pro_class']?>" target="_blank"><img src="<?=$img_url?>" width="140" height="140"/><span class="show_name"><?=$rows['name']?></span></a></li>
<?php }?>		  
		</ul>
		
<?php }?>		
		
		
	  </div>
	  
<div id="fy"><?php  echo $pagenav;?></div>	  
	  
	  
	  <div class="team_bg1"></div>
	
	 

	  



<?php
include ("foot.php");
?>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fd483a0bdfa7cd646dc6c3d73f0c438f2' type='text/javascript'%3E%3C/script%3E"));
</script>