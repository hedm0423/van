<?php
  error_reporting(0);
  include ("../conf/conn.php");
  include ("../conf/function.php");
  include ("../conf/fy.php");
  $table=$news_table;
  if ($bs=="dele" && $did){
    $query="delete from $table where id='$did' "; 
    $res=mysql_query($query, $conn);
  }
  if ($news_class && ($cx=='' || empty($cx))){
    $news_class=trim($news_class); 
	$a=explode(',',$news_class);
    $tj=" where news_class1='".$a[0]."' or  news_class='".$a[0]."' ";
  }
  elseif ($cx){
    $cx=trim($cx); 
	$tj=" where title like '$cx%' or title1 like '$cx%' and  news_class1='' and news_class=''";
  }		
  else
    $tj=" where  news_class1<>'' and news_class<>''";	
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
  <tr><td height="30" align="center" bgcolor="#DCDCDC"><span style="color:#6D6D6D"><b>新闻列表</b></span></td>
  </tr>
  <tr>
    <td align="left"  bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_2">
      <form action="news.php" method="post" name="form1" id="form1">
        <tr>
          <td width="86"><input type="button"  class="add_button1" name="Submit" value="添加文章"  onclick="refresh_now('add2.php')"/></td>
          <td width="100" align="right">&nbsp;</td>
          <td align="left"> 搜索&nbsp;</td>
          <td><?php include ("news_class_select.php");?></td>
          <td align="left">&nbsp;
              <input type="text" name="cx" value="<?php if ($cx){echo $cx;}?>"/>
            的历史数据
            <input name="submit" type="submit" class="cx_button" value=" " /></td>
        </tr>
      </form>
    </table></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" >			
  <tr><td bgcolor="#FFFFFF"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999">
    <tr bgcolor="#E4E4E4">
      <td width="17%" height="25" align="center" bgcolor="#E4E4E4"><b>新闻类别</b></td>
      <td width="48%" height="25" align="center" bgcolor="#E4E4E4"><b>标题</b></td>
      <td width="21%" align="center" bgcolor="#E4E4E4"><b>上传日期</b></td>
      <td width="14%" align="center" bgcolor="#E4E4E4"><b>操作</b></td>
    </tr>
	  
<?php
    $sql="select * from $table $tj";
    $res=mysql_query($sql);
    $total=mysql_num_rows($res);
    pageft($total,15);
    $sql="select * from $table $tj order by id desc limit $firstcount,$displaypg ";
	//echo $sql;
    $res=mysql_query($sql,$conn);
    if (strlen($res)==0){
     // echo "没有 ";if ($news_class)echo "<".name($news_class).">";echo " 此类数据";
	}  
    else	
   
  while ($rows=mysql_fetch_array($res)){
?>
    <tr bgcolor="#EFEFEF">
      <td height="23" align="left" bgcolor="#FFFFFF" style="padding-left:5px;"><?php echo "<b>".name($nav_table,$rows['news_class1'])."</b>>".name($nav_table,$rows['news_class'])?></td>
      <td height="23" align="left" bgcolor="#FFFFFF"><?php if ($rows['title']){echo $rows['title'];}else{echo $rows['title1'];}?></td>
      <td align="center" bgcolor="#FFFFFF"><?php echo $rows['uptime']?></td>
      <td align="center" bgcolor="#EFEFEF"> 
	  <a href="add2.php?id=<?php echo $rows['id']?>" class="mycolor2"><img src="images/edit.gif" title="点击修改" /></a>
      <a id="dele" onclick="dele('news.php',<?php echo $rows['id']?>)"	href="#"  class="mycolor2"><img src="images/del.gif" title="点击删除" /></a> </td></tr>
<?php }?>
</table></td></tr></table>
<table align="center"><tr><td><?php  echo $pagenav;?></td></tr></table>
</body>
</html>