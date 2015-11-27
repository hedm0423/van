<?php

function ChgTitle($title,$len) 
{ 
  $length = $len; 
  if (strlen($title)>$length) { 
   $temp = 0; 
   for($i=0; $i<$length; $i++) 
    if (ord($title[$i])> 128) $temp++; 
   if ($temp%2 == 0) 
     $title = substr($title,0,$length)."..."; 
   else 
     $title = substr($title,0,$length+1)."..."; 
  } 
  return $title; 
}  

function Strsubstr($str,$start,$end)
{
  $startIndex = strpos(strtolower($str), $start);
  $endIndex = strpos(strtolower($str), $end);
  $length = $endIndex - $startIndex + strlen($end);
  $result = substr($str,$startIndex,$length);
  return $result;
}

function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
{
	if(function_exists("mb_substr"))
		return mb_substr($str, $start, $length, $charset);
	elseif(function_exists('iconv_substr'))
		return iconv_substr($str,$start,$length,$charset);
	$re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
	$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
	$re['gbk']	  = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
	$re['big5']	  = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
	preg_match_all($re[$charset], $str, $match);
	$slice = join("",array_slice($match[0], $start, $length));
	if($suffix) return $slice."…";
	return $slice;
}


/**

* 用来完美分词的，也就是把一段中文字只取前面一段，再加一个…

* @para string $string 用来分词的串

* @para int $length 保留的长度

* @para string $dot 最后加点什么

* 

* @return string

*/

function cutstr($string, $length, $dot = ' ...') {
  global $charset;
  if(strlen($string) <= $length) {
    return $string;
  }
  $string = str_replace(array('&', '"', '&lt;', '&gt;'), array('&', '"', '<', '>'), $string);
  $strcut = '';
  if(strtolower($charset) == 'utf-8') {
    $n = $tn = $noc = 0; 
	#字串1 
    while($n < strlen($string)) {
      $t = ord($string[$n]);
      if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
        $tn = 1; $n++; $noc++;
      } 
	  elseif(194 <= $t && $t <= 223) {
        $tn = 2; $n += 2; $noc += 2;
	  } 
	  elseif(224 <= $t && $t < 239) { 
#字串5
	    $tn = 3; $n += 3; $noc += 2;
	  } 
	  elseif(240 <= $t && $t <= 247) {
	    $tn = 4; $n += 4; $noc += 2;
	  } 
	  elseif(248 <= $t && $t <= 251) {
	    $tn = 5; $n += 5; $noc += 2;
	  } 
	  elseif($t == 252 || $t == 253) {
	    $tn = 6; $n += 6; $noc += 2; 
#字串1
	  } 
	  else {
	    $n++;
	  }
	  if($noc >= $length) {
	    break;
	  }
	}
	if($noc > $length) {
	  $n -= $tn; #字串3 
	}
	$strcut = substr($string, 0, $n);
  } 
  else {
    for($i = 0; $i < $length - strlen($dot) - 1; $i++) {
      $strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
    }
  }
  $strcut = str_replace(array('&', '"', '<', '>'), array('&', '"', '&lt;', '&gt;'), $strcut);
  return $strcut.$dot;
}


function name($nav_table,$id){
  $sql="select * from $nav_table where id='$id'";
  $res=mysqli_query($conn,$sql);
  $rows=mysqli_fetch_array($res);
  $name=$rows['name'];
  return $name;
}

function title($table,$id){
  $sql="select * from $table where id='$id'";
  $res=mysqli_query($conn,$sql);
  $rows=mysqli_fetch_array($res);
  $title=$rows['title'];
  return $title;
}



function type1($table,$id){
  $sql="select type1 from $table where id='$id'";
  $res=mysqli_query($conn,$sql);
  $rows=mysqli_fetch_array($res);
  $type1=$rows['type1'];
  return $type1;
}

function main_id($table,$link){
  $sql="select id from $table where link='$link'";
  $res=mysqli_query($conn,$sql);
  $rows=mysqli_fetch_array($res);
  $select=$rows['id'];
  return $select;
}


function pro_class_name($id){
  $sql="select * from pro where id='$id'";
  $res=mysqli_query($conn,$sql);
  $rows=mysqli_fetch_array($res);
  $pro_name=$rows['name'];
  return $pro_name;
}

function dele($table,$id){
  $sql="select * from $table where id='$id'";
  $res=mysqli_query($conn,$sql);
  $rows=mysqli_fetch_array($res);
  $level=$rows['level'];
  $class=$rows['class'];
  if ($level==3){
    $query3="delete from $table where id='$id' "; 
    $res3=mysqli_query($conn,$query3);
    if ($res3)
      $dele_ok="ok3";
  }
  elseif ($level==2){
    $query3="delete from $table where up_class='$class' and level='3' "; 
    $res3=mysqli_query($conn,$query3);
    $query2="delete from $table where id='$id' "; 
    $res2=mysqli_query($conn,$query2);
    if ($res3 && $res2)
      $dele_ok="ok2";
  }
  elseif ($level==1){
    $sql="select * from $table where up_class='$class' and level='2' ";
    $res=mysqli_query($conn,$sql);
    while($rows=mysqli_fetch_array($res)){
      $class2=$rows['class'];
      $query3="delete from $table where up_class='$class2' and level='3' "; 
      $res3=mysqli_query($conn,$query3);
    }
    $query2="delete from $table where up_class='$class' and level='2' "; 
    $res2=mysqli_query($conn,$query2);
    $query1="delete from $table where id='$id' "; 
    $res1=mysqli_query($conn,$query1);
    if ($res3 && $res2 && $res1)
      $dele_ok="ok1";
  }  
  return $dele_ok;
}



/*计数函数
$table 表名
$counname 计数存放字段
$idname ID字段名
$id 所查询的ID号
$view 保存还是查看数
*/
function counter($table,$counname,$idname,$id,$view) {
//查询当前浏览数
  include('conn.php');
  $sql="select * from $table where $idname=$id";
  $result=mysqli_query($conn,$sql);
  $objresult=mysqli_fetch_object($result);
  $count=$objresult->$counname;
  //更新数据库，并反回当前浏览数作为结果
  $count2=$count+1;
  if($view){
    $sql="update $table set $counname=$count2 where $idname=$id";
    mysqli_query($conn,$sql);
  }
  else{
    $sql="update $table set $counname='1' where $idname=$id";
    mysqli_query($conn,$sql);
  }
  return $count2;
}
?>