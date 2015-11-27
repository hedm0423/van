<?php include ("head1.php");?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>服务向导-<?php if ($jb_title)echo $jb_title;else echo "梵谷视觉";?></title>
<meta http-equiv='keywords' content="<?php echo $jb_gjz;?>" />
<meta http-equiv="description" content="<?php echo $jb_ms;?>" />
<link href="css/css.css" type=text/css rel=stylesheet>
<script type="text/javascript" src="js/flash.js"></script>


</head>

<body>
<?php include ("qq.php")?>
<?php include ("left.php");?>

<div id="right">  
  <div id="main">
    <div class="top">
	  <div class="banner_notice"></div>
	  <div id="nav">
	    <ul>
		  <li><a href="notice.php" class="current">服务向导<br><span class="about_2">NOTICE</span></a></li>
		</ul>
	  </div>
	  <div id="now_position"><a href="index.php">首页</a> &gt; <a href="#">服务向导</a> &gt; 
<?php
if ($id){
$sql="select * from $news_table where id='$id' ";
$res=mysql_query($sql);
$rows=mysql_fetch_array($res);
 echo $rows['title'];
}
else echo "全部";
?>	  
	  </div>
    </div>
		
	<div id="cont">
	  
  