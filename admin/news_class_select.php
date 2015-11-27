<?php
$tablex=$nav_table;
$typex="news";
?>
<select name="news_class">
  <option value="">————请选择分类————</option>
<?php 
$sql_1="select * from $nav_table where level='1' order by id asc";
$res_1=mysql_query($sql_1);
while($rows_1=mysql_fetch_array($res_1)){
  if (type1($nav_table,$rows_1['id'])=="news"){
    echo "<option value=".$rows_1['id'].",".$rows_1['id'].">".$rows_1['name']."</option>";
    $sql_2="select * from $nav_table where level='2' and up_id='".$rows_1['id']."' order by id asc";
    $res_2=mysql_query($sql_2);
    while($rows_2=mysql_fetch_array($res_2)){
	  if (type1($nav_table,$rows_2['id'])=="news"){
	    echo "<option value=".$rows_2['id'].",".$rows_1['id'].">&nbsp;&nbsp;&nbsp;".$rows_2['name']."</option>";
        $sql_3="select * from $nav_table where level='3' and type1='$typex' and up_id='".$rows_2['id']."' order by id asc";
        $res_3=mysql_query($sql_3);
	    while($rows_3=mysql_fetch_array($res_3)){
	      echo "<option value=".$rows_3['id'].",".$rows_2['id'].">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rows_3['name']."</option>";
	    }	
	  }
	  else{
        $sql_3="select * from $nav_table where level='3' and type1='$typex' and up_id='".$rows_2['id']."' order by id asc";
        $res_3=mysql_query($sql_3);
	    while($rows_3=mysql_fetch_array($res_3)){
	      echo "<option value=''>&nbsp;&nbsp;&nbsp;".$rows_2['name']."</option>";
	      echo "<option value=".$rows_3['id'].",".$rows_2['id'].">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rows_3['name']."</option>";
	    }
	  }
    }
  }
  else{
    $sql_2="select * from $nav_table where level='2' and up_id='".$rows_1['id']."' order by id asc";
    $res_2=mysql_query($sql_2);
	$i=0;
    while($rows_2=mysql_fetch_array($res_2)){
	  if (type1($nav_table,$rows_2['id'])=="news"){
	    if ($i==0)echo "<option value=''>".$rows_1['name']."</option>";
	    echo "<option value=".$rows_2['id'].",".$rows_1['id'].">&nbsp;&nbsp;&nbsp;".$rows_2['name']."</option>";
        $sql_3="select * from $nav_table where level='3' and type1='$typex' and up_id='".$rows_2['id']."' order by id asc";
        $res_3=mysql_query($sql_3);
	    while($rows_3=mysql_fetch_array($res_3)){
	      echo "<option value=".$rows_3['id'].",".$rows_2['id']." style='background:#F6F6F6;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rows_3['name']."</option>";
	    }	
	  $i++;}
	  else{
        $sql_3="select * from $nav_table where level='3' and type1='$typex' and up_id='".$rows_2['id']."' order by id asc";
        $res_3=mysql_query($sql_3);
	    while($rows_3=mysql_fetch_array($res_3)){
	      echo "<option value=''>&nbsp;&nbsp;&nbsp;".$rows_2['name']."</option>";
	      echo "<option value=".$rows_3['id'].",".$rows_2['id']." style='background:#F6F6F6;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rows_3['name']."</option>";
	    }
	  }
    }
  }
}
?>


  
</select>