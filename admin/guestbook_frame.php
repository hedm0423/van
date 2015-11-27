<?php
  //error_reporting(0);
  include ("../conf/conn.php");
  $table=$gbook_table;
  
if ($bs=="re"){
  $sql1="update $gbook_table set address='$address' where id='$id1'";
  //echo "sql1:".$sql1;
  $res1=mysql_query($sql1);
}
  
  
  $sql="select * from $table  where id='$id'";
  $res=mysql_query($sql,$conn);
  $rows=mysql_fetch_array($res);
  $pic1="../images/boy.gif";
  $pic2="../images/girl.gif";
  if($rows['sex']=='1')$pic=$pic1;else $pic=$pic2;
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言管理</title>
<LINK href="css/css.css" type=text/css rel=stylesheet></head>
<script type="text/javascript" src="../js/fun.js"></script>
</head>

<body style="margin:0">
<?php
  if($res1)
    echo "回复成功";
?>
<form name="form1" action="?bs=re" method="post" enctype="multipart/form-data"  >
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr style="font-size:12px;">
    <td height="40" align="center" bgcolor="#8BB9F8"><span style="color:#FFFFFF"><b>留言管理</b></span></td>
  </tr>
  <tr>
    <td align="center"  bgcolor="#FFFFFF"><table width=100% height=65 border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#D8CAB2">
  <tr>
    <td valign="top" ><table width="100%" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#D8CAB2">
      <tr >
        <td width="16%" height="20" align="center"><span style="font-size:12px" id="name1">称呼：<?php echo $rows['name']?></span></td>
        <td width="84%" align="right"><div><a href="#" onclick="window.location.href='guestbook.php';">&lt;&lt;返回</a></div></td>
      </tr>
      <tr>
        <td align="center"><img src="<?php echo $pic;?>" width="70" height="70" id="sex"><br></td>
        <td rowspan="2" valign="top" align="left"><?php echo $rows['cont']?></td>
      </tr>
      <tr>
        <td align="left"><span style="display:block" id="qq">QQ：<?php echo $rows['qq']?></span><span style="display:block" id="email">邮箱：<?php echo $rows['email']?></span></td>
      </tr>
      <tr align="left">
        <td height="20" align="right"><span style="font-size:12px"  id="comp">回复：
            
			<input type="hidden" name="id1" id="id1" value="<?php echo $rows['id']?>" />
        </span></td>
        <td height="20" valign="top"><span style="font-size:12px">
          <textarea name="address" id="address" rows="8" style="width:80%"><?php echo $rows['address']?></textarea>
          <input type="submit" name="Submit" value="提交回复" />
        </span></td>
      </tr>
    </table>
</table></td>
  </tr>
  </table></form>
  </div>
  
  
</body>
</html>