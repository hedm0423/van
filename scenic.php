<?php
include ("head_fw.php");
?>
<?php
if ($id){
$sql="select * from $news_table where id='$id'";
//echo "sql: ".$sql;
$res=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($res);
?>
<div id="scenic">
<div style="text-align:left; padding-left:100px"><?=$rows['title']?></div>
<div style="text-align:left; padding-left:100px"><?=$rows['cont']?></div>
</div>
<!--
<link rel="stylesheet" href="js/lightbox_img/lightbox.css" type="text/css" media="screen" />
<script src="js/lightbox_img/prototype.js" type="text/javascript"></script>
<script src="js/lightbox_img/scriptaculous.js?load=effects" type="text/javascript"></script>
<script src="js/lightbox_img/lightbox.js" type="text/javascript"></script>
-->

<?php
}
else{
$sql="select * from $news_table where news_class='21' order by id desc";
//echo "sql: ".$sql;
$res=mysqli_query($conn,$sql);
while($rows=mysqli_fetch_array($res)){
$img_arr=explode('/',$rows['img']);
$img_url="img/".$img_arr[0];
?>	  
	  <div id="scenic">
	    <div class="title"><?=$rows['title']?></div>
	    <div class="zp" >
	      <div class="cont"><a href="?id=<?=$rows['id']?>"><img src="<?=$img_url?>" width="395" height="80" /></a></div>
	    </div>
		<div class="bottom"></div>
	  </div>
<?php }?>


      <div class="notice">
	  备注：<br />
① 长期推荐的经典线路为固定搭配，不做景点互换。<br />
② 自驾车路线是以一个工作天拍摄园林海景为基础，如客人自己提供的场所（如球场，酒店等）我们也将按照一个工作天来计算，因顾客执意进行分散景点拍摄的而未能拍摄完毕，我们将不会安排补拍。<br />
③如客户选择自驾车必须最迟于拍摄前一天17：00前与我们确认，当日告知自驾车我们将按定单时安排进行。<br />

	  </div>
<?php
}
?>
<div style="text-align:right; margin:10px"><a href="#" style="color:#333333" onclick="history.go(-1)"> << 返回 </a></div>

<?php
include ("foot.php");
?>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fd483a0bdfa7cd646dc6c3d73f0c438f2' type='text/javascript'%3E%3C/script%3E"));
</script>