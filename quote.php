<?php
include ("head_fw.php");
?>
	  
	  
<?php
if ($id){include ("news_cont.php");}else{$tj_news="where news_class1<>'' and news_class='39'";include ("news_list.php");}
?>	  



<?php
include ("foot.php");
?>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fd483a0bdfa7cd646dc6c3d73f0c438f2' type='text/javascript'%3E%3C/script%3E"));
</script>