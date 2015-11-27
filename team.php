<?php
include ("head_about.php");
?>
	  
	  
	  <div >
<?php
$sql1="select * from $news_table where news_class='10'";
$res1=mysqli_query($conn,$sql1);
$rows1=mysqli_fetch_array($res1);
echo $rows1['cont'];
?>
	  </div>




<?php
include ("foot.php");
?>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fd483a0bdfa7cd646dc6c3d73f0c438f2' type='text/javascript'%3E%3C/script%3E"));
</script>