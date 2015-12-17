<?php
  error_reporting(0);
  include ("../conf/conn.php");
  include ("../conf/function.php");
  include ("../conf/fy.php");
  $table=$case_table;
  if ($bs=="dele" && $did){
    $query="delete from $table where id='$did' "; 
    $res=mysqli_query($conn,$query);
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/css.css" type=text/css rel=stylesheet>
<link href="css/css.css" rel="stylesheet" type="text/css"> 
<script type="text/javascript" src="../js/fun.js"></script>
</head>

<body style="margin:0">
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr><td height="30" align="center" bgcolor="#DCDCDC"><span style="color:#6D6D6D"><b>案例列表</b></span></td>
  </tr>
  <tr>
    <td align="left"  bgcolor="#FFFFFF">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_2">
	  <form name="form1" action="case.php" method="post">
        <tr>
          <td width="86"><input type="button"  class="add_button1" name="Submit" value="添加案例"  onclick="refresh_now('case_add.php')"/></td>
          <td width="100" align="right">&nbsp;</td>
          <td align="left">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td align="left">&nbsp;</td>
          
        </tr></form></table></td></tr></table>








<div id="pro_list">
        <ul style="width:95%;">
<?php
    $tj=" ";	
    $sql="select * from $table $tj";
	//echo $sql;
    $res=mysqli_query($conn,$sql);
    if ($res)
	  $total=mysqli_num_rows($res);
    pageft($total,12);
    $sql="select * from $table $tj order by id desc limit $firstcount,$displaypg ";
    $res=mysqli_query($conn,$sql);
    if (strlen($res)==0){
      echo "没有此类数据";
	}  
    else	
   
  while ($rows=mysqli_fetch_array($res)){
  $img_arr=explode('/',$rows['img']);
  $flod="../img/";
  $img_url=$flod.$img_arr[0];
?>		
		
          <li><a href="case_add.php?id=<?php echo $rows['id']?>" class="imgborder"><img border="0" src="<?=$img_url?>" width="150" height="150" title="点击修改"></a><br /><br /><?php echo $rows['title']?>
		  <a href="case_add.php?id=<?php echo $rows['id']?>" class="mycolor2"><img src="images/edit.gif" title="点击修改" style="width:16px; height:16px;"/></a>
		  <a id="dele" onclick="dele('case.php',<?php echo $rows['id']?>)"	href="#"  class="mycolor2"><img src="images/del.gif" title="点击删除" style="width:16px; height:16px;" /></a></li>
<?php }?>
        </ul>
      </div>
	  
	  
	  
	  
	  
	  
	  
	  
<table align="center"><tr><td><?php  echo $pagenav;?></td></tr></table>
</body>
</html>