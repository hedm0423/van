<?php
include ("head_about.php");
?>
<?php
$sql="select * from $news_table where news_class='9'";
//echo $sql;
$res=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($res);
$img_arr=explode('/',$rows['img']);
if($rows['img'])$img_url="img/".$img_arr[0];else $img_url="images/ppjs.gif";
?>
	  <div class="zp" style="width:540px; height:240px;">
	    <div class="about_table" style="width:530px; height:229px;">
		  <a href="news.php"><img src="<?=$img_url?>" border="0" style="width:530px; height:229px; <?php if($rows['img'])echo "display:block";else echo "display:none";?>" /></a> </div>
	  </div>
	  
	  <div class="intr">
		<?=$rows['cont']?>
	  </div>
	  <script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fd483a0bdfa7cd646dc6c3d73f0c438f2' type='text/javascript'%3E%3C/script%3E"));
</script>
<?php
include ("foot.php");
?>
