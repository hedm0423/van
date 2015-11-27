	  <div id="news_list">
	    <ul>
<?php 
$sql_list="select * from $news_table $tj_news order by id desc";
//echo $sql_list;
$res_list=mysqli_query($conn,$sql_list);
$total=mysqli_num_rows($res_list);
if ($total){
  pageft($total,20);
$sql_list="select * from $news_table $tj_news order by id desc limit $firstcount,$displaypg";
$res_list=mysqli_query($conn,$sql_list);
while($rows_list=mysqli_fetch_array($res_list)){
?>	  
	    <li><a href="?id=<?=$rows_list['id']?>"><?=$rows_list['title']?></a> [<?=substr($rows_list['uptime'],0,10)?>]</li>
<?php }}?>		
	    </ul>
	  </div>
	 <?php if ($news_class){?> <div id="fy"><?php  echo $pagenav;?></div><?php }?>
