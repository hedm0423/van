<?php
  error_reporting(0);
  include ("../conf/conn.php");
  include ("../conf/function.php");
  $table=$nav_table;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/css.css" rel="stylesheet" type="text/css"> 
<script type="text/javascript" src="../js/fun.js"></script>
<script>
function form_sub(v1,v2){
  if (v1 && v2){
    document.form1.bs.value='type_modify';
    document.form1.tid.value=v1;
    document.form1.type1.value=v2;
	form1.submit();
  }
}
</script>
</head>

<body onload="document.all('name').focus()">
<?php
  if (empty($level) || $level==""){
    $level="1";
	$level_son="2";
  }
  else{
    $level_son=$level+1;
    $level_up=$level-1;
  }
  
  if ($id1 && $level==2){
    $tj=" where level='$level' and up_id='$id1'";
  }
  elseif ($id2 && $level==3){
    $tj=" where level='$level' and up_id='$id2'";
  }
/*  elseif ($id3 && $level==4){
    $tj=" where level='$level' and up_id='$id3'";
  }*/
  else{
    $tj=" where level='$level' ";
  }	


#查询
  $sql_cx="select * from $table $tj order by id asc";
  $res_cx=mysqli_query($conn,$sql_cx);
  $rows_cx=mysqli_fetch_array($res_cx);

#添加
  if ($bs=="add" && $name){
$sql_1="select * from $table where level='$level' and up_id='$up_id' order by id desc limit 0,1";
$res_1=mysqli_query($conn,$sql_1);
$rows_1=mysqli_fetch_array($res_1);
$sx=$rows_1['sx']+1;
//echo "id: ".$sx;
  
if ($level==2)  
  $up_id=$id1;
elseif ($level==3)  
  $up_id=$id2;
elseif ($level==4)  
  $up_id=$id3;
/*elseif ($level==5)  
  $up_id=$id4;*/
else
  $up_id="";  
  
  
    $sql_add="insert into $table (id,up_id,name,link,level,type1,show1,sx)  values(null,'$up_id','$name','$link','$level','$type1','2','$sx')";
	$res_add=mysqli_query($conn,$sql_add);
	//echo "sql_add: ".mysql_error();
	//echo "sql_add: ".$sql_add;
	if ($res_add){
	  $ok_message= "ADD is OK !!!";
	}
  }
  elseif ($bs=="add" && $name==''){echo "<script>alert('请输入栏目名称!');history.go(-1);</script>";}
  
#修改  
  if ($bs=="modify" && $mid){
    $sql_modify="update $table set name='$name',link='$link' where id='$mid'";
	$res_modify=mysqli_query($conn,$sql_modify);
	if ($res_modify){
	  $ok_message= "MODIFY is OK !!!";
	}
  }
  /*
  if ($bs=="show" && $sid){
    $sql_show="update $table set show1='$show' where id='$sid'";
	$res_show=mysql_query($sql_show);
	$rows_show=mysql_fetch_array($res_show);
	if ($res_show){
	  $ok_message= "MODIFY is OK !!!";
	}
  }
  */
#删除  
  if ($bs=="dele" && $did){
	echo "dele ";echo dele($table,$did); 
  }
  
#模块选择  
  if ($bs=='type_modify' && $tid && $type1){
    $sql_mk="update $table set type1='$type1' where id='$tid'";
	//echo $sql_mk;
	$res_mk=mysqli_query($conn,$sql_mk);
	if ($res_mk){
	  $ok_message="模块选择成功!";
	}
  }
?>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr><td height="30" align="center" bgcolor="#DCDCDC"><span style="color:#6D6D6D"><b>分类管理 (到三级分类止)</b></span></td>
  </tr>
  <tr>
    <td align="left"  bgcolor="#FFFFFF">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_2">
	  <tr><td><?php if ($ok_message){echo $ok_message;}?></td>
	  </tr></table></td></tr></table>
<table width="100%" border="0" cellspacing="1" cellpadding="1" >
  <tr><td bgcolor="#FFFFFF"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999">
    <tr bgcolor="#EFEFEF">
      <td height="25" colspan="4" align="left" bgcolor="#FFFFFF">
	    <b><?php if($id1)echo name($nav_table,$id1)." > ";if ($id2)echo name($nav_table,$id2);?></b>
	  </td>
      <td height="25" align="center" bgcolor="#FFFFFF">
	  <?php if ($level==2){?><a href="?level=1"><span><<</span> 返回上一级</a><?php }?>
	  <?php if ($level==3){?><a href="?level=2&id1=<?=$id1?>&id2=<?=$id2?>"><span><<</span> 返回上一级</a><?php }?>
	  <?php if ($level==4){?><a href="?level=3&id1=<?=$id1?>&id2=<?=$id2?>&id3=<?=$id3?>"><span><<</span> 返回上一级</a><?php }?>
	  </td>
    </tr>
    <tr bgcolor="#E4E4E4">
      <td width="7%" height="25" align="center" bgcolor="#E4E4E4"><b>ID</b></td>
      
      <td width="42%" align="center" bgcolor="#E4E4E4">
	  <b><?php echo $level?>级栏目名称</b>&nbsp;&nbsp;
<?php if ($level==1){?><a href="sx.php?level=<?=$level?>&up_id=">(调整栏目顺序)</a><?php }?>
<?php if ($level==2){?><a href="sx.php?level=<?=$level?>&up_id=<?=$id1?>">(调整栏目顺序)</a><?php }?>
<?php if ($level==3){?><a href="sx.php?level=<?=$level?>&up_id=<?=$id2?>">(调整栏目顺序)</a><?php }?>
<?php if ($level==4){?><a href="sx.php?level=<?=$level?>&up_id=<?=$id3?>">(调整栏目顺序)</a><?php }?>

	  
	  </td>
      <td width="12%" align="center" bgcolor="#E4E4E4"><b>模块选择</b></td>
      <td width="12%" align="center" bgcolor="#E4E4E4"><b>显示</b></td>
      <td width="13%" align="center" bgcolor="#E4E4E4">
	    <b>操作</b>&nbsp;&nbsp;		</td>
    </tr>
<?php
  $sql="select * from $table $tj order by sx,id asc";
  $res=mysqli_query($conn,$sql);
  while($rows=mysqli_fetch_array($res)){
?>
    <tr bgcolor="#EFEFEF">
      <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rows['id']?></td>
	  
      <td height="25" align="left" bgcolor="#FFFFFF">
	    <div style=" text-align:left; margin-right:1px;"> 
		 <span style="width:16px; float:left; display:block;">
		 <img src="images/closed.gif" /></span>
		 <b><?php echo $rows['name']?>&nbsp;&nbsp;</b>
		 
           
<?php if ($level==1){?>[<a href="?level=<?=$level_son?>&amp;id1=<?=$rows['id']?>">管理子栏目</a>]<?php }?>
<?php if ($level==2){?>[<a href="?level=<?=$level_son?>&amp;id1=<?=$id1?>&amp;id2=<?=$rows['id']?>">管理子栏目</a>]<?php }?>
<!--<?php //if ($level==3){?>[<a href="?level=<?=$level_son?>&amp;id1=<?=$id1?>&amp;id2=<?=$id2?>&amp;id3=<?=$rows['id']?>">管理子栏目</a>]<?php //}?>-->
		
		
        
      </div></td>
	  
      <td height="25" align="center" bgcolor="#FFFFFF">
	  
	  
	  <select name="type11" onchange="form_sub('<?=$rows['id']?>',this.value)" >
              <?php if ($rows['type1']){?>
              <option value="<?=$rows['type1']?>" style="background:#EBEBEB; color:#000000;">
                <?php if ($rows['type1']=='no'){echo "无";}elseif($rows['type1']=='news'){echo "新闻模块";}elseif($rows['type1']=='dy'){echo "信息单页模块";}elseif($rows['type1']=='down'){echo "下载模块";}elseif($rows['type1']=='case'){echo "案例模块";}else{echo "作品模块";}?>
              </option>
              <?php }else{?>
              <option value="<?=$rows['type1']?>">请选择模块</option>
              <?php }?>
              <option value="no">无</option>
              <option value="news">新闻模块</option>
              <option value="dy">信息单页模块</option>
              <option value="pro">作品模块</option>
              <option value="down">下载模块</option>
              <option value="case">案例模块</option>
            </select>			</td>
      <td height="25" align="center" bgcolor="#FFFFFF">
	    <img src="images/show.gif" /> 
	   <select name="show" onchange="document.navframe.location.href='navshow.php?bs=show&sid=<?=$rows['id']?>&level=<?=$level?>&up_id=<?=$up_id?>&show='+this.value">
	    <option value="1" <?php if ($rows['show1']==1){echo "selected='selected'"; }?>>不显示</option>
		<option value="0" <?php if ($rows['show1']!=1){echo "selected='selected'"; }?>>显示</option>
      </select></td>
      <td align="center" bgcolor="#EFEFEF"> 
	    <a style="cursor:pointer" title="点击编辑修改" onclick="
	    document.form1.mid.value=<?=$rows['id']?>;
		document.form1.name.value='<?=$rows['name']?>';
		document.form1.link.value='<?php if ($rows['link']){echo $rows['link'];}else {echo "#";}?>';
		document.form1.bs.value='modify';
		document.form1.Submit.value='确定修改';"><img src="images/edit.gif" /></a> 
		<?php $cs=$rows['id']."&level=".$level."&up_id=".$up_id;?>
		<a id="dele" onclick="dele('nav.php','<?=$cs?>')" title="点击删除"  style="cursor:pointer" class="dele_link"><img src="images/del.gif" /></a>		</td></tr>
<?php }?>    
  </table></td></tr></table>
<form name="form1" action="?level=<?=$level?>" method="post">
<table width="100%" align="center">
<tr><td align="center">新增<span style="font-family:'黑体'; font-size:14px; font-weight:bold; color:#000000;"><?=$level?></span>级栏目名称：
  <input name="name" type="text" />
链接地址：  
  <input name="link" type="text" value="#" />
  <input name="class" type="hidden" size="8" value="<?=$class?>"/>
  <input name="bs" type="hidden" size="8" value="add"/>
  <input name="mid" type="hidden" size="8"/>
  <input name="tid" type="hidden" size="8" value=""/>
  
  <input name="id1" type="hidden" size="8" value="<?=$id1?>"/>
  <input name="id2" type="hidden" size="8" value="<?=$id2?>"/>
  <input name="id3" type="hidden" size="8" value="<?=$id3?>"/>
  
  
  <input name="type1" type="hidden" size="8" value=""/>
  <input name="level" type="hidden" size="8" value="<?=$level?>"/>
  <input type="submit" name="Submit" value="确定添加" <?php if($bs=="add1" ){echo "disabled='disabled' value='提交成功，正在返回'";}?>/></td>
</tr></table>
</form>
<iframe name="navframe" src="navshow.php" style="display:none;"></iframe>
</body>
</html>