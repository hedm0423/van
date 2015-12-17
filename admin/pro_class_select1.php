<?php
$tablex=$nav_table;
$typex="pro";
?>
<select name="pro_class">
  <option value="">————请选择分类————</option>
<?php
$sql_s1="select * from $tablex where type1='$typex' and level='1' order by id asc";
$res_s1=mysqli_query($conn,$sql_s1);
while($rows_s1=mysqli_fetch_array($res_s1)){
?>
<?php
$sql_s2="select * from $tablex where type1='$typex' and level='2' and up_id='".$rows_s1['id']."' order by id asc";
$res_s2=mysqli_query($conn,$sql_s2);
while($rows_s2=mysqli_fetch_array($res_s2)){
?>
 <optgroup label="<?php echo $rows_s2['name']?>"></optgroup>

<?php
$sql_s3="select * from $tablex where type1='$typex' and level='3' and up_id='".$rows_s2['id']."' order by id asc";
$res_s3=mysqli_query($conn,$sql_s3);
while($rows_s3=mysqli_fetch_array($res_s3)){
?>
   <!--<optgroup label="<?php echo "&nbsp;&nbsp;&nbsp;".$rows_s3['name']?>"></optgroup>-->
 <option value="<?php echo $rows_s3['id'].','.$rows_s2['id'].','.$rows_s3['link'];?>">&nbsp;&nbsp;&nbsp;|—<?php echo $rows_s3['name']?></option>

<!--
<?php
/*
$sql_s4="select * from $tablex where type1='$typex' and level='4' and up_id='".$rows_s3['id']."' order by id asc";
$res_s4=mysql_query($sql_s4);
while($rows_s4=mysql_fetch_array($res_s4)){
*/
?>
  <option value="<?php //echo $rows_s4['id'].','.$rows_s3['id'].','.$rows_s4['link'];?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--<?php //echo $rows_s4['name']?></option>

-->



<?php }}}?>    
</select>