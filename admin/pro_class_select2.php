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
 <optgroup label="<?php echo $rows_s1['name']?>"></optgroup><!--level 1-->
<?php
$sql_s2="select * from $tablex where type1='$typex' and level='2' and up_id='".$rows_s1['id']."' order by id asc";
$res_s2=mysqli_query($conn,$sql_s2);
while($rows_s2=mysqli_fetch_array($res_s2)){
?>
  <option value="<?php echo $rows_s2['id'].','.$rows_s1['id'];?>" style="background:#8BB9F8; color:#FFFFFF">&nbsp;&nbsp;<?php echo $rows_s2['name']?></option><!--level 2-->
<!-- <optgroup label="<?php echo "&nbsp;&nbsp;".$rows_s2['name']?>"></optgroup><!--level 1-->
 
<?php
$sql_s3="select * from $tablex where type1='$typex' and level='3' and up_id='".$rows_s2['id']."' order by id asc";
$res_s3=mysqli_query($conn,$sql_s3);
while($rows_s3=mysqli_fetch_array($res_s3)){
?>
  <option value="<?php echo $rows_s3['id'].','.$rows_s2['id'];?>" style="background:#F6F6F6; color:#000000">&nbsp;&nbsp;&nbsp;<?php echo $rows_s3['name']?></option>
<?php
$sql_s4="select * from $tablex where type1='$typex' and level='4' and up_id='".$rows_s3['id']."' order by id asc";
$res_s4=mysqli_query($conn,$sql_s4);
while($rows_s4=mysqli_fetch_array($res_s4)){
?>
  <option value="<?php echo $rows_s4['id'].','.$rows_s1['id'];?>" style="background:#F6F6F6; color:#000000">&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;<?php echo $rows_s4['name']?></option>
<?php }}}}?>    
<?php
$sql_c1="select * from $tablex where level='1' and type1<>'$typex' order by id asc";
$res_c1=mysqli_query($conn,$sql_c1);
while($rows_c1=mysqli_fetch_array($res_c1)){
?>
<?php
  $sql_c2="select * from $tablex where level='2' and type1='$typex' and up_id='".$rows_c1['id']."' order by id asc";
  $res_c2=mysqli_query($conn,$sql_c2);
  while($rows_c2=mysqli_fetch_array($res_c2)){
?> 

<?php if($rows_c1['id']==$rows_c2['up_id']){?> <optgroup label="<?php echo $rows_c1['name'];?>"></optgroup><?php }?>
<?php if($rows_c2['name']){?><option value="<?php echo $rows_c2['id'].','.$rows_c1['id'];?>" style="background:#8BB9F8; color:#FFFFFF">&nbsp;①&nbsp;<?php echo $rows_c2['name']?></option><?php }?>
<?php
  $sql_c3="select * from $tablex where level='3' and type1='$typex' and up_id='".$rows_c2['id']."'";
  $res_c3=mysqli_query($conn,$sql_c3);
  while($rows_c3=mysqli_fetch_array($res_c3)){
?>
<option value="<?php echo $rows_c3['id'].','.$rows_c1['id'];?>" style="background:#F6F6F6; color:#000000">&nbsp;&nbsp;②&nbsp;<?php echo $rows_c3['name']?></option>

<?php }}}?>   



</select>