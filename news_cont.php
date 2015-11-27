<?php
$sql="select * from $news_table where id='$id' ";
$res=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($res);


$sql_pre="select * from $news_table where id>'$id' and news_class='".$rows['news_class']."' and news_class1<>'' order by id asc limit 0,1";
$res_pre=mysqli_query($conn,$sql_pre);
$rows_pre=mysqli_fetch_array($res_pre);

$sql_next="select * from $news_table where id<'$id' and news_class='".$rows['news_class']."' and news_class1<>'' order by id desc limit 0,1";
$res_next=mysqli_query($conn,$sql_next);
$rows_next=mysqli_fetch_array($res_next);

?>



<div class="news_cont" style="margin:0">


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" height="390" valign="top">
<div class="news_title"><?php echo $rows['title']?></div>
<div class="news_time1"><span style="margin-right:5px;">发布：admin</span> <span style="margin-right:5px;">日期：<?php echo substr($rows['uptime'],0,10)?></span><span> 人气：<?=counter($news_table,'read_count','id',$rows['id'],$rows['read_count'])?></span></div>
<div class="news_cont"><?php echo $rows['cont']?></div>	</td>
  </tr>
  <tr>
    <td align="left" width="50%"><?php if ($rows_pre['id']){?>上一篇：<a href="news.php?id=<?php echo $rows_pre['id']?>" title="<?=$rows_pre['title']?>"><?php echo msubstr($rows_pre['title'],0,24)?></a><?php }?></td>
    <td width="50%" rowspan="2" align="right" valign="bottom"><div ><a href="#" style="color:#333333" onclick="history.go(-1)"> << 返回 </a></div></td>
  </tr>
  <tr>
    <td align="left"><?php if ($rows_next['id']){?>
      下一篇：<a href="news.php?id=<?php echo $rows_next['id']?>" title="<?=$rows_next['title']?>"><?php echo msubstr($rows_next['title'],0,24)?></a>
      <?php }?></td>
  </tr>
</table>

</div>


