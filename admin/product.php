<?php
  //error_reporting(0);
  include ("../conf/conn.php");
  include ("../conf/function.php");
  include ("../conf/fy.php");
  $table=$pro_table;
  if ($bs=="dele" && $did){
    $query="delete from $table where id='$did' "; 
    $res=mysql_query($query, $conn);
  }

  if ($bs==1){
    $query="delete from $table where id='$id' "; 
    $res=mysql_query($query, $conn);
  }
  if ($pro_class){
    $pro_class_arr=explode(',',$pro_class);
	if ($pro_class_arr[1]==2)
      $tj=" where pro_class1='".$pro_class_arr[0]."' and pro_class<>''";
	elseif($pro_class_arr[1]==3)
      $tj=" where pro_class='".$pro_class_arr[0]."' and pro_class1<>''";
  }	
  else
    $tj=" where pro_class1<>''";	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/css.css" rel="stylesheet" type="text/css"> 
<script type="text/javascript" src="../js/fun.js"></script>
</head>

<body style="margin:0">
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr><td height="40" align="center" bgcolor="#DCDCDC"><span style="color:#6D6D6D"><b>产品系统</b></span></td>
  </tr>
  <tr>
    <td align="left"  bgcolor="#FFFFFF">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_2">
	  <form name="form1" action="product.php" method="post">
        <tr>
          <td width="150"><input type="button"  class="add_button1" name="Submit" value="添加产品"  onclick="refresh_now('add3.php')"/></td>
          <td width="150" align="left"><!--<input type="button"  class="add_button1" name="pro_class" value="类别管理"  onclick="refresh_now('pro.php')"/>--></td>
          <td align="left">搜索&nbsp;<?php include ("pro_class_select.php")?>的历史数据
            <input name="submit" type="submit" class="cx_button" value=" " /></td>
          <td><!--<input name="submit" type="submit" class="cx_button" value=" " />--></td>
        </tr></form>
      </table></td></tr>
</table>
  <tr><td  bgcolor="#FFFFFF"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
    <tr bgcolor="#E4E4E4">
      <td width="36%" height="25" align="center" bgcolor="#E4E4E4"><b>产品分类</b></td>
      <td width="22%" align="center" bgcolor="#E4E4E4"><b>产品名称</b></td>
      <td width="11%" align="center" bgcolor="#E4E4E4"><b>上传日期</b></td>
      <td width="9%" align="center" bgcolor="#E4E4E4"><b>操作</b></td>
    </tr>
<?php
  $sql="select * from $table $tj";
  //echo $sql;
  $res=mysql_query($sql,$conn);
  $total=mysql_num_rows($res);
  pageft($total,15);
  $sql="select * from $table $tj order by id desc limit $firstcount,$displaypg ";
  $res=mysql_query($sql,$conn);
  if (strlen($res)==0)
    echo "没有此类数据";
  else	
   
  while ($rows=mysql_fetch_array($res))
  {
?>
    <tr bgcolor="#EFEFEF">
      <td height="25" align="left" style="padding-left:2px;" bgcolor="#FFFFFF">
	  <?php echo "<b>".name($nav_table,$rows['pro_class1'])."</b>"." <span style='font-weight:blod;color:red'>></span> ";?>
	  <?php if ($rows['pro_class1']==$rows['pro_class']){}else{echo name($nav_table,$rows['pro_class']);}?></td>
      <td align="center" bgcolor="#FFFFFF"><?php echo $rows['name']?></a></td>
      <td align="center" bgcolor="#FFFFFF"><?php echo substr($rows['uptime'],0,10);?></td>
      <td align="center" bgcolor="#EFEFEF"> 
	   <a href="add3.php?id=<?php echo $rows['id']?>" class="mycolor2"><img src="images/edit.gif" title="点击修改" /></a>
      <a id="dele" onclick="dele('product.php',<?php echo $rows['id']?>)"	href="#"  class="mycolor2"><img src="images/del.gif" title="点击删除" /></a></td>
    </tr>
    <?php }?>
  </table></td></tr></table>

<table align="center"><tr><td><?php  echo $pagenav;?></td></tr></table>
</body>
</html>