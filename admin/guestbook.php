<?php
  //error_reporting(0);
  include ("../conf/conn.php");
  include ("../conf/fy.php");
  $table=$gbook_table;
  if ($bs=="dele" && $did){
    $query="delete from $table where id='$did' "; 
    $res=mysqli_query($conn,$query);
  }
  $pic1="../images/boy.gif";
  $pic2="../images/girl.gif";
  
  if ($bs=="sh" && $id){
    $sql_sh="update $table set fax='1' where id='$id'";
	$res_sh=mysqli_query($conn,$sql_sh);
  }
  elseif ($bs=='nsh' && $id){
    $sql_sh="update $table set fax='0' where id='$id'";
	$res_sh=mysqli_query($conn,$sql_sh);
  }
  
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
if ($bs=="re"){
  $sql1="update $gbook_table set address='$address' where id='$id1'";
  //echo "sql1:".$sql1;
  $res1=mysqli_query($conn,$sql1);
  if($res1)echo "回复成功";
}
?>
<form name="form1" action="?bs=re" method="post" enctype="multipart/form-data" onSubmit="return sendsub();" >
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr style="font-size:12px;">
    <td height="40" align="center" bgcolor="#8BB9F8"><span style="color:#FFFFFF"><b>留言管理</b></span></td>
  </tr>
  </table>
</form>
<table width="100%" >
  <tr><td  bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000">
    <tr bgcolor="#E4E4E4" style="font-size:12px;">
      <td width="8%" height="25" align="center"><span style="font-size:12px">称呼</span></td>
      <td width="15%" align="center"><b>QQ</b></td>
      <td width="21%" align="center"><b>信箱</b></td>
      <td width="11%" align="center"><b>留言时间</b></td>
      
      <td width="15%" align="center"><b>操作</b></td>
    </tr>
    <?php
  $sql="select * from $table  ";
  $res=mysqli_query($conn,$sql);
  $total=mysqli_num_rows($res);
  pageft($total,10);
  $sql="select * from $table order by id desc limit $firstcount,$displaypg ";
  $res=mysqli_query($conn,$sql);
  //if (strlen($res)==0)
  if(mysqli_num_rows($res)==0)
    echo "NO DATE";
  else	
   
  while ($rows=mysqli_fetch_array($res))
  {
?>
    <tr style="font-size:12px;">
      <td height="25" align="center" bgcolor="#FFFFFF" ><?php echo $rows['name']?></td>
      <td align="center" bgcolor="#FFFFFF" ><?php echo $rows['tel']?></td>
      <td align="center" bgcolor="#FFFFFF"><?php echo $rows['email']?></td>
      <td align="center" bgcolor="#FFFFFF" ><?php echo substr($rows['uptime'],0,10)?></td>
      
      <td align="center" bgcolor="#EFEFEF"> 
	  [<a class="mycolor2" href="guestbook_frame.php?id=<?=$rows['id']?>" >查看</a>] 
		[<a id="dele" onclick="dele('guestbook.php',<?php echo $rows['id']?>)" href="#" class="mycolor2">删除</a> ]  
		[
	 <?php if ($rows['fax']==0 || $rows['fax']=="" || empty($rows['fax'])){?><a href="?bs=sh&id=<?=$rows['id']?>" style="color:#FF3300;font-weight:normal">未审核</a><?php }else {?>
	 <a href="?bs=nsh&id=<?=$rows['id']?>"  style="font-weight:normal">审核</a><?php }?>
	 ]
          </td>
    </tr>
    <?php }?>
</table></td></tr></table>

<table align="center"><tr><td><?php  echo $pagenav;?></td></tr></table>
</body>
</html>