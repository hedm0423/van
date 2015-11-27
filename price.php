<?php
include ("head_fw.php");
?>
	  
	  
<?php
if($news_class)
  $tj=" where news_class='$news_class'";
else
  $tj="where news_class='22'";  
$sql="select * from $news_table $tj";
//echo $sql;
$res=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($res);
?>

<style type="text/css">
a,area {blr:expression(this.onFocus=this.blur())}
</style>
	  
	  <div class="intr">
		<?=$rows['cont']?>
<?php if($news_class){echo "<div style='float:left; width:100%; text-align:right; margin:10px 0;'><a href='price.php'> << 返回</a></div>";}else{?>		
		<img src="images/price_pp1.jpg" border="0" usemap="#Map" />
<map name="Map" id="Map">
  <area shape="circle" coords="104,167,78" href="?news_class=35"/>
<area shape="circle" coords="281,96,83" href="?news_class=36"  />
<area shape="circle" coords="439,219,77" href="?news_class=37"  />
<area shape="circle" coords="591,90,77" href="?news_class=38"  />
</map>
<?php }?>
</div>



<?php
include ("foot.php");
?>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fd483a0bdfa7cd646dc6c3d73f0c438f2' type='text/javascript'%3E%3C/script%3E"));
</script>