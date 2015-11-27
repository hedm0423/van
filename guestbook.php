<?php
session_start(); 
include ("head_contact.php");
?>
<?php
  if ($bs=="add"){
    if($name==""){
	  echo "<script>alert('请输入用户名');document.all.name.focus();</script>";session_destroy();
	}
    elseif($cont==""){
	  echo "<script>alert('请输入留言内容');document.all.cont.focus();</script>";session_destroy();
	}
	else{
	 
	    $date = mktime(date("H")+8,date("i"),date("s"),date("m"),date("d"), date("Y")); 
	    $uptime=date("Y-m-d H:i:s",$date);
    $sql_add="insert into $gbook_table (id,comp,name,sex,email,tel,fax,address,title,cont,uptime)  values(null,'$comp','$name','','$email','$qq','','','','$cont','$uptime')";
	//echo $sql_add;
    $res_add=mysql_query($sql_add);
    echo "<script>alert('留言成功！');</script>";
	  
	}
  }
?>	  
	  
	<div class="ly"><a href="#form1"  ><img src="images/gb_bg1.jpg"/></a></div>
	
<?php
$sql="select * from $gbook_table where fax='1' order by id desc";
//echo $sql;
$res=mysql_query($sql);
while($rows=mysql_fetch_array($res)){
?>	
	
	<div class="list">
	  <table cellspacing="0" cellpadding="0" width="99%">
        <tr>
          <td width="90" align="center" valign="top" style="border-right:solid 1px #fff;" > <?=$rows['name']?><br />
              <img src="images/m0.gif" width="48" height="48" vspace="5" border="0" align="center" /></td>
          <td valign="top"  2010-4-15  style="padding-left:6px;">
		  <a href="mailto:<?=$rows['email']?>"><img src="images/icon_mailto.gif" alt="send mail to <?=$rows['name']?>" width="13" height="13" border="0" align="absmiddle" /></a>
		  <a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?=$rows['qq']?>&amp;Site=梵谷视觉&amp;Menu=yes" target="blank"><img src="images/icon_oicq.gif" alt="oicq <?=$rows['qq']?>" width="21" height="13" border="0" align="absmiddle" /></a> 发表于：<?=$rows['uptime']?>
            <div></div>
            <?=$rows['cont']?>
            <div></div>
            <div style="float:left;"><img src="images/reply.gif" align="absmiddle" /></div>
            <div style="padding-left:50px;"><?=$rows['address']?></div>
          </td>
        </tr>
        <tr>
          <td colspan="2"> </td>
        </tr>
      </table>
	</div>
<?php }?>

	





<form name="form1" action="?bs=add" method="post">
<table width="100%" cellpadding="0" cellspacing="0" class="guestbook">
  <TR>
    <TD width="17%" align="right"><strong>*姓名   :</strong></TD>
    <TD width="34%"><INPUT name="name" class="input1" id="name" size="25" maxLength="20"></TD>
    <TD width="8%" align="right"><strong>性别</strong></TD>
    <TD width="41%"><INPUT type="radio" CHECKED value="1" name="Sex">
      男
      <INPUT type="radio" value="2" name="Sex">
      女      </TD>
  </TR>
  <TR>
    <TD align="right"><strong>E-mail:</strong></TD>
    <TD><INPUT maxLength="40" size="25" name="email" class="input1"></TD>
    <TD align="right"><strong>QQ:</strong></TD>
    <TD><INPUT name="qq" class="input1" id="qq" size="25" maxLength="10"></TD>
  </TR>
  <TR>
    <TD vAlign="top" align="right"><strong>*留言内容   : </strong><BR>
    <TD vAlign="top" colSpan="3"><TEXTAREA name="cont" cols="40" rows="5" wrap="VIRTUAL" class="input1" id="cont" style="text-align:left"></TEXTAREA></TD>
  </TR>
  <TR>
    <TD> </TD>
    <TD colSpan="3">
	   
        <INPUT name="submit" type="submit" value="" class="sub" style="cursor:pointer"></TD>
  </TR>
</table>	
</form>
<?php
include ("foot.php");
?>
