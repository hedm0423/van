<?php
include ("head_join.php");
?>
	  
<?php
$sql="select * from $news_table where news_class='7' order by id desc";
$res=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($res);
echo $rows['cont'];
?>	  
	  



<?php
include ("foot.php");
?>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fd483a0bdfa7cd646dc6c3d73f0c438f2' type='text/javascript'%3E%3C/script%3E"));
</script>