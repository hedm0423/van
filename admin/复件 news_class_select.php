<?php
$tablex=$nav_table;
$typex="news";
?>
<select name="news_class">
  <option value="">————请选择分类————</option>
<?php
$sql_s1="select * from $tablex where type1='$typex' and level='1' order by sx,id asc";
$res_s1=mysql_query($sql_s1);
while($rows_s1=mysql_fetch_array($res_s1)){
?>
 <optgroup label="<?php echo $rows_s1['name']?>"></optgroup>
<?php
$sql_s2="select * from $tablex where type1='$typex' and level='2' and up_id='".$rows_s1['id']."' order by sx,id asc";
$res_s2=mysql_query($sql_s2);
while($rows_s2=mysql_fetch_array($res_s2)){
?>
  <option value="<?php echo $rows_s2['id'].','.$rows_s1['id']?>" >&nbsp;&nbsp;&nbsp;<?php echo $rows_s2['name']?></option>
<?php
$sql_s3="select * from $tablex where type1='$typex' and level='3' and up_id='".$rows_s2['id']."' order by sx,id asc";
$res_s3=mysql_query($sql_s3);
while($rows_s3=mysql_fetch_array($res_s3)){
?>
  <option value="<?php echo $rows_s3['id'].','.$rows_s1['id']?>" style="background:#F6F6F6; color:#000000">&nbsp;&nbsp;&nbsp;|&nbsp;<?php echo $rows_s3['name']?></option>
<?php }}}?>  


<?php 
$sql_other="select * from $nav_table where type1='news' and level='2' order by id asc";
$res_other=mysql_query($sql_other);
$i=0;
while($rows_other=mysql_fetch_array($res_other)){
?>
  <optgroup label="<?=name($nav_table,$rows_other['up_id'])?>"></optgroup>
  <option value="<?php echo $rows_other['id'].','.$rows_other['up_id']?>" >&nbsp;&nbsp;&nbsp;<?php echo $rows_other['name']?></option>
<?php $i++;}?>


  
</select>