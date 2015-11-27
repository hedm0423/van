<?php
include ("head_notice.php");
?>
	  
	  
<div class="notice">
<?php
if ($news_class){
$sql="select * from $news_table where news_class='$news_class' order by id desc limit 0,1";
$res=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($res);
echo $rows['cont'];
echo "<div style='line-height:30px;text-align:right'><a href='notice.php'><<返回</a></div>";
}
else{
$sql="select * from $nav_table where up_id='5' order by id asc";
$res=mysqli_query($conn,$sql);
$i=1;
while($rows=mysqli_fetch_array($res)){
if(strlen($i)==1)$j="0".$i;
?>
<a href="?news_class=<?=$rows['id']?>"><?=$j.". ".$rows['name']?></a><br />
<?php $i++;}}?>
</div>



<?php
include ("foot.php");
?>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fd483a0bdfa7cd646dc6c3d73f0c438f2' type='text/javascript'%3E%3C/script%3E"));
</script>