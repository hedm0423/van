<?php
$tablex=$nav_table;
$typex="pro";
?>
<select name="pro_class">
  <option value="">————请选择分类————</option>
<?php
$sql_s1="select * from $tablex where type1='$typex' and level='1' order by id asc";
$res_s1=mysql_query($sql_s1);
while($rows_s1=mysql_fetch_array($res_s1)){
?>
 <!--<optgroup label="<?php echo $rows_s1['name']?>"></optgroup>-->
<?php
$sql_s2="select * from $tablex where type1='$typex' and level='2' and up_id='".$rows_s1['id']."' order by id asc";
$res_s2=mysql_query($sql_s2);
while($rows_s2=mysql_fetch_array($res_s2)){
?>
 <!-- <option value="<?php echo $rows_s2['id'].','.$rows_s1['id'].','.$rows_s2['link'];?>">&nbsp;&nbsp;<?php echo $rows_s2['name']?></option>-->
   <optgroup label="<?php echo $rows_s2['name']?>"></optgroup>
<?php
$sql_s3="select * from $tablex where type1='$typex' and level='3' and up_id='".$rows_s2['id']."' order by id asc";
$res_s3=mysql_query($sql_s3);
while($rows_s3=mysql_fetch_array($res_s3)){
?>
  <option value="<?php echo $rows_s3['id'].','.$rows_s2['id'].','.$rows_s3['link'];?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--<?php echo $rows_s3['name']?></option>

<?php }}}?>    





 



</select>