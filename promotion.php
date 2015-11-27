<?php
include ("head_fw.php");
?>
	  
	  
<?php
if ($id){include ("news_cont.php");}else{$tj_news="where news_class1<>'' and news_class='20'";include ("news_list.php");}
?>	  



<?php
include ("foot.php");
?>
