<?php
error_reporting(0);
include ("../conf/conn.php");
$table=$nav_table;

if ($getXMLOrder){
  //echo $getXMLOrder."<br>";
  //echo strlen($getXMLOrder)."<br>";
  $str1=explode('/',trim($getXMLOrder));
  $xh1=count($str1)-1;
  //echo $xh1."<br>";
  for($i=0;$i<=$xh1-1;$i++){
    $str2=explode(',',trim($str1[$i]));
	$sql1="update $table set sx='$str2[0]' where id='$str2[1]'";
	$res1=mysql_query($sql1);
	//if ($res1)echo $sql1."<br>";
  }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<script> 
function moveSelected(select, down) 
{ 
   if (select.selectedIndex != -1) { 
     if (down) { 
       if (select.selectedIndex != select.options.length - 1) 
         var i = select.selectedIndex + 1; 
       else 
         return; 
     } 
     else { 
       if (select.selectedIndex != 0) 
         var i = select.selectedIndex - 1; 
       else 
         return; 
     } 
     var swapOption = new Object(); 
     swapOption.text = select.options[select.selectedIndex].text; 
     swapOption.value = select.options[select.selectedIndex].value; 
     swapOption.selected = select.options[select.selectedIndex].selected; 
     swapOption.defaultSelected = select.options[select.selectedIndex].defaultSelected; 
     for (var property in swapOption) 
       select.options[select.selectedIndex][property] = select.options[i][property]; 
     for (var property in swapOption) 
       select.options[i][property] = swapOption[property]; 
   } 
}

function getSelectOrder(obj) {
  var str = ""; 
  for(var i = 0;i<obj.selectName.options.length;i++) { 
    //str += "<item><itemorder>" + (i + 1) + "</itemorder><href>" + obj.selectName.options[i].value + "</href></item>" ;
    str += (i + 1) + "," + obj.selectName.options[i].value + "/" ;
  } 
  //str += "</itemorders>" 
  obj.getXMLOrder.value = str 
  //alert(obj.getXMLOrder.value) 
  //document.write(str);
  //window.location.href="sx.php?bs=move&str=";
  
}
</script> 
<body>

<table class="CustOuterTable" width="98%" border="0" cellspacing="0" cellpadding="0" align="center"> 
<form action="" method="post" name="formName" onsubmit="return getSelectOrder(this)"> 
<tr><td style="padding-top:4px;"> 
<div style="font-size:14pt;font-weight:bold;padding:4px"> 
导航顺序设置 
<hr size="2" color="#5f8ac5" /> 
</div> 
<table align="center"> 
<tr> 
<td> 
<select name="selectName" size="20" style="width:200px;"> 
<?php 
$sql="select * from $table where level='$level' and up_id='$up_id' order by sx asc";
$res=mysql_query($sql);
while($rows=mysql_fetch_array($res)){
?>
  <option value="<?=$rows['id']?>"><?=$rows['name']?><?php echo "(".$rows['sx'].")"?></option> 
<?php }?>


</select></td> 
<td> 
<input type="button" value="↑"  style="width:30px; height:30px;" onclick="moveSelected(this.form.selectName, false)" /> 
<br /> 
<input type="button" value="↓" style="width:30px; height:30px;" onclick="moveSelected(this.form.selectName, true)" /></td> 
<td><span style="padding:6px">
<input type="hidden" value="" name="getXMLOrder" />
<input type="hidden" value="" name="bs" value="move" />
<input name="submit" type="submit" value=" 确 定 "/>
<input name="cancel" type="button" value=" 取 消 "/>
</span></td>
</tr> 
</table> 
<br /> 

</td> 
</tr> 
</form> 
</table>
</body>
</html> 